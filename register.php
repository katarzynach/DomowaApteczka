<?php
	include('../include/nagl.php');
	session_start();
	
	if(isset($_POST['email']))
	{
		$success=true;
		$login=$_POST['login'];
			//Login length
			if ((strlen($login)<3) || (strlen($login)>15))
			{
				$success=false;
				$_SESSION['e_login']="Login powinien posiadać od 3 do 15 znaków!";
			}
		if (ctype_alnum($login)==false)
			{
				$success=false;
				$_SESSION['e_login']="Login może składać się tylko z cyfr i liter (bez polskich znaków)";
				'<br/>';
			}
		//email validation
			$email=$_POST['email'];
			$emailB=filter_var($email, FILTER_SANITIZE_EMAIL);
			if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
			{
				$success=false;
				$_SESSION['e_email']="Coś jest nie tak! Spróbuj podać email ponownie";
			}
			//password validation
			$haslo1 = $_POST['haslo1'];
			$haslo2 = $_POST['haslo2'];
			//password length
			
			if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
			{
				$success=false;
				$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
			}
			//same passwords
			if ($haslo1!=$haslo2)
			{
				$success=false;
				$_SESSION['e_haslo']="Podane hasła muszą być identyczne!";
			}
			
			$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
			
		
		require_once('../include/connect.php');
		
		try
		{
			$polaczenie = new mysqli($host, $username, $password, $database);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//IS EMAIL AVAILABLE
				$rezultat = $polaczenie->query("SELECT id FROM users WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				//ile takich maili istnieje w bazie, zwrocone rekordy
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$success=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				//IS LOGIN AVAILABLE
				$rezultat = $polaczenie->query("SELECT id FROM users WHERE user='$login'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$success=false;
					$_SESSION['e_login']="Istnieje już gracz o takim loginie! Wybierz inny.";
				}
				
				if ($success==true)
				{
					//Udana rejestracja
					//ID - null, ponieważ jest autoinkrement
					if ($polaczenie->query("INSERT INTO users VALUES (NULL, '$login', '$haslo_hash', '$email')"))
					
					
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: ../include/welcome.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			//echo '<br />Informacja: '.$e;
		}
		
		
		
	}
	
	
	
?>

<div id="container">
		
			<h1>Rejestracja</h1>
			<div class="register">
			<form  method="POST" autocomplete="off">
				Login:<br/> <input type="text" name="login" required/>
				<?php
				if (isset($_SESSION['e_login']))
				{
				echo '<div class="error">'.$_SESSION['e_login'].'</div>';
				unset($_SESSION['e_login']);
				}
				
				?>
				<br/><br/>
				E-mail:<br/> <input type="text" name="email" required/> <br/><br/>
				<?php
				
				if (isset($_SESSION['e_email']))
				{
					echo '<div class="error">'.$_SESSION['e_email'].'</div>';
					unset($_SESSION['e_email']);
				}
				
				?>
				Hasło:<br/> <input type="password" name="haslo1" required/> <br/><br/>
				<?php
				
				if (isset($_SESSION['e_password']))
				{
					echo '<div class="error">'.$_SESSION['e_password'].'</div>';
					unset($_SESSION['e_password']);
				}
				
				?>
				Powtórz hasło:<br/> <input type="password" name="haslo2" required/> <br /><br />
				<input type="submit" class="btn_1" value="Zarejestruj się">
			</form>
			</div>
			<br /><br/>
			<div class="stopka">
			<p>Masz już konto?</p><br /><a href="../index.php">Zaloguj się!</a>
			</div>
		
</div>

<?php
include('../include/stopka.php');
?>
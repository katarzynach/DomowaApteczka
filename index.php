<?php
include('include/nagl.php');
session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: main.php'); //main.php
		exit();
	}
?>

<div id="container">
		<div class="rectangle">
			<div id="logo">
				<a href="index.php">
				<img src="img/logo.png" alt="Domowa Apteczka"/>
				</a>
			</div>
		</div>
		
		<div class="rectangle">
			<div id="log">
				
				<?php
					if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
				?>
				
				<form action="login/login.php" method="POST">
				Login: <input type="text" name="login" required/> <br/><br />
				Hasło: <input type="password" name="haslo" required/> <br/><br/>
				<input type="submit" class="btn_1" value="Zaloguj się"/>
				
				<br/>
				</form>
				
				<p>Nie masz konta?</p>
				<form action="login/register.php" method="POST">
				<input type="submit" class="btn_1" value="Zarejestruj się!"/>
	
				</form>
							
			</div>
			
				
					
		</div>
		<div class="more">
			<a href="about.php">Kliknij, aby dowiedzieć się więcej!</a>
		</div>
	</div>
	
	
<?php
include('include/stopka.php');
?>

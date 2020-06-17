<?php
	
	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: ../index.php');
		exit();
	}

	require_once('../include/connect.php');
	
	$connection=@new mysqli($host, $username, $password, $database);
	
	if($connection->connect_errno!=0)
	{
		echo "Error:".$connection->connect_errno;
	}
	else 
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		//Convert all applicable characters to HTML entities
		//Character entities are used to display reserved characters in HTML (<, >)
				
		
		if ($result = @$connection->query(
		sprintf("SELECT * FROM users WHERE user='%s'",
		mysqli_real_escape_string($connection,$login))))
		{
				$users_number = $result->num_rows; 
				if($users_number>0){
					$wiersz = $result->fetch_assoc();
					
					if (password_verify($haslo, $wiersz['pass']))
					{
					$_SESSION['zalogowany'] = true;
					$_SESSION['id'] = $wiersz['id'];
					$_SESSION['user'] = $wiersz['user'];
					
					$_SESSION['email'] = $wiersz['email'];
					
					
					unset($_SESSION['blad']);
					$result->free_result();
					header('Location: ../main.php');
					}
					else 
					{
						$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
						header('Location: ../index.php');
					}
					
					
				
				}else {
				
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: ../index.php');
				
				}
		}
		$connection->close();
	}
				
		
		
		
		
		
	
?>
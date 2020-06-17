<button><a href="mojeleki.php">Powrót</a></button>	
<?php
	session_start();
	include("../include/nagl.php");
	include("functions.php");
	include("../include/connect.php");
	
	$username = "kasiachl";
	$table = "ListaLekow";
	
	
	$connection=@new mysqli($host, $username, $password, $database);
	$connection->query("SET CHARSET utf8");
	$connection->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
	
	if($connection->connect_errno!=0)
	{
		echo "Error:".$connection->connect_errno;
	}
	
	$value=$_GET['search'];
	$sposob=$_GET['sposob'];
	
	
	find($table, $connection, $value, $sposob);
	$connection->close();
	
?>

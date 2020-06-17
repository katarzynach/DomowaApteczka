<?php

	session_start();

	include("../include/nagl.php");
	include("functions.php");
	include("../include/connect.php");
	
	$username = "kasiachl";
	$table = "leki_users";
	
	
	$connection=@new mysqli($host, $username, $password, $database);
	$connection->query("SET CHARSET utf8");
	$connection->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
	if($connection->connect_errno!=0)
	{
		echo "Error:".$connection->connect_errno;
	}

if(isset($_GET['save']))
{
$postac = $_GET['postac'];
$nazwa = $_GET['nazwa'];
$id = $_GET['id'];
$ilosc = $_GET['ilosc'];
$data = $_GET['data'];
$cena = $_GET['cena'];
$user_id = $_SESSION['id'];

$sql = "INSERT INTO leki_users (id_user, nazwa, postac, data, ilosc, id_lek, cena) VALUES ('$user_id', '$nazwa', '$postac', '$data', '$ilosc', '$id', '$cena')";
	//echo $sql;
	if ($connection->query($sql) === TRUE) {
		echo "<br> Dodano nowy lek: $nazwa";
		
	} else {
		echo "<br> Error: " . $sql . "<br>" . $connection->error;
	}


}

?>

<br/><br/><button><a href="mojeleki.php">Powrót</a></button>
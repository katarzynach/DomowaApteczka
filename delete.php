<?php

	session_start();

	include("../include/connect.php");
	
	$table = "leki_users";	
	
	$connection=@new mysqli($host, $username, $password, $database);
	$connection->query("SET CHARSET utf8");
	$connection->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
	if($connection->connect_errno!=0)
	{
		echo "Error:".$connection->connect_errno;
	}

  $id = $_GET['id'];
  $user_id = $_SESSION['id'];

  if (!empty($id) && !empty($user_id)) {
    $sql = "DELETE from {$table} WHERE id_user={$user_id} AND id={$id}";

    $connection->query($sql);
  }

  header("Location: mojeleki.php");
?>

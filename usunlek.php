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
	
?>
<div id="container">	
	<div class="rectangle">
		<form action = "mojeleki.php" method = "POST">
					<input type="submit" value="Powrót" class="btn_1" />
		</form>
		<div class="form">
		<form action="usunlek.php" method="GET">
					<p>Aby usunąć lek, konieczne jest podanie nazwy </p>
					Nazwa: <input type="text" name="nazwa" required><br /><br />
					Postać: <input type="text" name="postac" ><br /><br />
					Ilość (tabletki): <input type="text" name="ilosc" ><br /><br/>
					Termin przydatności: <input type="date" name="data" ><br /><br/>
					<input type="submit" class="btn_1" value="Usuń lek"/>
			</form>
		</div>
	</div>
</div>
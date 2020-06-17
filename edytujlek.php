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
	$nazwa=$_GET['nazwa'];
	$postac=$_GET['postac'];
	$id=$_GET['id'];
	$ilosc=$_GET['ilosc'];
	$data=$_GET['data'];
	$cena=$_GET['cena'];
	
	
?>
<div id="container">
	<div class="rectangle">
		<button><a href="mojeleki.php">Powrót</a></button>
		
		</form>
		<div class="form">
		<form action="edytuj.php" method="GET">
					<p>Edycja leku</p>
					Nazwa: <input type="text" name="nazwa" required readonly value="<? echo $nazwa;?>"><br /><br />
					Postać: <input type="text" name="postac" required readonly value="<? echo $postac;?>"><br /><br />
					ID: <input type="text" name="ID" required readonly value="<? echo $id;?>"><br /><br />
					Ilość (tabletki): <input type="text" name="ilosc" required value="<? echo $ilosc;?>"><br /><br/>
					Termin przydatności: <input type="date" name="data" required value="<? echo $data;?>"><br /><br/>
					Cena [zł]: <input type="text" name="cena" required value="<? echo $cena;?>"><br /><br/>
					<input type="submit" name="edit" class="btn_1" value="Edytuj lek"/>
					<input type="hidden" name="id" class="btn_1" value="<? echo $id;?>"/>
			</form>
		</div>
	</div>
</div>
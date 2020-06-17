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
	<button><a href="../include/account.php">Powrót</a></button>	
		<div id="container">
			Aby dodać lek, wyszukaj go w bazie:
			<form action="search.php" method="GET">
			Klucz wyszukiwania: <select name="sposob" id="sposob">
				<option value="NazwaHandlowa" >Nazwa</option>
				<option value="id" >ID</option>
				<option value="Postac" >Postać</option>
				<option value="KodKreskowy" >Kod kreskowy</option>
			  </select><br/><br />
			  
			  <input type="text" name="search" placeholder="nazwa/kod/id/postac"required>
			  <input type="submit" value="Wyszukaj">
			</form>
		</div>
</div>
		
<?php
	//add($username, $connection, $table, $_POST['nazwa'], $_POST['postac'], $_POST['DATA'], $_POST['ilosc']);
	
	
?>
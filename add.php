<?php
	
	session_start();
	include("../include/nagl.php");
	include("functions.php");
	include("../include/connect.php");
	
	$username = "kasiachl";
	$table1 = "leki_users";
	$table2 = "ListaLekow";
	
	$connection=@new mysqli($host, $username, $password, $database);
	$connection->query("SET CHARSET utf8");
	$connection->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
	
	if($connection->connect_errno!=0)
	{
		echo "Error:".$connection->connect_errno;
	}
	//$UPRselect1	="SELECT * FROM ListaLekow WHERE id = %d ";
	//echo $_GET["nazwa"];
	//echo $_GET["postac"];
	$nazwa=$_GET["nazwa"];
	$postac=$_GET["postac"];
	$id_lek=$_GET["id"];
	
	
?>
<div id="container">
	<div class="rectangle">
		<button><a href="mojeleki.php">Powrót</a></button>
		
		</form>
		<div class="form">
		<form action="dodaj.php" method="GET">
					<p>Aby dodać lek, należy uzupełnić wszystkie pola formualrza </p>
					Nazwa: <input type="text" name="nazwa" value="<?php echo $nazwa; ?>"required readonly><br /><br />
					Postać: <input type="text" name="postac"value="<?php echo $postac; ?>" required readonly><br /><br />
					ID: <input type="text" name="id"value="<?php echo $id_lek; ?>" required readonly><br /><br />
					Ilość (szt./ml.): <input type="text" name="ilosc" required><br /><br/>
					Termin ważności: <input type="date" name="data" required><br /><br/>
					Cena [PLN]: <input type="text" name="cena" required><br /><br/>
					<input name="save" type="submit" class="btn_1" value="Dodaj lek!"/>
			</form>
		</div>
	</div>
</div>


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
	
	$nazwa = $_GET['nazwa'];
    
  //header("Location: mojeleki.php");
?>


<div id="container">
	<div class="rectangle">
		<button><a href="mojeleki.php">Powrót</a></button>	
		</form>
		<div class="form">
		<form action="zazyj.php" method="GET">
					<p>Podaj ilość zażytych tabeletek</p>
					Nazwa: <input type="text" name="nazwa" value="<?echo $nazwa; ?>"required readonly><br /><br />
					Spożycie (szt./ml.): <input type="text" name="ilosc_sp" required ><br /><br/>
					Data zażycia: <input type="date" name="data" required><br /><br/>
					<input type="submit" class="btn_1" value="Potwierdzam zażycie"/>
			</form>
		</div>
	</div>
</div>


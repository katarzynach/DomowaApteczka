<? 	session_start();
	include("../include/nagl.php");
	include("functions.php");
	include("../include/connect.php");
	
	$username = "kasiachl";
	$table = "leki_users";
	
	$connection=@new mysqli($host, $username, $password, $database);
	$connection->query("SET CHARSET utf8");
	$connection->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
	
	
	header("Location: mojeleki.php");
?>
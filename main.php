<?php
session_start();
include('include/nagl.php');
if(!isset($_SESSION['zalogowany']))
{
	header('Location: ../index.php');
	exit();
}
?>
<div id="loggedin">


		<nav class="navtop">
			<div>
				<h1>Domowa Apteczka</h1>
				<a href="include/account.php">Moja Apteczka</a>
				<a href="include/issue.php">Zgłoś problem</a>
				<a href="login/logout.php">Wyloguj się</a>
				
			</div>
		</nav>
		


		

<?php
	echo "<h3>Witaj ".$_SESSION['user']."!</h3>";
?>
</div>
	
<div id="container">
	<p>Z uwagi na wyjątkową sytuację, pamętaj, aby dbać o swoje zdrowie! </p>
				<img src="img/info.png" alt="Koronawirus - podstawowe informacje"/><br />
	<div class="more">
	<a href="include/account.php">Moja Apteczka</a>
	<a href="https://www.gov.pl/web/koronawirus" target="_blank" >Więcej informacji - COVID-19</a>
	</div>
	
</div>

	
<?php
include('include/stopka.php');
?>

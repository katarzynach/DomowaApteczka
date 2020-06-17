<?php
	session_start();
	include('nagl.php');
?>
<div id="container">
 <div class="more">
<a href="../main.php">Powrót</a>
 </div>


<?php
	echo "<h3>Jesteś zalogowany(a) jako: ".$_SESSION['user']."</h3>";
	echo "<h3>Podany przez Ciebie adres e-mail: ".$_SESSION['email']."</h3>";
?>
<a href="delete.php">Usuń konto</a>
</div>
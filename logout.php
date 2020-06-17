<?php
include('../include/nagl.php');
session_start();
$komunikat = "Wylogowano poprawnie!";
session_unset();

//header('Location: ../index.php');

?>
<br />
<hr />
<br/>
<div id="container">
<form action="../index.php" method="POST">
<?php echo $komunikat; ?> <br /><br />
<input type="submit" class="btn_1" value="Powrót do strony głównej"/>
</div>

<?php
include('../include/stopka.php');
?>
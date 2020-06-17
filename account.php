<?php
include('nagl.php');
?>


<nav class="navtop">
			<div>
				<h1>Domowa Apteczka</h1>
				<!--<a href="profile.php">Profile</a>-->
				
				<a href="issue.php">Zgłoś problem</a>
				<a href="../login/logout.php">Wyloguj się</a>
			</div>
</nav>
		<div class="content">
			<h2>Twoja Apteczka</h2>
			<div>
				
				
				
				<form action="../leki/leki.php" method="POST">
				<input type="submit" class="btn_1" value="Baza Leków"/>
				</form>
				
				<br />
				
				<form action="../leki/mojeleki.php" method="POST">
				<input type="submit" class="btn_1" value="Moje Leki"/>
				</form>
				
				<br />
				
				
				<form action="../main.php" method="POST">
				<input type="submit" class="btn_1" value="Powrót"/>
				</form>
				
			</div>
		</div>



<?php
include('stopka.php');
?>

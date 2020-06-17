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
				<nav class="navtop">
				<div>
					<h1>Domowa Apteczka</h1>
					<!--<a href="profile.php">Profile</a>-->
					
					<a href="../include/issue.php">Zgłoś problem</a>
					<a href="../login/logout.php">Wyloguj się</a>
				</div>
				</nav>
				<br/>
				<div id="container">
				
				<div class="btn-group">
				
				<button><a href="dodajlek.php">Dodaj lek</a></button>
				
				
				<!--<button><a href="zazyjlek.php">Zażyj lek</a></button>-->
				<button><a href="../include/account.php">Powrót</a></button>
				<br />
				<br />
						
			
			
<?php
//echo $_SESSION['id'];
$user_id=$_SESSION['id'];

$result_query = $connection->query("SELECT * FROM leki_users WHERE id_user=$user_id ORDER BY data");

$results = $result_query->fetch_all(MYSQLI_ASSOC);

$expired_products = array_filter($results, function ($product) { 
  return $product['data'] < date('Y-m-d');  
});

if ($result_query) {
  echo "Liczba leków w apteczce: {$result_query->num_rows}.<br/><br/>";

  if (count($expired_products) > 0) {
    $count = count($expired_products);
    echo "<span style='color:red;font-weight:bold;'>UWAGA! Liczba przeterminowanych leków w apteczce: {$count}.</span>";
  }
 
  include("../include/tabelamojeleki.php");

	foreach ($results as $row)
	{

    echo  $row['data'] < date('Y-m-d') ? "<tr style='color:red;'" : "<tr";
    echo ">
      <td>{$row['nazwa']}</td>
      <td>{$row['postac']}</td>
      <td>{$row['data']}</td>
      <td>{$row['ilosc']}</td>
      <td>{$row['cena']}</td>
      <td>
        <form onSubmit='return confirm(\"Czy napewno chcesz usunąć lek {$row['nazwa']}?\")' action='delete.php' method='GET'>
          <input type='hidden' name='id' value='{$row['id']}' />
          <input type='submit' value='Usuń lek' />
        </form></td><td>
		 <form action='zazyjlek.php' method='GET'>
		  
          <input type='hidden' name='id' value='{$row['id']}' />
          <input type='hidden' name='nazwa' value='{$row['nazwa']}' />
          <input type='hidden' name='ilosc' value='{$row['ilosc']}' />
          <input type='submit' value='Zażyj lek' />
        </form></td><td>
		<form action='edytujlek.php' method='GET'>
		  
          <input type='hidden' name='id' value='{$row['id']}' />
          <input type='hidden' name='nazwa' value='{$row['nazwa']}' />
          <input type='hidden' name='ilosc' value='{$row['ilosc']}' />
          <input type='hidden' name='postac' value='{$row['postac']}' />
          <input type='hidden' name='cena' value='{$row['cena']}' />
          <input type='hidden' name='data' value='{$row['data']}' />
          <input type='submit' value='Edytuj lek' />
        </form>
		
      </td>
    </tr>
    ";
  }
  echo "</tbody></table></div>";

  /* free result set */
  $result_query->close();
}
?>
</div>	
</div>

<?php
include("../include/stopka.php");
?>
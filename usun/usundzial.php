<?php

require_once('../connect.php');

if((isset($_GET['id'])) && (is_numeric($_GET['id'])))
{
	$id = $_GET['id'];
	$komunikat = $mysqli->query("SET FOREIGN_KEY_CHECKS=0;");
	if($komunikat = $mysqli->prepare("DELETE FROM dzial WHERE idDzial = ? LIMIT 1"))
	{
		$komunikat->bind_param("i",$id);
		$komunikat->execute();
		$komunikat->close();
		header('Location: ../dzial.php');
	}
	else
	{
		echo "Błąd zapytania!"; ?>
		
		<a href="../dzial.php">Wróć do strony głównej</a>
<?php
	}
	$mysqli->close();
	
}

else
{
	header('Location: ../dzial.php');
}
?>
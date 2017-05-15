<?php

require_once('../connect.php');

if((isset($_GET['id'])) && (is_numeric($_GET['id'])))
{
	$id = $_GET['id'];
	$komunikat = $mysqli->query("SET FOREIGN_KEY_CHECKS=0;");
	if($komunikat = $mysqli->prepare("DELETE FROM pracownik WHERE idPracownik = ? LIMIT 1"))
	{
		$komunikat->bind_param("i",$id);
		$komunikat->execute();
		$komunikat->close();
		header('Location: ../pracownik.php');
	}
	else
	{
		echo "Błąd zapytania!"; ?>
		
		<a href="../pracownik.php">Wróć do strony głównej</a>
<?php
	}
	$mysqli->close();
	
}

else
{
	header('Location: ../pracownik.php');
}
?>
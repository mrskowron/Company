<!DOCTYPE html>
<html>
<head>
	<title>Budynek</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet"  href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="budynek.php">Budynek<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon "></span></a></li>         
        <li ><a href="dzial.php">Dział<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon "></span></a></li>        
        <li ><a href="miasto.php">Miasto<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon "></span></a></li>
        <li ><a href="pracownik.php">Pracownik<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon "></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<a href="dodaj/dodajbudynek.php" type="button" class="btn btn-primary">Dodaj nowy rekord</a>
<?php
	require_once('connect.php');
	$mysqli->query("SET NAMES 'utf8'");
	if($rezultat = $mysqli->query("SELECT * FROM budynek "))
	{
		if($rezultat->num_rows>0)
		{
			echo "<div class='container'>";
			echo "<table class='table'>";
			echo "<tr><th>ID</th><th>Ulica</th><th>Nr</th><th>Kod Pocztowy</th><th>Usuń</th></tr>";
			while($wiersz = $rezultat->fetch_object())
			{
				echo "<tr>";
					echo "<td>".$wiersz->idBudynek."</td>";
					echo "<td>".$wiersz->Ulica."</td>";
					echo "<td>".$wiersz->Nr."</td>";
					echo "<td>".$wiersz->Kod_pocztowy."</td>";
					echo "<td><a type='button' class='btn btn-danger' href='usun/usunbudynek.php?id=".$wiersz->idBudynek."'>Usuń</a></td>";
				echo "</tr>";
			}
			echo "</table>";
			echo "</div>";
		}
		else
		{
			echo "Brak rekordów";
		}
	}
	else
	{
		echo "Błąd: ". $mysqli->error;
	}
	$mysqli->close();
?>
</body>
</html>
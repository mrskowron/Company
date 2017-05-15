<!DOCTYPE html>
<html>
<head>
	<title>Pracownik</title>
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
<a href="dodaj/dodajpracownik.php" type="button" class="btn btn-primary">Dodaj nowy rekord</a>
<?php
	require_once('connect.php');
	$mysqli->query("SET NAMES 'utf8'");
	if($rezultat = $mysqli->query("SELECT * FROM pracownik "))
	{
		if($rezultat->num_rows>0)
		{
			echo "<div class='container'>";
			echo "<table class='table'>";
			echo "<tr><th>ID</th><th>Nazwisko</th><th>Imie</th><th>Pensja</th><th>Dział</th><th>Miasto</th><th>Usuń</th></tr>";
			while($wiersz = $rezultat->fetch_object())
			{
				echo "<tr>";
					echo "<td>".$wiersz->idPracownik."</td>";
					echo "<td>".$wiersz->Nazwisko."</td>";
					echo "<td>".$wiersz->Imie."</td>";
					echo "<td>".$wiersz->Pensja."</td>";
					echo "<td>".$wiersz->Dzial_idDzial."</td>";
					echo "<td>".$wiersz->Miasto_idMiasto."</td>";
					echo "<td><a type='button' class='btn btn-danger' href='usun/usunpracownik.php?id=".$wiersz->idPracownik."'>Usuń</a></td>";
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
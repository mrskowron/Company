<?php
require_once('../connect.php');
function createForm($ulica='',$nr='',$kod='',$error=''){ ?>

<!DOCTYPE html>
<html>
<head>
	<title>Dodawanie budynku</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet"  href="../style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="../bootstrap.min.css">
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
        <li ><a href="../budynek.php">Budynek<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon "></span></a></li>         
        <li ><a href="../dzial.php">Dział<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon "></span></a></li>        
        <li ><a href="../miasto.php">Miasto<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon "></span></a></li>
        <li ><a href="../pracownik.php">Pracownik<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon "></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<?php if($error != '')
{
	echo "<div style='color:red; padding: 5px;'>".$error."</div>";
}
?>

	<form role="form" class="form-inline" action="" method="post"> 

		<div class="form-group">
		<p><label>Ulica: </label><input type="text" class="form-control" name="ulica" /></p>
		</div>
		<div class="form-group">
		<p><label>Nr: </label><input type="text" class="form-control" name="nr" /></p>
		</div>
		<div class="form-group">
		<p><label>Kod pocztowy: </label><input type="text" class="form-control" name="kod" /></p>
		</div>
		<input type="submit" class="btn btn-success" name="submit" value="Dodaj" />

	</form>

</body>
</html>

<?php }

	if(isset($_POST['submit']))
	{
		$ulica = $_POST['ulica'];
		$nr = $_POST['nr'];
		$kod = $_POST['kod'];
		if(($ulica == '') || ($nr == '') || ($nr <= 0) || ($kod == ''))
		{
			$error = "Wypełnij poprawnie wszystkie pola";
			createForm($ulica, $nr, $kod, $error);
		}
		else
		{
			if($komunikat = $mysqli->prepare("INSERT budynek (Ulica, Nr, Kod_pocztowy) VALUES (?, ?, ?)"))
			{
				$komunikat->bind_param("sis",$ulica,$nr,$kod);
				$komunikat->execute();
				$komunikat->close();
			}
			else
			{
				echo "Błąd zapytania";
			}
			header('Location: ../budynek.php');
		}
	}
	else createForm();

$mysqli->close();
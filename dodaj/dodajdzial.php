<?php
require_once('../connect.php');
function createForm($nazwa='',$error=''){ ?>

<!DOCTYPE html>
<html>
<head>
	<title>Dodawanie działu</title>
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
		<p><label>Nazwa: </label><input type="text" class="form-control" name="nazwa" /></p>
		</div>
		<input type="submit" class="btn btn-success" name="submit" value="Dodaj" />


</form>

</body>
</html>

<?php }

	if(isset($_POST['submit']))
	{
		$nazwa = $_POST['nazwa'];
		if(($nazwa == '') || (is_numeric($nazwa)))
		{
			$error = "Wypełnij poprawnie wszystkie pola";
			createForm($nazwa, $error);
		}
		else
		{
			if($komunikat = $mysqli->prepare("INSERT dzial (Nazwa) VALUES (?)"))
			{
				$komunikat->bind_param("s",$nazwa);
				$komunikat->execute();
				$komunikat->close();
			}
			else
			{
				echo "Błąd zapytania";
			}
			header('Location: ../dzial.php');
		}
	}
	else createForm();

$mysqli->close();
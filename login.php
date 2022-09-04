<?php
	include("zaglavlje.php");
	$bp=SpajanjeNaBazu();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Login stranica </title>
	<link rel="stylesheet" type="text/css" href="simicev.css">
</head>
<body>
	<div id="login">
		<form action="process.php" method="POST">
		<p>
			<label>Korime: </label>
			<input type="text" id="korime" name="korime"/>
		</p>
		<p>
			<label>Lozinka: </label>
			<input type="password" id="lozinka" name="lozinka"/>
		</p>
		<p>
			<input type="submit" id="btn" value="Potvrdi" />
		</p>
		</form>
	</div>
</body>
</html>
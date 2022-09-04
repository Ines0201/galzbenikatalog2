<?php
	include("zaglavlje.php");
	$bp=SpajanjeNaBazu();
?>

<!DOCTYPE html>
<html lang="hr">
	<head>
		<title>Ines Šimićev - Glazbeni katalog</title>
		<meta charset="UTF-8"/>
		<meta name="autor" content="Ines Šimićev">
		<meta name="date" content="15.06.2022">
		
		
	</head>
<?php
	if(isset($_GET['logout'])){
		$prijavljen=$_SESSION['prijavljen'];
		$prijavljen_ime=$_SESSION['prijavljen_ime'];
		$prijavljen_tip=$_SESSION['prijavljen_tip'];
		$prijavljen_id=$_SESSION['prijavljen_id'];
		session_destroy();
	}
$greska= "";
	if(isset($_POST['submit'])){
		$korisnicko_ime=mysqli_real_escape_string($bp,$_POST['korisnicko_ime']);
		$lozinka=mysqli_real_escape_string($bp,$_POST['lozinka']);

		if(!empty($kor_ime)&&!empty($lozinka)){
			$sql="SELECT id_korisnik,id_tip,ime,prezime FROM korisnik WHERE korisnicko_ime='$korisnicko_ime' AND lozinka='$lozinka'";
			$rs=izvrsiUpit($bp,$sql);
			if(mysqli_num_rows($rs)==0)$greska="Ne postoji korisnik s navedenim korisničkim imenom i lozinkom";
			else{
				list($ime,$prezime,$id,$tip)=mysqli_fetch_array($rs);
				$_SESSION['prijavljen']=$korisnicko_ime;
				$_SESSION['prijavljen_ime']=$ime." ".$prezime;
				$_SESSION["prijavljen_id"]=$id;
				$_SESSION['prijavljen_tip']=$tip;
				header("Location:index.php");
			}
		}
		else $greska = "Molim unesite korisničko ime i lozinku";
	}
?>
<form name="obrazac_za_prijavu" class="obrazac" action="" method="POST">
    <h2>Prijavi se:</h2>
    <input class="korisnicko-ime" placeholder="korisničko ime" name="korisnicko_ime"><br>
    <input type="password" class="korisnicko-ime" placeholder="lozinka" name="lozinka"><br> 
    <button type="submit" href="#" class="btn" style="padding: 5px 10px;">Prijava</a></button>
</form>
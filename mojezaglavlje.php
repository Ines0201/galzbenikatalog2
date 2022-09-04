<?php
	define("POSLUZITELJ","localhost");
	define("BAZA","iwa_2021_vz_projekt");
	define("BAZA_KORISNIK","iwa_2021");
	define("BAZA_LOZINKA","foi2021");
	
	function SpajanjeNaBazu(){
		$veza=mysqli_connect(POSLUZITELJ,BAZA_KORISNIK,BAZA_LOZINKA);
		if(!$veza)echo "GREŠKA: Problem sa spajanjem u datoteci baza.php funkcija SpajanjeNaBazu: ".mysqli_connect_error();
		mysqli_select_db($veza,BAZA);
		if(mysqli_error($veza)!=="")echo "GREŠKA: Problem sa odabirom baze u baza.php funkcija SpajanjeNaBazu: ".mysqli_error($veza);
		mysqli_set_charset($veza,"utf8");
		if(mysqli_error($veza)!=="")echo "GREŠKA: Problem sa odabirom baze u baza.php funkcija SpajanjeNaBazu: ".mysqli_error($veza);
		return $veza;
	}

	function izvrsiUpit($veza,$upit){
		$rezultat=mysqli_query($veza,$upit);
		if(mysqli_error($veza)!=="")echo "GREŠKA: Problem sa upitom: ".$upit." : u datoteci baza.php funkcija izvrsiUpit: ".mysqli_error($veza);
		return $rezultat;
	}

	function ZatvoriBazu($veza){
		mysqli_close($veza);
	}
?>
<?php
	if(session_id()=="")session_start(); //start session samo ??????

	$trenutna=basename($_SERVER["PHP_SELF"]);
	$putanja=$_SERVER['REQUEST_URI'];
	$prijavljen=0; //prijavljen korisnik ili ne??
	$prijavljen_tip=-1;//šta to znači?
	$vel_str=10; // broj prikazanih elemenata na stranici s korisnicima PROMIJENI
	$vel_str_video=10; 	// broj prikazanih elemenata na stranici s video materijalima PROMIJENI

	if(isset($_SESSION['prijavljen'])){
		$prijavljen=$_SESSION['prijavljen'];
		$prijavljen_ime=$_SESSION['prijavljen_ime'];
		$prijavljen_tip=$_SESSION['prijavljen_tip'];
		$prijavljen_id=$_SESSION['prijavljen_id'];
	}
?>
<!DOCTYPE html>
<html lang="hr">
	<head>
		<title>Ines Šimićev - Glazbeni katalog</title>
		<meta charset="UTF-8"/>
		<meta name="autor" content="Ines Šimićev">
		<meta name="date" content="15.06.2022">
		<link href="isimicev.css" rel="stylesheet" type="text/css">
		
	</head>
	<body>
		<header>
		
		<h1>
		<a><strong>Glazbeni katalog</strong></a>
		</h1>
		
		<nav>
			<?php
			
				switch(true){
					case $trenutna:
						switch($prijavljen_tip>=0) {
							case 'true':
								echo '<a href="index.php"';
								if($trenutna=="index.php")echo ' class="poveznica"';
								echo ">POČETNA  </a><br/>";
								echo '<a href="korisnici.php"';
								if($trenutna=="korisnici.php")echo ' class="poveznica"';
								echo ">KORISNICI  </a><br/>";
								echo '<a href="pjesme.php"';
								if($trenutna=="pjesme.php")echo ' class="poveznica"';
								echo ">PJESME  </a><br/>";
								echo '<a href="kupnja.php"';
								if($trenutna=="kupnja.php")echo ' class="poveznica"';
								echo ">KUPNJA  </a><br/>";
								echo '<a href="o_autoru.html"';
								if($trenutna=="o_autoru.html")echo ' class="poveznica"';
								echo ">AUTOR  </a><br/>";
								echo "Trenutna lokacija: ".$trenutna."<br/>";
					

							default:
								echo '<a href="index.php"';
								if($trenutna=="index.php")echo ' class="poveznica"';
								echo ">POČETNA  </a><br/>" ; 
								echo '<a href="pjesme.php"';
								if($trenutna=="pjesme.php")echo ' class="poveznica"';
								echo ">PJESME  </a><br/>";
								echo '<a href="o_autoru.php"';
								if($trenutna=="o_autoru.php")echo ' class="poveznica"';
								echo ">AUTOR  </a><br/>";
								echo "Trenutna lokacija: ".$trenutna."<br/>";
					if($prijavljen===0){
						echo "Status: Neprijavljeni korisnik<br/>";
						
						echo "<a class='poveznica' href='prijava.php'>PRIJAVA</a>";
					}
					else{
						echo "Status: </strong>Dobrodošli, $prijavljen_ime<br/>";
						
						echo "<a class='poveznica' href='prijava.php?logout=1'>ODJAVA</a>";
					}
								break;
						}

					default:
						break;
				}
			?>
		</nav>
		</header>
		
		
		
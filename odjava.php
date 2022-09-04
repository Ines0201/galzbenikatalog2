<?php 
include 'zaglavlje.php';
session_destroy(); // funkcija uništavanje sesije, tako da je korisnik opet odjavljen
header("Location: index.php"); // preusmjeravanje na početnu stranicu nakon odjave
?>

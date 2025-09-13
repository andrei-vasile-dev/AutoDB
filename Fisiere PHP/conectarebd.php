<?php

// codul necesar pentru a ne lega la baza de date
$bazadedate = 'masinibd';
$user = "root";
$parola = "";


$conn = mysqli_connect("localhost",$user,$parola,$bazadedate);

if ($conn === false) {
	die ("EROARE: Nu s-a putut realiza conectarea la baza de date. " . mysqli_connect_error());
} ?>
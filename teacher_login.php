<?php
//variabli connect eshte i aksesueshem ne te gjitha queryt
$connect= new mysqli('localhost','root','','examination')or die("Ka ndodhur nje gabim ne lidhjen me bazen e te dhenave!".mysqli_error($connect));


$pointer=@$_GET['p'];// perdorim variablin superglobal $_GET['p'] per te krijuar disa menu te ndryshme brenda nje file php

// inicializojme te dhenat e pedagogut nepermjet vektorit  $_POST
$pedagogusername=$_POST['pedagogusername'];
$fjalekalimi=$_POST['fjalekalimi'];

//funksioni addslashes () vendos stringat ne thonjeza per t'i aksesuar ne databaze
$pedagogusername=stripslashes($pedagogusername);
$pedagogusername=addslashes($pedagogusername);

//nderkohe qe funksioni stripslashes () i heq thonjezat qe te shfaqen te dhenat e pasterta ne website
//p.s. te dy funksionet perdoren per futjen dhe marrjen e stringave ne databaze
$fjalekalimi=stripslashes($fjalekalimi);
$fjalekalimi=addslashes($fjalekalimi);

//query qe krahason nese kredencialitetet e pedagogut jane te sakta

$select_pedagog= mysqli_query($connect,"SELECT pedagogusername FROM pedagog WHERE pedagogusername='$pedagogusername' AND fjalekalimi= '$fjalekalimi'") or die('Error23');

$numerator=mysqli_num_rows($select_pedagog);
if ($numerator==1) {
session_start();
if (isset($_SESSION['pedagogusername'])) {
	session_unset();
}

$_SESSION["id_code"]='pedagog002244';// i japim nje id unike sesionit te pedagogut

$_SESSION["pedagogusername"]=$pedagogusername;

//ridrejtojme ne profil
header("location:pedagog.php?p=1");

}

// nese kredencialitetet e pedagogut nuk jane te sakta shfaqim ne Url qe nuk ka te drejte aksesi

else  header("location:$pointer?g=Alarm: Ju nuk keni te drejte aksesi si administrator!!!");

?>
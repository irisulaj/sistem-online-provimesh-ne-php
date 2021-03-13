<?php
session_start();
if(isset($_SESSION["email"])){
session_destroy();
}
//variabli connect eshte i aksesueshem ne te gjitha queryt
$connect= new mysqli('localhost','root','','examination')or die("Ka ndodhur nje gabim ne lidhjen me bazen e te dhenave!".mysqli_error($connect));
//perfshijme lidhjen me databazen

$pointer=@$_GET['p'];// perdorim variablin superglobal $_GET['p'] per te krijuar disa menu te ndryshme brenda nje file php

// inicializojme te dhenat e studentit nepermjet vektorit  $_POST
$email = $_POST['email'];
$fkalimi = $_POST['fkalimi'];

//funksioni addslashes () vendos stringat ne thonjeza per t'i aksesuar ne databaze
$email = stripslashes($email);
$email = addslashes($email);

//nderkohe qe funksioni stripslashes () i heq thonjezat qe te shfaqen te dhenat e pasterta ne website
//p.s. te dy funksionet perdoren per futjen dhe marrjen e stringave ne databaze

$fkalimi = stripslashes($fkalimi); 
$fkalimi = addslashes($fkalimi);

$fkalimi=md5($fkalimi);// dekripton fjalekalimin 

//query qe krahason nese kredencialitetet e studentit jane te sakta
$select_regjistrohu = mysqli_query($connect,"SELECT emri FROM regjistrohu WHERE email = '$email' and fkalimi = '$fkalimi'") or die('Error29');

$numerator=mysqli_num_rows($select_regjistrohu);
if($numerator==1){
while($row = mysqli_fetch_array($select_regjistrohu)) {
	$emri = $row['emri'];
}
$_SESSION["emri"] = $emri;
$_SESSION["email"] = $email;

//ridrejtojme ne profil
header("location:profile.php?p=1");
}
else
	// nese kredencialitetet e studentit nuk jane te sakta shfaqim ne Url qe nuk ka te drejte aksesi
header("location:$pointer?g=Emaili ose passwordi nuk eshte i sakte!");


?>
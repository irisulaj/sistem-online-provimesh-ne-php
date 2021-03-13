<?php
//variabli connect eshte i aksesueshem ne te gjitha queryt
$connect= new mysqli('localhost','root','','examination')or die("Ka ndodhur nje gabim ne lidhjen me bazen e te dhenave!".mysqli_error($connect));
?>
<?php
session_start();
$email=$_SESSION['email'];

//fshi studentin nga sistemi
if(isset($_SESSION['id_code'])){
if(@$_GET['delete_email'] && $_SESSION['id_code']=='pedagog002244') {
$delete_email=@$_GET['delete_email'];


// fshijme te dhenat e tij nga tabela vleresim
$delete_1 = mysqli_query($connect,"DELETE FROM vleresim WHERE email='$delete_email' ") or die('Error16');

//fshijme te dhenat e tij nga tabela riprovime
$delete_2 = mysqli_query($connect, "DELETE FROM riprovime WHERE email='$delete_email'") or die('Error19');

// fshijme te dhenat nga tabela e regjistrimit
$deleteregjistrohu = mysqli_query($connect,"DELETE FROM regjistrohu WHERE email='$delete_email' ") or die('Error22');
header("location:pedagog.php?p=1");// ridrejtojme ne seksionin e pare te panelit te Pedagogut
}
}

//fshi provimin
if(isset($_SESSION['id_code'])){

if(@$_GET['p']== 'fshiprovim' && $_SESSION['id_code']=='pedagog002244') {
$provim_id=@$_GET['provim_id'];

//zgjedhim te gjitha pyetjet e provimit qe duam te fshijme
$deletekerkesa = mysqli_query($connect,"SELECT * FROM kerkesa WHERE provim_id='$provim_id' ") or die('Error34');

while($row = mysqli_fetch_array($deletekerkesa)) {
	$pyetje_id = $row['pyetje_id'];

//fshijme te gjitha alternativat per cdo pyetje qe ka provimi
$fshiprovim_1 = mysqli_query($connect,"DELETE FROM alternativat WHERE pyetje_id='$pyetje_id'") or die('Error40');

//fshijme te gjitha pergjigjet per pyetjet qe ka provimi
$fshiprovim_2 = mysqli_query($connect,"DELETE FROM pergjigjet WHERE pyetje_id='$pyetje_id' ") or die('Error43');
}

//fshijme te gjitha pyetjet qe ka provimi nga tabela kerkesa
$fshiprovim_3 = mysqli_query($connect,"DELETE FROM kerkesa WHERE provim_id='$provim_id' ") or die('Error47');

//fshijme te gjitha te dhenat e provimit nga tabela provim
$fshiprovim_4 = mysqli_query($connect,"DELETE FROM provim WHERE provim_id='$provim_id' ") or die('Error50');

//fshijme vleresimin per provimin e zgjedhur
$fshiprovim_5 = mysqli_query($connect,"DELETE FROM vleresim WHERE provim_id='$provim_id' ") or die('Error53');

header("location:pedagog.php?p=3");// ridrejtojme ne seksionin fshi provim te pedagogut
}
}

// fshi lendet e regjistruara per riprovim nga studentet
if(isset($_SESSION['id_code'])){
if(@$_GET['fshi_email'] && $_SESSION['id_code']=='pedagog002244') {
$fshi_email=@$_GET['fshi_email'];

$deleteriprovime= mysqli_query($connect,"DELETE FROM riprovime WHERE email='$fshi_email' ") or die('Error64');
header("location:pedagog.php?p=4");
}
}


?>
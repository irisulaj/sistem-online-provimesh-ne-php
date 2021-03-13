<?php
//variabli connect eshte i aksesueshem ne te gjitha queryt
$connect= new mysqli('localhost','root','','examination')or die("Ka ndodhur nje gabim ne lidhjen me bazen e te dhenave!".mysqli_error($connect));
session_start();
$email=$_SESSION['email'];
//faza e pare e shtimit te provimit ku futen ne databaze te dhenat kryesore te provimit

// kontrollojme nese pedagogu ka aksesuar sistemin me id e tij unike dhe nese ka klikuar linkun shto provim
if(isset($_SESSION['id_code'])){
if(@$_GET['p']== 'krijoprovim' && $_SESSION['id_code']=='pedagog002244') {
$lenda = $_POST['lenda'];// marrim emrin e lendes nepermjet vektorit $_POST
$fakulteti=$_POST['fakulteti'];//marrim fakultetin e provimit
$ushtrimet = $_POST['ushtrimet'];// marrim nr e ushtrimeve
$sakte = $_POST['correct'];//marrim piket per ushtrim te sakte
$gabim = $_POST['gabim'];// piket per ushtrim te gabuar

$idprovim=md5(time().mt_rand(1,1000));// gjeneron nje id unike te enkriptuar per provimin bazuar ne kohen e shtimit te provimit

//fusim te dhenat ne tabelen provim
$insertprovim_3=mysqli_query($connect,"INSERT INTO provim VALUES  ('$idprovim','$lenda' , '$fakulteti', '$sakte' , '$gabim','$ushtrimet' , NOW())");

//ridrejtojme ne fazen e dyte te shtimit te provimit ku jepen pyetjet dhe alternativat perkatese
header("location:pedagog.php?p=2&faza=2&provim_id=$idprovim&numri=$ushtrimet");
}
}
//faza e dyte e shtimit te nje provimi te ri ne sistem eshte futja e pyetjeve me alternativat perkatese ne databaze

if (isset($_SESSION['id_code'])) {
	if (@$_GET['p']=='krijopyetje' && $_SESSION['id_code']=='pedagog002244') {
		$numri=@$_GET['numri']; //merret nr pyetjeve
		$provim_id=@$_GET['provim_id'];// id e provimit
		$alt=@$_GET['alt'];// nr i alternativave

for ($prefix=1; $prefix<=$numri; $prefix++) { 

$pyetje_id=md5(time().mt_rand(1,1000));// gjenerojme id unike per pyetjet

$pyetje=$_POST['pyetje'.$prefix];// marrim me ane te vektorit $_POST secilen pyetjeve per ta ruajtur ne bazen e te dhenave

//fusim ne tabelen kerkesa te gjitha pyetjet per provimin perkates
$insertkerkesa_3=mysqli_query($connect, "INSERT INTO kerkesa VALUES('$provim_id', '$pyetje_id', '$pyetje','$alt','$prefix')");

$alternativa_a_id=md5(time().mt_rand(1,1000));// gjenerojme nga nje id
$alternativa_b_id=md5(time().mt_rand(1,1000));// unike per secilen 
$alternativa_c_id=md5(time().mt_rand(1,1000));// alternative ne menyre qe
$alternativa_d_id=md5(time().mt_rand(1,1000));// te enkriptohen te dhenat

$a=$_POST[$prefix.'alfa'];//marrim me ane te vektorit 
$b=$_POST[$prefix.'beta'];//$_POST secilen pyetjeve
$c=$_POST[$prefix.'gama'];//per ta ruajtur ne bazen
$d=$_POST[$prefix.'delta'];//e te dhenave

//futen ne bazen e te dhenave alternativat a b c d
$insert_a=mysqli_query($connect,"INSERT INTO alternativat VALUES  ('$pyetje_id','$a','$alternativa_a_id')") or die('Error54');

$insert_b=mysqli_query($connect,"INSERT INTO alternativat VALUES  ('$pyetje_id','$b','$alternativa_b_id')") or die('Error56');

$insert_c=mysqli_query($connect,"INSERT INTO alternativat VALUES  ('$pyetje_id','$c','$alternativa_c_id')") or die('Error58');

$insert_d=mysqli_query($connect,"INSERT INTO alternativat VALUES  ('$pyetje_id','$d','$alternativa_d_id')") or die('Error60');


$p_e_s=$_POST['pergjigje'.$prefix];// marrim me ane te vektorit $_POST pergjigjen e sakte


if ($p_e_s=='a') {
	$pergjigje_id=$alternativa_a_id; // nese a eshte pergjigjia e sakte e zgjedhur nga pedagogu id e saj barazohet me pergjige id e keshtu me radhe per secilen
}

elseif ($p_e_s=='b') {
	$pergjigje_id=$alternativa_b_id;
}

elseif ($p_e_s=='c') {
	$pergjigje_id=$alternativa_c_id;
}

elseif ($p_e_s=='d') {
	$pergjigje_id=$alternativa_d_id;
}
else {
$pergjigje_id=$alternativa_a_id;	// by default pergjigja e sakte eshte a
}




	$insert_pergjigje=mysqli_query($connect,"INSERT INTO pergjigjet VALUES  ('$pyetje_id','$pergjigje_id')");
}

// futet ne bazen e te dhenave pergjigjia e sakte dhe te ridrejton ne listen e provimeve
header("location:pedagog.php?p=3");

}

}

?>
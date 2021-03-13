<?php
//variabli connect eshte i aksesueshem ne te gjitha queryt
$connect= new mysqli('localhost','root','','examination')or die("Ka ndodhur nje gabim ne lidhjen me bazen e te dhenave!".mysqli_error($connect));
session_start();
$email=$_SESSION['email'];

//nis sekuenca e kodit per zhvillimin e provimit

if(@$_GET['p']== 'provim' && @$_GET['faza']== 2) {
$provim_id=@$_GET['provim_id'];//merret id e provimit
$nrp=@$_GET['numri'];// numri i pyetjeve
$ushtrimet=@$_GET['u'];// numri i ushtrimit ne fjale
$pergjigje=$_POST['pergjigje'];// merret pergjigjia
$pyetje_id=@$_GET['pyetje_id'];// merret id e pyetjes

// marrim pyetjet dhe pergjigjet nga tabela e pergjigjeve ne menyre qe te behet kontrolli i pergjigjeve te sakta
$select_p=mysqli_query($connect,"SELECT * FROM pergjigjet WHERE pyetje_id='$pyetje_id' " );


while($row=mysqli_fetch_array($select_p) )
{
$pergjigje_id=$row['pergjigje_id'];
}

// krahasohet pergjigjia e dhene nga studenti me id e pergjigjes se sakte per te vleresuar saktesine e pergjigjes
if($pergjigje == $pergjigje_id)
{
	// nese pergjigja eshte e sakte merret e dhena nga tabela provim 
$select_p=mysqli_query($connect,"SELECT * FROM provim WHERE provim_id='$provim_id' " );

while($row=mysqli_fetch_array($select_p) )
{
$sakte=$row['sakte'];// piket e vleresimit te pergjigjes se sakte
}

if($nrp == 1)
{
$insert_v=mysqli_query($connect,"INSERT INTO vleresim VALUES('$email','$provim_id' ,'0','0','0','0',NOW())")or die('Error38'); // nese nrp (numri i pyetjes) eshte 1 futim ne bazen e te dhenave, email, id provimi, kohen dhe vlerat e tjera me 0 sepse nuk kemi nisur ende te japim pergjigje
}


$select_v=mysqli_query($connect,"SELECT * FROM vleresim WHERE provim_id='$provim_id' AND email='$email' ")or die('Error42');


while($row=mysqli_fetch_array($select_v) )
{
$piket=$row['rezultatip'];
$skt=$row['sakte'];
}

$skt++; // per sa kohe japim pergjigje te sakta rritet numri i pergjigjeve te sakta dhe rriten piket
$piket=$piket+$sakte;// shtohen piket me nje te sakte 

// bejme update tabeles vleresim me rezultatet e reja
$update_v=mysqli_query($connect,"UPDATE `vleresim` SET `rezultatip`=$piket,`niveli`=$nrp,`sakte`=$skt, data_provim= NOW()  WHERE  email = '$email' AND provim_id = '$provim_id'")or die('Error55');

} 

// perndryshe nese japim pergjigje te gabuar ndiqet po e njejta procedure, vetem se ne kete rast zbriten pike
else
{
$select_p=mysqli_query($connect,"SELECT * FROM provim WHERE provim_id='$provim_id' " )or die('Error62');


while($row=mysqli_fetch_array($select_p) )
{
$gabim=$row['gabim'];
}


if($nrp == 1)
{
$insert_v=mysqli_query($connect,"INSERT INTO vleresim VALUES('$email','$provim_id' ,'0','0','0','0',NOW() )")or die('Error73');
} // nese nrp (numri i pyetjes) eshte 1 futim ne bazen e te dhenave, email, id provimi, kohen dhe vlerat e tjera me 0 sepse nuk kemi nisur ende te japim pergjigje


$select_v=mysqli_query($connect,"SELECT * FROM vleresim WHERE provim_id='$provim_id' AND email='$email' " )or die('Error77');


while($row=mysqli_fetch_array($select_v) )
{
$piket=$row['rezultatip'];
$gab=$row['gabim'];
}
$gab++; // per sa kohe japim pergjigje te gabuara, rritet numri i pergjigjeve te gabuara si edhe zbriten po aq pike sa ka caktuar pedagogu per cdo pergjigje te gabuar
$piket=$piket-$gabim;


$update_v=mysqli_query($connect,"UPDATE `vleresim` SET `rezultatip`=$piket,`niveli`=$nrp,`gabim`=$gab, data_provim=NOW() WHERE  email = '$email' AND provim_id = '$provim_id'")or die('Error89');
}
// perditesohet tabela vleresim me te dhenat e reja

if($nrp != $ushtrimet)
{
$nrp++;// nese nrp (numri i pyetjes) nuk eshte e == me totalin e ushtrimeve ridrejtojme te pyetja tjeter
header("location:profile.php?p=provim&faza=2&provim_id=$provim_id&numri=$nrp&u=$ushtrimet")or die('Error96');
}

// perndryshe shfaqim rezultatet
else header("location:profile.php?p=perfundimet&provim_id=$provim_id");
}


?>

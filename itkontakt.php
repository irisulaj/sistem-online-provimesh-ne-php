<?php
if(isset($_POST['submit'])){

$stname=$_POST['stname'];
$stlname=$_POST['stlname'];
$tema=$_POST['tema'];
$stemail=$_POST['stemail'];
$stmessage=$_POST['stmessage'];


$itemail="it@uet.com";

$headers="Nga: ".$stemail;

$text = "Keni nje email nga ".$stname.".\n\n\n".$stmessage;

mail($itemail, $tema, $text, $headers);

header("Location: form.php?Mesazhi_u_dergua!!!");
}

?>
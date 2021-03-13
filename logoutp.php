<?php 
session_start();

if(isset($_SESSION['pedagogusername'])){
session_destroy();
}

$reference= @$_GET['p'];
header("location:shtepiza.php");

?>
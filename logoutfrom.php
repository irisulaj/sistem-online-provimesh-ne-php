<?php 
session_start();

if(isset($_SESSION['email'])){
session_destroy();
}

if(isset($_POST['logout']))
{
 session_destroy();
 echo "success";
 exit();
}
$pointer= @$_GET['p'];
header("location:$pointer");


?>
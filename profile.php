<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- per pajisjet mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-VLERËSIM-Student</title>

    <!-- frameworket e jquery nga bootstrap -->
    <script src="js/jquery-3.5.1.slim.min.js" ></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- importimi i google fonts-->
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style1.css" >
   <link rel="stylesheet" type="text/css" href="navrrip.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- importimi i ajax file -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body> 	
    	  <?php
  // perfshijme filen e lidhjes me databazen dhe kontrollojme qe nese nuk jemi te aksesuar te ridrejtohemi ne faqen e profilit
//variabli connect eshte i aksesueshem ne te gjitha queryt
$connect= new mysqli('localhost','root','','examination')or die("Ka ndodhur nje gabim ne lidhjen me bazen e te dhenave!".mysqli_error($connect));
session_start();
  if(!(isset($_SESSION['email']))){
header("location:shtepiza.php");
}
else
{
$emri = $_SESSION['emri'];
$email=$_SESSION['email'];
}
?>
<!-- fillojme me navigation bar -->

<div class="topnav" id="myTopnav">
  
  <a class="navbar-brand active">E-VLERËSIM</a>
  <a href="profile.php?p=1">Lëndët</a>
  <a href="profile.php?p=2">Notat</a>
  <a href="profile.php?p=3">Riprovime</a>
  <a class="nav-link text-danger">
<script type="text/javascript">

    //fillon sekuenca e kodit per kohematesin
function start_countdown()
{
 var counter=90;
 myVar= setInterval(function()
 { 
  if(counter>=0)
  {
   document.getElementById("countdown").innerHTML="<b>Koha e mbetur " +counter+ " sekonda! <b>";
  }
  if(counter==0)
  {
   $.ajax
   ({
     type:'post',
     url:'logoutfrom.php',
     data:{
      logout:"logout" // ben logout kur countei eshte zero dhe te ridrejton ne home page
     },
     success:function(response) 
     {
      window.location="shtepiza.php";
     }
   });
   }
   counter--;
 }, 1000)
}
</script>

<?php
// kushti per nisjen e kohematesit qe eshte nisja e provimit
if(@$_GET['p']== 'provim' && @$_GET['faza']== 2 && @$_GET['numri']){
 ?>
 <script>start_countdown();</script>

 <p id="countdown"></p>
 
<?php
}
else
{
 ?>
<?php 
}
?>
</a>
 <form class="form-inline my-2 my-lg-0">
<!-- shfaq ne krye mesazhin Pershendetje dhe emrin e studentit-->
      <a class="text-white" style="font-family: 'Montserrat', serif;"> Përshëndetje, <?php
echo '
 <a class="text-white" href="profile.php?p=1">'.$emri.'</a>
';?> &nbsp;</a> 
      <a class="btn btn-danger btn-sm" style="padding: 3px 8px;" href="logoutfrom.php?p=profile.php">Log Out</a>
    </form>  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>


<?php if(@$_GET['p']==1) {
// query qe zgjedh nga tabela provime vetem lendet qe jane pjese e fakultetit ku eshte edhe studenti
  $selectprovim=mysqli_query($connect,"SELECT provim.*,regjistrohu.* FROM provim, regjistrohu
  WHERE  provim.fakulteti=regjistrohu.fakulteti AND email='{$_SESSION['email']}' ORDER BY data_provim DESC") or die ('Error131');

echo  '<div class="panel"><div class="table-responsive"><table class="table table-hover">
<tr class="bg-info text-white"><td><b>Nr.</b></td><td><b>Lënda</b></td><td><b>Nr. i ushtrimeve</b></td><td><b>Pikët Max</b></td><td><b>Koha</b></td><td><b>
 Statusi i Provimit</b></td></tr>';

     $numerator=1;
     $kohap=1.5;
     while($row=mysqli_fetch_array($selectprovim)) {
           $lenda = $row['lenda'];
           $ushtrimet = $row['ushtrimet'];
           $sakte = $row['sakte'];
           $provim_id = $row['provim_id'];

$selectvleresim=mysqli_query($connect,"SELECT rezultatip FROM vleresim WHERE provim_id='$provim_id' AND email='$email'" )or die('Error146');
//kontrollojme nese provimi eshte dhene njeher dhe nese jo (vleresimdata==0)shfaqim butonin e nisjes se provimit
      $vleresimdata=mysqli_num_rows($selectvleresim);  
      if($vleresimdata == 0){
  echo '<tr style=" color:#05bdeb"><td>'.$numerator++.'</td><td>'.$lenda.'</td><td>'.$ushtrimet.'</td><td>'.$sakte*$ushtrimet.'</td><td>'.$ushtrimet*$kohap.'&nbsp; min</td>
  <td><b><a href="profile.php?p=provim&faza=2&provim_id='.$provim_id.'&numri=1&u='.$ushtrimet.'" class="btn btn-outline-info btn-sm"><b>Fillo Provimin</b></a></b></td></tr>';
}
else
{
  //perndryshe nese provimi eshte dhene njeher (vleresimdata==1) shfaqim me te gjelber qe provimi eshte kryer
echo '<tr style="color:#00d607"><td>'.$numerator++.'</td><td>'.$lenda.'&nbsp;</td><td>'.$ushtrimet.'</td><td>'.$sakte*$ushtrimet.'</td><td>'.$ushtrimet*$kohap.'&nbsp;min</td>
  <td><b><a href="" class="btn btn-success btn-sm"><b class="text-white">Kryer</b></a></b></td></tr>';
}
}
$numerator=0;
echo '</table></div></div>';

}
?>

<!--pasi klikojme fillo provimin nis zhvillimi i tij-->
<?php
if(@$_GET['p']== 'provim' && @$_GET['faza']== 2) {
$provim_id=@$_GET['provim_id'];//marrim te dhenat e provimit
$nrp=@$_GET['numri'];
$ushtrimet=@$_GET['u'];


$selectkerkesa="SELECT * FROM kerkesa WHERE provim_id='$provim_id' AND nrp='$nrp' ";//marrim pyetjet e provimit qe kemi nisur nga baza e te dhenave


echo '<div class="panel" style="margin:20px;">';
$getdata = $connect->query($selectkerkesa);
    if ($getdata->num_rows > 0) {
     while($row = $getdata->fetch_assoc()) {
$pyetje=$row['pyetje'];
$pyetje_id=$row['pyetje_id'];
echo '<div class="container" >
    <div class="row">
  <div class="col-md-3">

  </div>
   <div class="col-md-6">
  ';
echo $nrp.'.&nbsp'.$pyetje.'<br /><br />';
}
}
$selectalternativat="SELECT * FROM alternativat WHERE pyetje_id='$pyetje_id' "or die('Error186');
//marrim alternativat e pyetjes specifike nga tabela alternativat


echo '<form action="startexam.php?p=provim&faza=2&provim_id='.$provim_id.'&numri='.$nrp.'&u='.$ushtrimet.'&pyetje_id='.$pyetje_id.'" method="POST"  class="form-horizontal">
<br />';

$getdata = $connect->query($selectalternativat);
    if ($getdata->num_rows > 0) {
     while($row = $getdata->fetch_assoc()) {
$alternativa=$row['alternativa'];
$alternativa_id=$row['alternativa_id'];
echo'<input type="radio" name="pergjigje" value="'.$alternativa_id.'">&nbsp &nbsp'.$alternativa.'<br /><br />';
}
}
// pjesa ku behen submit pergjigjet
echo'<br /><button type="submit" class="btn btn-outline-primary">&nbsp;Përgjigju</button></form></div></div>';
echo ' <div class="col-md-3">
  </div>';
}

//pas berjes submit te pergjigjes se fundit shfaqen rezultatet
if(@$_GET['p']== 'perfundimet' && @$_GET['provim_id']) 
{
$provim_id=@$_GET['provim_id'];

$selectvleresim=mysqli_query($connect,"SELECT * FROM vleresim WHERE provim_id='$provim_id' AND email='$email' " )or die('Error210'); // marrim nga tabela vleresim rezultatet e provimit per ti shfaqur sapo provimi te kryhet
echo  '<div class="panel">
<center><h3 class="title" style="color:#42a1f5">Rishikimi i provimit</h3><center><br /><table class="table table-hover">';

  while($row=mysqli_fetch_array($selectvleresim)) {
         $piket=$row['rezultatip'];
         $gab=$row['gabim'];
         $skt=$row['sakte'];
         $pa=$row['niveli'];
echo '<tr style="color:#42a1f5"><td>Nr. i ushtrimeve</td><td>'.$pa.'</td></tr>
      <tr style="color:#42a1f5"><td>Përgjigje të sakta&nbsp;<span></span></td><td>'.$skt.'</td></tr> 
    <tr style="color:red"><td>Përgjigje të gabuara&nbsp;<span></span></td><td>'.$gab.'</td></tr>
    <tr style="color:#42a1f5"><td>Pikët e marra&nbsp;<span></span></td><td>'.$piket.'</td></tr></table></div>';
}
}
?>
<!--Perfundon zhvillimi i provimit-->
<?php
//seksioni i vleresimit aty ku shfaqen notat e te gjitha lendeve qe studenti ka dhene provim
if(@$_GET['p']== 2) 
{
$selectvleresim=mysqli_query($connect,"SELECT * FROM vleresim WHERE email='$email' ORDER BY data_provim DESC ")or die('Error234');// marrim rezultatet e secilit provim nga tabela vleresim
echo  '<div class="panel">
<div class="table-responsive">
<table class="table table-hover" >
<tr class="bg-info text-white"><td><b>Nr.</b></td><td><b>Lënda</b></td><td><b>Ushtrimet</b></td><td><b>Saktë</b></td><td><b>Gabim<b></td><td><b>Pikët</b></td><td><b>Nota</b></td>';
$numerator=0;

  while($row=mysqli_fetch_array($selectvleresim)) {
             $provim_id=$row['provim_id'];
             $piket=$row['rezultatip'];
             $gab=$row['gabim'];
             $skt=$row['sakte'];
             $pa=$row['niveli'];
$selectlprovim=mysqli_query($connect,"SELECT lenda FROM provim WHERE  provim_id='$provim_id' " )or die('Error248');
//marrim emrin e lendes qe do i shfaqim rezultatin e provimit nga tabela provim
while($row=mysqli_fetch_array($selectlprovim) )
{
$lenda=$row['lenda'];
}
$numerator++;
echo '<tr><td>'.$numerator.'</td><td>'.$lenda.'</td><td>'.$pa.'</td><td>'.$skt.'</td><td>'.$gab.'</td><td>'.$piket.'</td>';

   $nota=1;
if ($piket<=40) {
   $nota=4;
 } elseif ($piket>40 && $piket<=50) {
   $nota=5;
 } elseif ($piket>50 && $piket<=60) {
   $nota=6;
 } elseif ($piket>60 && $piket<=70) {
   $nota=7;
 } elseif ($piket>70 && $piket<=80) {
   $nota=8;
 } elseif ($piket>80 && $piket<=90) {
   $nota=9;
 } elseif ($piket>90 && $piket<=100) {
   $nota=10;
 } else {
   $nota=0;
}
echo'<td>'.$nota.'</td></tr>';
}
echo'</table></div></div>';
}
?>
<!-- ne seksionin e trete te profilit te studentit shfaqet forma per regjistrimin e lendeve per riprovim-->
<?php if(@$_GET['p']==3){
  echo '
<div class="container" >
    <div class="row">
  <div class="col-md-3">

  </div>

    <div class="col-md-6">
  <form  action="riprovime.php" method="POST">

  <fieldset>
  <legend class="text-primary" style="text-align: center;">Regjistro Riprovimet </legend>
<label for="emri"></label>
<div class="row">
<div class="col">
                <div class="form-group">

                    <input type="text" name="emri" id="emri" class="form-control" placeholder="Emri">
                    
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <input type="text" name="mbiemri" id="mbiemri" class="form-control"  placeholder="Mbiemri">
                    
                </div>
            </div>
</div>

       
               <input type="email" name="email" id="email" class="form-control" placeholder="Email">        
<label for="viti"></label>
       <div class="row">
            <div class="col">

           <div>

             <select name="viti" id="viti" class="form-control">
                <option value="zgjidhvitin">Viti</option>
                <option value="1">1</option>
                <option value="2">2</option>
                  <option value="3">3</option>
            </select>
            </div>
               
            </div>
            <div class="col">
                <div class="form-group">
                    
         <select name="fakulteti" id="fakulteti" class="form-control">
                <option value="zgjidhfakultetin">Fakulteti</option>
                <option value="Juridik">Fakulteti i Shkencave Juridike, Politike dhe Marredhenieve Nderkombetare</option>
                <option value="Ekonomik">
Fakulteti i Ekonomise, Biznesit dhe Zhvillimit</option>
                  <option value="Humane">Fakulteti i Shkencave Humane, Edukimit dhe Arteve Liberale</option>
                   <option value="Inxhinieri">Fakulteti i Inxhinierise, Informatikes dhe Arkitektures</option>
                  <option value="Mjekesi">Fakulteti i Shkencave Mjekesore Teknike</option>
            </select>
                    
                </div>
            </div>

        </div>               
                     <select name="numril" id="numril" class="form-control">
                <option value="zgjidhnumril">Numri i lëndëve</option>
                <option value="1">1</option>
                <option value="2">2</option>
                  <option value="3">3</option>
            </select>

<label for="lenda1"></label>
               <input type="text" name="lenda1" id="lenda1" class="form-control" placeholder="Lënda 1">

<label for="lenda2"></label>
<input type="text" name="lenda2" id="lenda2" class="form-control" placeholder="Lënda 2">

<label for="lenda3"></label>
<input type="text" name="lenda3" id="lenda3" class="form-control" placeholder="Lënda 3">

                    <label for="submit">  </label>

                    <button type="submit" name="submit" value="" class="btn btn-large btn-block btn-primary"> Regjistro Riprovimet</button>
  </fieldset>                              
</form>
</div>
  <div class="col-md-3">

  </div>
</div>
</div>

  ';
}
?>

</body>
</html>
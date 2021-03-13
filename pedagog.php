<!DOCTYPE html>


<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> E-VLERESIM-Pedagog</title>
	<script src="js/jquery-3.5.1.slim.min.js" ></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" type="text/css" href="style1.css">
 <link rel="stylesheet" type="text/css" href="navrrip.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
      
        <?php
//variabli connect eshte i aksesueshem ne te gjitha queryt
$connect= new mysqli('localhost','root','','examination')or die("Ka ndodhur nje gabim ne lidhjen me bazen e te dhenave!".mysqli_error($connect));
?>

        <?php
session_start();
  if(!(isset($_SESSION['pedagogusername']))){
header("location:shtepiza.php");

}
else
{

$pedagogusername=$_SESSION['pedagogusername'];

}
?>
<div class="topnav" id="myTopnav">
  <a class="navbar-brand active">E-VLERËSIM</a>
  <a href="pedagog.php?p=1">Studentët</a>
  <a href="pedagog.php?p=2">Provim i Ri</a>
  <a href="pedagog.php?p=3">Lista e Provimeve</a>
   <a href="pedagog.php?p=4">Riprovime</a>
 <form class="form-inline my-2 my-lg-0">

      <a class="text-white" style="font-family: 'Montserrat', serif;"> Përshëndetje, Pedagog</a> &nbsp;
      <a class="btn btn-danger btn-sm my-2 my-sm-0" style="padding: 3px 8px;"href="logoutp.php" role="button">Log Out</a>
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



<!-- Menuja ku shfaqet lista e studenteve qe jane ne te njejtin fakultet me pedagogun perkates qe eshte loguar ne sistem-->
<?php if(@$_GET['p']==1) {

 $pedagogusername=['pedagogusername'];
  $selectstudent=mysqli_query($connect,"SELECT regjistrohu.*,pedagog.* FROM regjistrohu, pedagog
  WHERE  regjistrohu.fakulteti=pedagog.fakulteti AND pedagogusername='{$_SESSION['pedagogusername']}'" ) or die ('Error78');

echo  '<div class="panel"><div class="table-responsive"><table class="table table-hover">
<tr class="bg-info text-white"><td><b>Nr.</b></td><td><b>Emri</b></td><td><b>Mbiemri</b></td><td><b>Gjinia</b></td><td><b>Email</b></td><td><b>Nr.telefonit</b></td><td><b>Fshi Student</b></td></tr>';
$numerator=1;
while($row=mysqli_fetch_array($selectstudent)) {
          $emri = $row['emri'];
          $mbiemri = $row['mbiemri'];
          $gjinia = $row['gjinia'];
          $telefon = $row['telefon'];
          $email = $row['email'];

  echo '<tr><td>'.$numerator++.'</td><td>'.$emri.'</td><td>'.$mbiemri.'</td><td>'.$gjinia.'</td><td>'.$email.'</td><td>'.$telefon.'</td>
  <td><a href="delete.php?delete_email='.$email.'" class="btn btn-danger btn-sm" role="button">Fshi Student</a></td></tr>';
}
$numerator=0;
echo '</table></div></div>';

}
?>

<!-- Forma ku do te jepen karakteristikat kryesore te shtimit te nje provimi ne sistem -->

<?php
if(@$_GET['p']==2 && !(@$_GET['faza']) ) {
echo '
<div class="container" >
    <div class="row">
<div class="col-md-3">
  </div>
    <div class="col-md-6">
 <form name="form" action="manage.php?p=krijoprovim" method="POST" >
        <fieldset>
          <legend class="text-secondary" style="text-align: center;">Jep karakteristikat e provimit: </legend>
                            <label for="lenda"></label>
                    <input type="text" name="lenda" id="lenda" class="form-control" placeholder="Lënda">

                <label for="fakulteti"></label>
         <select name="fakulteti" id="fakulteti" class="form-control" >
                <option value="zgjidhfakultetin">Fakulteti</option>
                <option value="Juridik">Fakulteti i Shkencave Juridike, Politike dhe Marredhenieve Nderkombetare</option>
                <option value="Ekonomik">
Fakulteti i Ekonomise, Biznesit dhe Zhvillimit</option>
                  <option value="Humane">Fakulteti i Shkencave Humane, Edukimit dhe Arteve Liberale</option>
                   <option value="Inxhinieri">Fakulteti i Inxhinierise, Informatikes dhe Arkitektures</option>
                  <option value="Mjekesi">Fakulteti i Shkencave Mjekesore Teknike</option>
            </select>
      
            <label for="ushtrimet"></label>
            <input type="number" name="ushtrimet" id="ushtrimet" class="form-control" required placeholder="Numri i ushtrimeve">

             <label for="correct"></label>
            <input type="number" name="correct" id="correct" class="form-control" required placeholder="Numri i pikëve për ushtrim">

             <label for="gabim"></label>
            <input type="number" name="gabim" id="gabim" class="form-control" placeholder="Pikët penalizuese për përgjigje të gabuara">

<label for="submit"></label>
        <button type="submit" class ="btn btn-large btn-block btn-secondary" value="submit">Shto Provim</button>
        </fieldset>

    </form>
    </div>
    <div class="col-md-3">
    </div>
';
}?>
<!-- Mbyllet faza e pare e shtimit te provimit dhe te dhenat dergohen ne bazen e te dhenave ku numri i pyetjeve do te perdoret qe ne anen e pedagogut te shfaqet i njejti numer formash per secilen e pyetjeve -->

<!--Faza e dyte e shtimit te provimit ku jepen te dhenat per secilin nga ushtrimet perkatese-->

<?php
if(@$_GET['p']==2 && (@$_GET['faza'])==2 ) {
echo ' 
<div class="container" >
    <div class="row">

<div class="col-md-3">

  </div>

<div class="col-md-6">

 <form class="form-horizontal title1" name="form" action="manage.php?p=krijopyetje&numri='.@$_GET['numri'].'&provim_id='.@$_GET['provim_id'].'&alt=4 "  method="POST" >
<fieldset>
';
 
 for($prefix=1;$prefix<=@$_GET['numri'];$prefix++)// cikli for ben te mundur qe forma per futjen e te dhenave te ushtrimit ne databaze te perseritet po aq here sa ushtrime kemi te dhene nga Pedagogu
 {
echo '<b class="text-secondary">Ushtrimi &nbsp;'.$prefix.'&nbsp;:</><br />

<!-- Futet ne databaze kerkesa e ushtrimit perkates-->
<label for=""> </label>
  <textarea rows="3" cols="4" name="pyetje'.$prefix.'" class="form-control" placeholder="Jepni kërkesën '.$prefix.':"></textarea>  
  
<!-- Futen ne databaze alternativat e ushtrimit sipas radhes-->
<label for=""> </label>
  <input type="text" name="'.$prefix.'alfa"  id="'.$prefix.'alfa"  class="form-control input-md"  placeholder="Jepni alternativën a:">
    
<!-- Futen ne databaze alternativat e ushtrimit sipas radhes-->
<label for=""> </label>
  <input type="text" name="'.$prefix.'beta"  id="'.$prefix.'beta"  class="form-control input-md"  placeholder="Jepni alternativën b:">
    
<!-- Futen ne databaze alternativat e ushtrimit sipas radhes-->
<label for=""> </label>
  <input type="text" name="'.$prefix.'gama"  id="'.$prefix.'gama"  class="form-control input-md"  placeholder="Jepni alternativën c:">
    
<!-- Futen ne databaze alternativat e ushtrimit sipas radhes-->
<label for=""> </label>
  <input type="text" name="'.$prefix.'delta"  id="'.$prefix.'delta"  class="form-control input-md"  placeholder="Jepni alternativën d:">
    

<!-- Zgjidhet alternativa e sakte qe i korrespondon ushtrimit perkates-->
<br />
<b>Jepni alternativën e saktë</b>:<br />
<select id="pergjigje'.$prefix.'" name="pergjigje'.$prefix.'" placeholder="Zgjidhni pergjigjen e sakte" class="form-control input-md" >
   <option value="a">Zgjidhni përgjigjen e saktë për ushtrimin '.$prefix.'</option>
  <option value="a">Alternativa a</option>
  <option value="b">Alternativa b</option>
  <option value="c">Alternativa c</option>
  <option value="d">Alternativa d</option> </select><br /><br />'; 
 }   
echo '
    <input  type="submit" class="btn btn-block btn-outline-secondary" value="Shto Provim"/> 
    <!--Butoni submit lihet jashte ciklit for ne menyre qe te mos shfaqet ne menyre te panevojshme disa here ne panelin e adminit-->
</fieldset>
</form>  
</div>
<div class="col-md-3">
  </div>';
}
?><!--Mbyllet faza e dyte e shtimit te provimit-->


<!--fshi provimin nga sistemi-->
<?php if(@$_GET['p']==3) {

$selectprovim=mysqli_query($connect,"SELECT provim.*,pedagog.* FROM provim, pedagog
  WHERE  provim.fakulteti=pedagog.fakulteti AND pedagogusername='{$_SESSION['pedagogusername']}' ORDER BY data_provim DESC") or die ('Error219');

echo  '<div class="panel"><div class="table-responsive"><table class="table table-hover">
<tr class="bg-info text-white"><td><b>Nr.</b></td><td><b>Lënda</b></td><td><b>Nr. i ushtrimeve</b></td><td><b>Pikët Max</b></td><td><b>Koha</b></td><td><b>Fshi Provimin</b></td></tr>';
$numerator=1;
$kohap=1.5;
while($row=mysqli_fetch_array($selectprovim)) {
          $lenda = $row['lenda'];
          $ushtrimet = $row['ushtrimet'];
          $sakte= $row['sakte'];
          $provim_id = $row['provim_id'];
  echo '<tr><td>'.$numerator++.'</td><td>'.$lenda.'</td><td>'.$ushtrimet.'</td><td>'.$sakte*$ushtrimet.'</td><td>'.$ushtrimet*$kohap.'&nbsp;min</td>
  <td><b><a href="delete.php?p=fshiprovim&provim_id='.$provim_id.'" class="btn btn-danger btn-sm"<b>Fshi Provimin</b></a></b></td></tr>';
}
$numerator=0;
echo '</table></div></div>';

}
?>

<!--shfaqen ne panelin e pedagogut lendet e vendosura per riprovim nga studenti-->
<?php if (@$_GET['p']==4) {
 
$pedagogusername=['pedagogusername'];
  $selectriprovime=mysqli_query($connect,"SELECT riprovime.*,pedagog.* FROM riprovime, pedagog
  WHERE  riprovime.fakulteti=pedagog.fakulteti AND pedagogusername='{$_SESSION['pedagogusername']}'" ) or die ('Error244');

echo  '<div class="panel"><div class="table-responsive"><table class="table table-hover">
<tr class="bg-info text-white"><td><b>Nr.</b></td><td><b>Emri</b></td><td><b>Mbiemri</b></td><td><b>Email</b></td><td><b>Viti</b></td><td><b>Nr. lëndëve</b></td><td><b>Lënda 1</b></td><td><b>Lënda 2</b></td><td><b>Lënda 3</b></td><td><b>Fshi Regjistrimin</b></td></tr>';
$numerator=1;
while($row=mysqli_fetch_array($selectriprovime)) {
          $emri = $row['emri'];
          $mbiemri = $row['mbiemri'];
          $email = $row['email'];
          $viti = $row['viti'];
          $numril = $row['numril'];
          $lenda1 = $row['lenda1'];
          $lenda2 = $row['lenda2'];
          $lenda3 = $row['lenda3'];
          
  echo '<tr><td>'.$numerator++.'</td><td>'.$emri.'</td><td>'.$mbiemri.'</td><td>'.$email.'</td><td>'.$viti.'</td><td>'.$numril.'</td><td>'.$lenda1.'</td><td>'.$lenda2.'</td><td>'.$lenda3.'</td>
  <td><a href="delete.php?fshi_email='.$email.'" class="btn btn-danger btn-sm" role="button">Fshi Regjistrimin</a></td></tr>';
}
$numerator=0;
echo '</table></div></div>';
}
?>
<!--mbyllet seksioni i shfaqjes se lendeve per riprovim-->

</div>
</body>
</html>

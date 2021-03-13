<?php
$emri=$_POST['emri'];
$mbiemri=$_POST['mbiemri'];
$universiteti = $_POST['universiteti'];
$fakulteti= $_POST['fakulteti'];
$gjinia = $_POST['gjinia'];
$viti = $_POST['viti'];
$username = $_POST['username'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$fkalimi = $_POST['fkalimi'];

$fkalimi = md5($fkalimi);// enkripton fjalekalimin

// inicializimi i vektorit $_POST per futjen e vleres se variablave ne databaze
// kontrollojme nese jane futur te gjithe elemntet ne forme nga perdoruesi
if (!empty($emri)||!empty($mbiemri)||!empty($universiteti) || !empty($fakulteti) || !empty($gjinia) || !empty($viti) || !empty($username) || !empty($email)|| !empty($telefon)|| !empty($fkalimi) ) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "examination";
    //Nese te gjithe elementet jane futur ndertojme lidhjen me databazen
    $connect = new mysqli($host, $dbUsername, $dbPassword, $dbname); // deklarojme dhe inicializojme nepermjet funksionit mysqli variablin qe do na beje lidhjen, ky funksion merr kater parametra
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());// nese ka error shfaqim Connect error
    } else {
     $SELECT = "SELECT email From emailtable Where email = ? Limit 1";// perndryshe bejme nje deklarat select qe sherben per te validuar emailin ne rast se ai ndodhet ne bazen e te dhenave te shkolles per t'i dhene te drejten e aksesit studentit ne sistem
     $SELECT_2 = "SELECT email From regjistrohu Where email = ? Limit 1";// perndryshe bejme nje deklarat select qe sherben per te validuar emailin ne rast se ai eshte regjistruar ose jo me pare ne sistem

     $INSERT = "INSERT Into regjistrohu (emri, mbiemri, universiteti, fakulteti, gjinia, viti, username, email, telefon, fkalimi) values(?, ?, ?, ?, ?, ?, ?, ?,?, ?)";// me nje deklarate insert te dhenat e formes i dergojme ne  databaze
    
     $stmt = $connect->prepare($SELECT);//Prepare statement eshte nje opsion qe perdoret per te ekzekutuar te njejten query ne SQL ne menyre te perseritur dhe me efikasitet te larte. Porgrami mund ta ekzekutoje statementin sa here qe deshiron me vlera te ndryshme.
     $stmt->bind_param("s", $email);// funksioni bind_param() merr dy parametra variablin dhe tipin e tij ne kete rast s-> string.
     $stmt->execute();// ekzekutohet statementi
     $stmt->bind_result($email);// rezultati qe kthen eshte variabli $email
     $stmt->store_result();// ruhet rezultati
     $rnum = $stmt->num_rows;// iterohet neper numrin e rreshtave per te krahasuar emailet

     $stmt = $connect->prepare($SELECT_2);
     $stmt->bind_param("s", $email);
     $stmt->execute();// ekzekutohet statementi
     $stmt->bind_result($email);// rezultati qe kthen eshte variabli $email
     $stmt->store_result();// ruhet rezultati
     $r2num = $stmt->num_rows;
     if ($rnum==1&&$r2num==0)// nese emaili eshte ne databazen e shkolles dhe nuk eshte i regjistruar me pare ne sistem do te thote qe studenti mund te regjistrohet per te dhene provime
      {
      $stmt->close();
      $stmt = $connect->prepare($INSERT);
      $stmt->bind_param("sssssissis", $emri, $mbiemri, $universiteti, $fakulteti, $gjinia, $viti, $username, $email, $telefon, $fkalimi);
      $stmt->execute();
      header("location: shtepiza.php");
     } else 
     {
      echo '<div class="container" >
    <div class="row">
    <div class="col-md-6">
    <h1 class="text-danger">
Vini Re!!!
    </h1>
    <h3 class="text-danger"> Ju nuk nuk keni te drejte aksesi ne sistem pasi emaili juaj nuk ekziston ne bazen e te dhenave! </br>
      Ose ju jeni regjistruar aktualisht me kete me email! </br>
      Nese mendoni se kemi te bejme me ndonje gabim ju lutem drejtohuni zyres se IT</h3>
      </div>
 <div class="col-md-6">

<form action="itkontakt.php" method="POST">
<fieldset>
 <legend class="text-danger" style="text-align: center;"><h3>Kontakto zyren IT</h3></legend>
<label for="" > </label>
<label for="" > </label>
<label for="" > </label>
<input type="text" name="stname" id="stname" class="form-control" placeholder="Emri">
<label for="" > </label>
<label for="" > </label>
<input type="text" name="stlname" id="stlname" class="form-control" placeholder="Mbiemri">
<label for="" > </label>
<label for="" > </label>
<input type="email" name="stemail" id="stemail" class="form-control" placeholder="Email">
<label for="" > </label>
<label for="" > </label>
<input type="text" name="tema" id="tema" class="form-control" placeholder="Tema">
<label for="" > </label>
<label for="" > </label>
<textarea name="stmessage" id="stmessage" class="form-control" rows="3" cols="4" placeholder="Mesazhi"></textarea>

<label for="" > </label>
<label for="" > </label>
<button type="submit" name="submit" value="" class="btn btn-large btn-block btn-danger"> Kontakto IT</button>
</fieldset>
</form>

  </div>
  </div>
      ';// perndryshe deklarojme qe emaili i studentit nuk eshte ne bazen e te dhenave te shkolles dhe nuk mund te regjistrohet per te dhene provime
      
     }
     $stmt->close();
     $connect->close();// mbyllet statement, mbyllet lidhja
    }
} else {
 echo "Ju lutem jepni te gjitha te dhenat e nevojshme!!!"; // ne rast se studenti nuk i ka dhene te dhenat e plota i kerkohet qe t'i rijape
 die();

}

?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-VLERËSIM-Error 404</title>
   <script src="js/jquery-3.5.1.slim.min.js" ></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="css/bootstrap.min.css" >
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" type="text/css" href="footer.css">
<link rel="icon" href="imazhe/titlelogo.jpg" type="image/x-icon" >
</head>

<body class="bg-dark" >

</body>
</html>

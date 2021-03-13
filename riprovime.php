<?php
$emri=$_POST['emri'];
$mbiemri=$_POST['mbiemri'];
$email = $_POST['email'];
$viti= $_POST['viti'];
$fakulteti = $_POST['fakulteti'];
$numril = $_POST['numril'];
$lenda1 = $_POST['lenda1'];
$lenda2 = $_POST['lenda2'];
$lenda3 = $_POST['lenda3'];
// inicializimi i vektorit $_POST per futjen e te dhenave ne databaze
// kontrollojme nese jane futur te gjithe elemntet ne forme nga perdoruesi
if (!empty($emri)||!empty($mbiemri)||!empty($email) || !empty($viti) || !empty($fakulteti) || !empty($numril) || !empty($lenda1) ) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "examination";
    //Nese te gjithe elementet jane futur ndertojme lidhjen me databazen
    $connect = new mysqli($host, $dbUsername, $dbPassword, $dbname); // deklarojme dhe inicializojme nepermjet funksionit mysqli variablin qe do na beje lidhjen, ky funksion merr kater parametra
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());// nese ka error shfaqim Connect error
    } else {
     $SELECT = "SELECT email From riprovime Where email = ? Limit 1";// perndryshe bejme nje deklarat select qe sherben per te validuar emailin ne rast se ai eshte perdorur me pare apo jo
     $INSERT = "INSERT Into riprovime (emri, mbiemri, email, viti, fakulteti, numril, lenda1, lenda2, lenda3, koha) values(?, ?, ?, ?, ?, ?, ?, ?,?, NOW())";// me nje deklarate insert te dhenat e formes i dergojme ne  databazen ebank
    
     $stmt = $connect->prepare($SELECT);//Prepare statement eshte nje opsion qe perdoret per te ekzekutuar te njejten query ne SQL ne menyre te perseritur dhe me efikasitet te larte. Porgrami mund ta ekzekutoje statementin sa here qe deshiron me vlera te ndryshme.
     $stmt->bind_param("s", $email);// funksioni bind_param() merr dy parametra variablin dhe tipin e tij ne kete rast s-> string.
     $stmt->execute();// ekzekutohet statementi
     $stmt->bind_result($email);// rezultati qe kthen eshte variabli $email
     $stmt->store_result();// ruhet rezultati
     $rnum = $stmt->num_rows;// iterohet neper numrin e rreshtave per te krahasuar emailet
     if ($rnum==0)// nese nuk gjendet email i njejte do te thote qe nuk jane regjistruar lende per riprovime nga studenti dhe kesisoj ka te drejte t'i ri regjistroje
      {
      $stmt->close();
      $stmt = $connect->prepare($INSERT);
      $stmt->bind_param("sssisisss", $emri, $mbiemri, $email, $viti, $fakulteti, $numril, $lenda1, $lenda2, $lenda3);
      $stmt->execute();
      echo "Lendet per riprovim u regjistruan me sukses!!! </b>";
     } else 
     {
      echo "Lendet jane regjistruar nje here duke perdorur kete email";// perndryshe deklarojme qe jane regjistruar njehere lendet me kete email me kete email
      
     }
     $stmt->close();
     $connect->close();// mbyllet statement, mbyllet lidhja
    }
} else {
 echo "Ju lutem plotesoni te gjitha te dhenat e kerkuara!!!";
 die();

}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
Kthehu te kreu <a href="profile.php?p=1">Lendet</a>
</body>
</html>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-VLERËSIM-Shtëpiza</title>
   <script src="js/jquery-3.5.1.slim.min.js" ></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="css/bootstrap.min.css" >
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" type="text/css" href="footer.css">
   <link rel="stylesheet" type="text/css" href="navrrip.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body >

<div class="topnav" id="myTopnav">
  
  <a class="navbar-brand active">E-VLERËSIM</a>
  <a href="shtepiza.php">Shtëpiza</a>
  <a href="form.php">Regjistrohu</a>
  <a href="aboutus.html">Rreth Nesh</a>
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

<h1 class="text-center" style="color: #4689aa; margin-top: 240px; text-shadow: 2px 2px 8px #4689aa;">SISTEMI ELEKTRONIK I VLERËSIMIT</h1>
<div class="containter text-center">

<button class="btn btn-info pb-modalreglog-submit" data-toggle="modal" data-target="#myModal">Pedagog</button>
    <a href="form.php"  role="button" class ="btn btn-info">Regjistrohu</a>
<button class="btn btn-info pb-modalreglog-submit" data-toggle="modal" data-target="#mystudentModal">Student</button> 

</div>
<section class="footer-container-links align bg-info">
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="footer-description text-white">
                © E-VLERËSIM 
                </div>
                <div class="footer-description text-white"> 
                 2020
                </div>
            </div>
            <div class="col-4 ">
                <div class="footer-links">
                    <li class="list-unstyled"><a class="text-white" href="#">Facebook</a></li>
                    <li class="list-unstyled"><a class="text-white" href="#">Instagram</a></li>
                </div>
            </div>
            <div class="col-4">
        <li class="list-unstyled"><a class="text-white" href="#">Na kontaktoni</a></li>
        <li class="list-unstyled"><a class="text-white" href="#">Vendodhja</a></li>
            </div>
        </div>
    </div>
</section>

<div class="container pb-modalreglog-container">
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
            <div class="input-group pb-modalreglog-input-group">
                
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel" style="color: #4689aa; text-align: center;">Akses Pedagogu</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="teacher_login.php" method="POST">
                                <div class="form-group">
                                    <label for="email">Emri i përdoruesit</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <input type="text" name="pedagogusername" class="form-control" id="pedagogusername" placeholder="Përdoruesi">
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Fjalëkalimi</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <input type="password" name="fjalekalimi" class="form-control"  id="fjalekalimi" placeholder="Fjalëkalimi">
                                       
                                    </div>
                                </div>
                                  <input type="submit" value="Hyr" class="btn btn-info btn-block"/>
                            </form>
                        </div>
                        <div class="modal-footer">
                          
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

 <?php
include 'modal.php';
?>
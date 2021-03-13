<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-VLERËSIM-Regjistrohu</title>
   <script src="js/jquery-3.5.1.slim.min.js" ></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="css/bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="style.css" >
  <link rel="stylesheet" type="text/css" href="navrrip.css" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style type="text/css">
      a:hover{
        background-color: lightblue;

      }
  </style>
</head>

<body>

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
<div class="container" >
    <div class="row">
    <div class="col-md-4">
  </div>

    <div class="col-md-4">
<div class="d-flex justify-content-center">
    <form action="insignup.php" method="POST" class="main-form needs-validation"  novalidate>

        <fieldset>
          <legend class="text-info" style="text-align: center;">Regjistrohu: </legend>
        <div class="row">
            <div class="col">
                <div class="form-group">
                   
                    <input type="text" name="emri" id="emri" class="form-control" placeholder="Emri">
                    
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                   
                    <input type="text" name="mbiemri" id="mbiemri" class="form-control" placeholder="Mbiemri">
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">

           <div>

            <input type="text" name="universiteti" id="universiti" class="form-control" required placeholder="Universiteti">
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

        <div class="row">
            <div class="col"> 
        <div class="form-group">
        
            <select name="gjinia" id="gjinia" class="form-control">
                <option value="zgjidhgjinine"> Gjinia</option>
                <option value="M">Mashkull</option>
                <option value="F">Femër</option>
            </select>
        </div>
        </div>

            <div class="col"> 
        <div class="form-group">
            
            <select name="viti" id="viti" class="form-control">
                <option value="zgjidhvitin">Viti</option>
                <option value="1">1</option>
                <option value="2">2</option>
                  <option value="3">3</option>
            </select>

        </div>
        </div>
        </div>

        <div class="form-group">
            <input type="text" name="username" id="username" class="form-control" required placeholder="Username">

            <div class="invalid-feedback">Ju lutem te jepni nje emer te sakte perdoruesi</div>
        </div>

        <div class="form-group">
           
            <input type="email" name="email" id="mail" class="form-control" required placeholder="Email">
    
        </div>

          <div>
                <input type="phone" name="telefon" id="telefon" class="form-control"required placeholder="Nr Celulari">
            </div>

        <div class="form-group">
            <label for="fjalekalimi"></label>
            <input type="password" name="fkalimi" id="fkalimi" class="form-control" placeholder="Fjalëkalimi">
        </div>
        
        <div class="form-check">
            <input type="checkbox" id="accept-terms" class="form-check-input">
            <label for="accept-terms" class="form-check-label">Dakort me <a data-toggle="modal" data-target="#mystudentModal" style="color: blue;">kushtet e privatësisë.</a> </label>
        </div>
        <button type="submit" class ="btn btn-large btn-block btn-success" value="submit">Regjistrohu</button>
    </fieldset>
    </form>
</div>
</div>
</div>
</div>
<div class="col-md-4">
    </div>

    <section style="margin-top: 64px;" class="footer-container-links align bg-info">
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
            <div class="modal fade" id="mystudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel" style="color: #34aeeb; text-align: center;">Kushtet e privatësisë</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                           
                    <p>1.Të dhënat tuaja personale do të përdoren vetëm për qëllime administrative.</br>
                    2. Rezultatet e provimit janë të disponueshme vetëm për studentin. </br>
                    <p style="text-align: center;color:#34aeeb;">E-vlerësim 2020</p>
                    </p>                              
                        </div>
                        <div class="modal-footer">
                                                   
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
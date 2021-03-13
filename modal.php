<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-VLERESIM-Regjistrohu</title>
 <script src="js/jquery-3.5.1.slim.min.js" ></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="css/bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="style.css" >
  <link rel="icon" href="imazhe/titlelogo.jpg" type="image/x-icon" >

</head>

<body>
	<div class="container pb-modalreglog-container">
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
            <div class="input-group pb-modalreglog-input-group">
                

            </div>
            <div class="modal fade" id="mystudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel" style="color: #1cb800; text-align: center;">Akses Studenti</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="loginto.php" method="POST">
                                <div class="form-group">
                                    <label for="email">Adresa Email</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <input type="email" name="email" class="form-control"  id="email" placeholder="Email">
                                        <span class="input-group-addon"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Fjalëkalimi</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <input type="password" name="fkalimi" class="form-control"  id="pws" placeholder="Fjalëkalimi">
                                        <span class="input-group-addon"></span>
                                    </div>
                                </div>
                                  <input type="submit" value="Hyr" class="btn btn-success btn-block"/>
                            </form>
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
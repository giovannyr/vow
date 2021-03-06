<?php

if( isset($_SESSION['codigo']) ){
    if( isset($_SESSION['autenticadoOnline']) && $_SESSION['autenticadoOnline'] == true ){

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../resources/bootstrap/js/bootstrap.min.js"></script>
        <style>
            html, body{
                width: 100%;
                height: 100%;
                margin: 0;
            }
            .container{
                height: 100%;
                -webkit-box-shadow: 5px 0px 10px rgba(0,0,0,0.75), -5px 0px 10px rgba(0,0,0,0.75);
                -moz-box-shadow: 5px 0px 10px rgba(0,0,0,0.75), -5px 0px 10px rgba(0,0,0,0.75);
                box-shadow: 5px 0px 10px rgba(0,0,0,0.75), -5px 0px 10px rgba(0,0,0,0.75);
				background-image: url("../images/1.jpg");
                background-size: 980px 750px;
            }
            #test{
                margin-top: 10%;
                padding: 15px;
                border: 1px solid white;
                border-radius: 5px;
                box-shadow: 5px 5px 10px rgba(0,0,0,0.75);
                background-color: #C9C9C9;
            }
        </style>
    </head>
    <body>

        <?php include "menu.php"; ?>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4" id="test">
                    <form id="form-docu">
                        <input type="hidden" name="data" value="">
                        <div class="form-group">
                            <label for="doc">Documento:</label>
                            <input type="text" class="form-control" name="doc" id="doc" placeholder="Documento" autocomplete="off" autofocus="true" required>
                        </div>
                        <div class="form-group">
                            <label for="codigoV">Codigo de verificacion:</label>
                            <input type="password" class="form-control" name="codigoV" id="codigoV" placeholder="Codigo verificacion" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="col-md-6 col-md-offset-3">
                <div id="alert_user" class="alert alert-danger" role="alert" style="display: none">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error!</strong> <span id="msgtu"></span>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="../js/util.js"></script>
        <script type="text/javascript" src="../js/votacion.js"></script>
    </body>
</html>
<?php

    }else{
        require "logout.php";
    }
}else{
    require "logout.php";
}

?>

<?php
session_start();  // validar permisos usuario

if( isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true ){
     if($_SESSION['permisos'] == "votacion" || $_SESSION['permisos'] == "control total"){

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
            }
            #test{
                margin-top: 10%;
                padding: 15px;
                border: 1px solid white;
                border-radius: 5px;
                box-shadow: 5px 5px 10px rgba(0,0,0,0.75);
                background-color: gray;
            }
        </style>
    </head>
    <body>

        <?php include "menu.php"; ?>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3" id="test">
                    <form class="form-horizontal" id="form-docu">
                        <input type="hidden" name="data" value="">
                        <div class="form-group">
                            <label for="doc" class="col-sm-2 control-label">Documento</label>
                            <div class="col-sm-10">
                                <input type="test" class="form-control" name="doc" id="doc" placeholder="Documento" autocomplete="off"  autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Aceptar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="col-md-6 col-md-offset-3">
                <div id="alert_user" class="alert alert-danger" role="alert" style="display: none">
                    <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                    <strong>Error!</strong> <span id="msgtu"></span>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="../js/util.js"></script>
        <script type="text/javascript" src="../js/votacion.js"></script>
    </body>
</html>
<?php

    }elseif( $_SESSION['permisos'] == "reportes" ){
        header("Location: reportes.php");
    }
}else{
    header("Location: ../index.php");
}

?>

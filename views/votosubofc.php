<?php
session_start();

if( isset($_SESSION['permisos']) && ($_SESSION['permisos'] == "votacion" || $_SESSION['permisos'] == "control total")
 || $_SESSION['permisosOnline'] = "online"){
    if( (isset($_SESSION['autorizaVoto']) && $_SESSION['autorizaVoto'] == true) ||
    (isset($_SESSION['autorizaVotoOnline']) && $_SESSION['autorizaVotoOnline'] == true) ){

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PapeletaVotacionOficiales</title>
        <link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style_p.css">
        <script src="../js/jquery.js"></script>
        <script src="../resources/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <header  class="banner" align="center">
                <img src="../images/banner.png" alt="Banner" class="imgcenter"/>
                <h1><u><b>CATEGORIA DE SUBOFICIALES CON ASIGNACIÓN DE RETIRO</b></u> </h1>
                <h2>ELECCIONES REPRESENTANTES ANTE EL CONSEJO DIRECTIVO DE CREMIL DEL 01 DE ABRIL DE 2016 AL 31 DE MARZO DE 2018</h2>
                <h3><b>MARQUE CON UNA “X” UN SOLO RECUADRO</b></h3>
                <hr>
            </header>
            <div class="row p">
                  <div class="col-md-6 col-sm-6 fimg" style="/*background-color: yellow*/">
                       <div class="row">
                           <div class="col-md-12 col-sm-6 photoCont">
                                <div class="col-md-12 col-sm-6">
                                    <div class="imgCont">
                                        <img src="../images/subofc1.png" id="p1" class="imgCandidatos" />
                                        <div class="marca"  id="mp1" style="display: none;">
                                            <img src="../images/x.png">
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <div class="col-md-12 col-sm-6 btnCont">
                               <!--<button class="btn btn-default btn-sm center-block" type="submit">Candidato1</button>-->
                           </div>
                       </div>
                  </div>
                  <div class="col-md-6 col-sm-6 fimg" >
                      <div class="row">
                          <div class="col-md-12 col-sm-6 photoCont">
                              <div class="col-md-12 col-sm-6">
                                  <div class="imgCont" style="background-color: blue">
                                      <img src="../images/subofc2.png" id="p2" class="imgCandidatos" />
                                      <div class="marca" id="mp2" style="display: none;">
                                          <img src="../images/x.png">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12 col-sm-6 btnCont">
                              <!--<button class="btn btn-default btn-sm center-block" type="submit">Candidato2</button>-->
                          </div>
                      </div>
                  </div>

                  <div class="col-md-6 col-sm-6 col-md-offset-3 " style="margin-top: 2%">
                      <div class="row">
                          <div class="col-md-12 col-sm-6">
                              <div class="col-md-12 col-sm-6">
                                  <div class="vwhite">
                                      <img src="../images/votoblanco.png" id="ivblanco" style="width: 100%;" />
                                      <div class="marca" id="mvb" style="display: none;">
                                          <img src="../images/x2.png">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
            </div>
        </div>

    <script src="../js/planchas.js"></script>
</body>
</html>

<?php

    }//fin if interno
    else{
        if($_SESSION['autorizaVoto'] == false){
            header("Location: _view.php");
        }
        if($_SESSION['autorizaVotoOnline'] == true){
            header("Location: view.php");
        }
    }
}else{
    if($_SESSION['permisos'] == "reportes"){
        header("Location: reportes.php");
    }else{
        header("Location: ../index.php");
    }
}

?>

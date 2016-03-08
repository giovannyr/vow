<?php
 session_start();

  if( isset($_SESSION['permisos']) && ($_SESSION['permisos'] == "votacion" || $_SESSION['permisos'] == "control total")
  || $_SESSION['permisosOnline'] = "online"){
  if( (isset($_SESSION['autorizaVoto']) && $_SESSION['autorizaVoto'] == true) ||
  (isset($_SESSION['autorizaVotoOnline']) && $_SESSION['autorizaVotoOnline'] == true) ){
 // verificar si existe variable de session: autorizaVotoOnline
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
                <h2><u><b>CATEGORIA DE OFICIALES CON ASIGNACIÓN DE RETIRO</b></u> </h2>
                <h2>ELECCIONES REPRESENTANTES ANTE EL CONSEJO DIRECTIVO DE CREMIL DEL 01 DE ABRIL DE 2016 AL 31 DE MARZO DE 2018</h2>
                <h6><b>MARQUE CON UNA “X” UN SOLO RECUADRO</b></h6>
                <hr>
            </header>
            <div class="row p" id="planchas">

                <!--                <div class="col-md-6 col-sm-6 col-md-offset-3 " style="margin-top: 2%">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-6">
                                            <div class="col-md-12 col-sm-6">
                                                <div class="vwhite">
                                                    <img src="../images/votoblanco.png" id="ivblanco" style="width: 100%;" >
                                                    <div class="marca" id="mvb" style="display: none;">
                                                        <img src="../images/x.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-12">
                                    <br>
                                    <button class="btn btn-success center-block" id="btnVotar">Registrar Voto</button>
                                </div>-->
            </div>
        </div>

        <script type="text/template" id="tmp_planchas">
            <% _.each(datos, function(dato){ %>
                <% if(dato.categoria != "voto blanco"){ %>          
                    <div class="col-md-6 col-sm-6 fimg">
                        <div class="row">
                            <div class="col-md-12 col-sm-6 photoCont">
                                 <div class="col-md-12 col-sm-6">
                                     <div class="imgCont">
                                         <img src="../images/candidatos/<%=dato.imagen%>" class="imgCandidatos" 
                                             data-role="select" data-id="<%=dato.id%>" >
                                         <div class="marca" data-id="<%=dato.id%>" style="display: none;">
                                             <img src="../images/x.png">
                                         </div>
                                     </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                <% }else{ %>
                    <div class="col-md-6 col-sm-6 col-md-offset-3 " style="margin-top: 2%">
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <div class="col-md-12 col-sm-6">
                                    <div class="vwhite">
                                        <img src="../images/<%=dato.imagen%>" id="ivblanco" 
                                            data-role="select" data-id="<%=dato.id%>" style="width: 100%;" >
                                        <div class="marca" data-id="<%=dato.id%>" style="display: none;">
                                            <img src="../images/x.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                <% } %>            
            <% }); %>

            <div class="col-md-12">
                <br>
                <button class="btn btn-success center-block" id="btnVotar">Registrar Voto</button>
            </div>
        </script>
        <script src="../js/underscore.js"></script>
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

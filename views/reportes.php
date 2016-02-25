<?php
session_start();  // validar permisos usuario

if( isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true ){
     if($_SESSION['permisos'] == "reportes" || $_SESSION['permisos'] == "control total"){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reportes</title>
    <link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../resources/bootstrap/js/bootstrap.min.js"></script>

    <style>
        .container{
            height: 590px
        }
    </style>

</head>
<body>
    <?php include "menu.php";?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center><h3>Reporte de Votacion</h3></center>
                <hr>
                <div class="col-md-3">
                    <h4>Total de votos: <span id="totalVotos"></span></h4>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Votos</th>
                                    <th>Candidatos</th>
                                    <th>Plancha</th>
                                </tr>
                            </thead>
                            <tbody id="informe">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-success center-block" id="btn-gExcel">
                    <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true" style="font-size:1.8em"></span><br>
                    Descargar Reporte en excel
                </button>
            </div>
        </div>
    </div>


    <script type="text/template" id="tmp_informe">
        <%_.each(datos, function(dato){%>
            <tr>
                <td><%=dato.categoria%></td>
                <td><%=dato.num_votos%></td>
                <td><%=dato.nombres%></td>
                <td><%=dato.plancha%></td>
            </tr>
        <%});%>
    </script>

    <script src="../js/underscore.js"></script>
    <script src="../js/reporte.js"></script>
</body>
</html>
<?php

    }elseif ( $_SESSION['permisos'] == "votacion" ){
        header("Location: _view.php");
    }
}else{
    header("Location: ../index.php");
}

?>

<?php
require "../models/Reporte.php";
require "../models/GenerarExcel.php";


if(isset($_POST['action'])){

    $opc = htmlspecialchars($_POST['action']);

    $rp = new Reporte;
    $resp  = array();

    switch($opc){
        case "total":
                die( $rp->consultarCantidad() );
            break;
        case "reporte":
                $resp = $rp->consolidado();
                die( json_encode($resp) );
            break;
        case "reporteExcel":
                $resp = $rp->consultarDatos();

                $ge = new GenerarExcel;
                $ge->borrar();
                $ruta = $ge->generar($resp);

                die($ruta);
            break;
    }

}

?>

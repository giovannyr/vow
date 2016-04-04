<?php
session_start();
require "../models/AutorizaRegistroOnline.php";

if (isset($_GET['r'])) {
    $codigo = $_GET['r'];

    $aro = new AutorizaRegistroOnline();

    $existCod = $aro->existeCodigoEnlace($codigo);

    if ($existCod == 1) {
        $_SESSION['codigo'] = $codigo;

        $codeRegister = $aro->codigoRegistrado($codigo);

        if ($codeRegister == false) {
            $_SESSION['autenticadoOnline'] = true; //echo "validar tipo votante con query, presentar papeleta de votacion, y registrar voto con codigo enlace";
            $_SESSION['permisosOnline'] = true;

            include "view.php";
        } else {
            $_SESSION['autenticadoOnline'] = false;
            $_SESSION['permisosOnline'] = false;

            include './userMessages/votoRegistrado.php';
            close();
        }
    } else {
        $_SESSION['codigo'] = null;

        include './userMessages/enlaceIncorrecto.php';
        close();
    }

    $aro->cerrarConeccion();
} else {
    include './userMessages/enlaceIncorrecto.php';
    close();
}

function close() {
    echo "<script> setTimeout(function(){window.close();},5000); </script>";
}

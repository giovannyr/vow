<?php

session_start();  // validar permisos usuario

require "../models/Votante.php";

if (isset($_POST["data"])) {
    $resp = array();

    $per = new Votante;
    $doc = htmlspecialchars($_POST["doc"]);
    $codigoV = htmlspecialchars($_POST["codigoV"]);

    $resserv = $per->consultar($doc, $codigoV);

    if ($resserv['cant'] == 1) {
        if ($per->consultarVotosCedula($doc) == false) {
            // guardar autorizacion en variable de sesion, validar (oficial y suboficial) y redireccionar a la pagina
            $_SESSION['autorizaVoto'] = true;
            $_SESSION['ccVotante'] = $doc;

            $resp['estado'] = true;
            $_SESSION['categoria'] = $resserv['data'];
            $resp['msg'] = 'papeleta.php';

            die(json_encode($resp));
        } else {
            $_SESSION['autorizaVoto'] = false;
            $_SESSION['ccVotante'] = null;

            $resp['estado'] = false;
            $_SESSION['categoria'] = "";
            $resp['msg'] = "Ya se registro un voto con ese documento";
            die(json_encode($resp));
        }
    } else {
        $_SESSION['autorizaVoto'] = false;
        $_SESSION['ccVotante'] = null;

        $resp['estado'] = false;
        $_SESSION['categoria'] = "";
        $resp['msg'] = "Verifique el número de documento y codigo de verificación";
        die(json_encode($resp));
    }

    mysql_close($link);
}



/*
  if( isset($_POST["data"]) ){
  $doc = htmlspecialchars($_POST["doc"]);

  $query = "SELECT * FROM votante WHERE cedula = '".$doc."'";
  $resp = mysql_query($query);

  if(mysql_num_rows($resp) == 1){
  // guardar autorizacion en variable de sesion, validar (oficial y suboficial) y redireccionar a la pagina
  $_SESSION['autorizaVoto'] = true;
  header('Location: votoofc.php');
  }else{
  $_SESSION['autorizaVoto'] = false;
  $msg = "verifique el numero de documento";
  }

  mysql_close($link);
  }
 */




/* if($resserv['data'] == "oficial"){
  $resp['msg'] = 'votoofc.php';
  }
  if($resserv['data'] == "suboficial"){
  $resp['msg'] = 'votosubofc.php';
  } */
?>

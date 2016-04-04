<?php
session_start();
require "../config/DbOperator.php";

if(isset($_GET['r'])){
    $codigo = $_GET['r'];

    $link = DbOperator::conexion();

    $query1 = "SELECT codigo FROM codigoenlace WHERE codigo = '".$codigo."'";
    $verify = mysql_query($query1, $link);

    if(mysql_num_rows($verify) == 1){
        $_SESSION['codigo'] = $codigo;

        $query = "SELECT codEnlace FROM votacion WHERE codEnlace = '".$codigo."' ";
        $result = mysql_query($query, $link);

        if($result != NULL){
            if(!mysql_num_rows($result) > 0){
                $_SESSION['autenticadoOnline'] = true; //echo "validar tipo votante con query, presentar papeleta de votacion, y registrar voto con codigo enlace";
                $_SESSION['permisosOnline'] = true;

                include "view.php";
            }else{
                $_SESSION['autenticadoOnline'] = false;
                $_SESSION['permisosOnline'] = false;

                echo "<center><h1>Ya se registro el voto</h1></center>";
                close();
            }
        }

    }else{
        $_SESSION['codigo'] = null;

        echo "<center><h1>Utilice el link que llego a su correo</h1></center>";
        close();
    }

    mysql_close($link);
}else{
    echo "<center><h1>Utilice el link que llego a su correo</h1></center>";
    close();
}


function close(){
    echo "<script> setTimeout(function(){window.close();},5000); </script>";
}



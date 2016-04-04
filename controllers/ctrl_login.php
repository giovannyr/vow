<?php
session_start();
require "../models/Login.php";

$resp = array();

if(isset($_POST["user_v"])){
    
    $login = new Login();
    
    $user = htmlspecialchars($_POST["user_v"]);
    $pass = htmlspecialchars($_POST["pass_v"]);

    if( $login->validarUsuario($user, $pass) ){
        $_SESSION['usuario'] = $user;
        $_SESSION['autenticado'] = true;

        $permisos = $login->obtenerPermisos($user);

        $_SESSION['permisos'] = $permisos;

        $resp['au'] = true;
        
        if($permisos == 'control total' || $permisos == 'votacion'){
            $resp['msg'] = "_view.php";
        }elseif ($permisos == 'control total' || $permisos == 'reportes') {
            $resp['msg'] = "reportes.php";
        }

        $login->cerrar();
        die(json_encode($resp));
    }else{
        $_SESSION['usuario'] = null;
        $_SESSION['autenticado'] = false;

        $resp['au'] = false;
        $resp['msg'] = "Usuario o contraseña incorrectos";

        $login->cerrar();
        die(json_encode($resp));
    }
}


?>

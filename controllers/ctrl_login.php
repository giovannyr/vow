<?php
session_start();
require "../config/basedatos.php";

$resp = array();

if(isset($_POST["user_v"])){
    $user = htmlspecialchars($_POST["user_v"]);
    $pass = htmlspecialchars($_POST["pass_v"]);

    if( validarUsuario($user, $pass) ){
        $_SESSION['autenticado'] = true;

        $permisos = obtenerPermisos($user);

        $_SESSION['permisos'] = $permisos;

        $resp['au'] = true;
        
        if($permisos == 'control total' || $permisos == 'votacion'){
            $resp['msg'] = "_view.php";
        }elseif ($permisos == 'control total' || $permisos == 'reportes') {
            $resp['msg'] = "reportes.php";
        }

        die(json_encode($resp));
    }else{
        $_SESSION['autenticado'] = false;

        $resp['au'] = false;
        $resp['msg'] = "Usuario o contraseña incorrectos";

        die(json_encode($resp));
    }
}

function validarUsuario($user, $pass){
    global $link;

    $query = "SELECT * FROM usuario WHERE usuario='".$user."' AND pass='".sha1($pass)."' ";
    $result = mysql_query($query, $link);

    if(mysql_num_rows($result) == 1){
        return true;
    }else{
        return false;
    }
}

function obtenerPermisos($user){
    global $link;

    $query = "SELECT permisos FROM usuario WHERE usuario = '".$user."'";
    $resp = mysql_result(mysql_query($query),0);
    return $resp;
}

?>

<?php

require '../config/DbOperator.php';

class Login {

    private $link;

    function __construct() {
        $this->link = DbOperator::conexion();
    }

    function validarUsuario($user, $pass) {
        $query = "SELECT * FROM usuario WHERE BINARY usuario='" . $user . "' AND BINARY pass='" . sha1($pass) . "' ";
        $result = mysql_query($query, $this->link);

        if (mysql_num_rows($result) == 1) {
            return true;
        } else {
            return false;
        }
    }

    function obtenerPermisos($user) {
        $query = "SELECT permisos FROM usuario WHERE BINARY usuario = '" . $user . "'";
        $resp = mysql_result(mysql_query($query, $this->link), 0);
        return $resp;
    }
    
    function cerrar(){
        mysql_close($this->link);
    }

}

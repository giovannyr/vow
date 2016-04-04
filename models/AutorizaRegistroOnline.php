<?php
require '../config/DbOperator.php';


class AutorizaRegistroOnline {
    
    private $link;
    
    
    function __construct() {
        $this->link = DbOperator::conexion();
    }
    
    
    function existeCodigoEnlace($codigo){
        $query = "SELECT codigo FROM codigoenlace WHERE BINARY codigo = '".$codigo."'";
        $result = mysql_query($query, $this->link);
        $numRows = mysql_num_rows($result);
        return $numRows;
    }
    
    function codigoRegistrado($codigo){
        $query = "SELECT codEnlace FROM votacion WHERE BINARY codEnlace = '".$codigo."' ";
        $result = mysql_query($query, $this->link);
        $numRows = mysql_num_rows($result);
        return $numRows;
    }
    
    function cerrarConeccion(){
        mysql_close($this->link);
    }
    
}

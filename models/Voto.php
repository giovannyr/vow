<?php


class Voto {
    
    private $link;
    private $resp;
    
    
    function __construct() {
        $this->link = DbOperator::conexion();
        $this->resp = array();
    }
        
    function registrarVoto($codCandidato, $ccVotante, $codEnlace, $formaV){
        $query = "INSERT INTO votacion(codCandidato,ccVotante,codEnlace,forma_votacion) 
                VALUES (".$codCandidato.", '".$ccVotante."', '".$codEnlace."', '".$formaV."')";
        
        mysql_query($query, $this->link);
        mysql_close($this->link);
        
        // verificar q se afecto la tabla, y retornar mensaje
    }
    
    
}

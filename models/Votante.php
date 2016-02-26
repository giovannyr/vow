<?php
require "../config/DbOperator.php";

class Votante{

    private $link;

    public function __construct(){
        $this->link = DbOperator::conexion();
    }

    public function consultar($doc){
        $response = array();
        $query = "SELECT * FROM votante WHERE cedula = '".$doc."'";
        $result = mysql_query($query, $this->link);
        $response['cant'] = mysql_num_rows($result);
        if($response['cant'] == 1){
            $response['data'] = mysql_result($result, 0, 4);
        }else{
            $response['data'] = null;
        }
        mysql_close($this->link);
        return $response;
    }
    
    
    public function consultarVotosCedula($doc){
        $this->link = DbOperator::conexion();
        $query = "SELECT * FROM votacion WHERE ccVotante = '".$doc."'";
        
        $result = mysql_query($query, $this->link);
        $cant = mysql_num_rows($result);
        mysql_close($this->link);
        return $cant;
    }

}

?>

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
        mysql_close($this->link);
        $response['cant'] = mysql_num_rows($result);
        if($response['cant'] == 1){
            $response['data'] = mysql_result($result, 0, 4);
        }else{
            $response['data'] = null;
        }
        return $response;
    }

}

?>

<?php
require '../config/DbOperator.php';


class Candidato {
    
    private $link;
    private $response;
    
    
    public function __construct() {
        $this->link = DbOperator::conexion();
        $this->response = array();
    }
    
    
    public function dataCandidatos($categoria){
        $query = "SELECT * FROM candidato WHERE categoria = '".$categoria."'";
        $result = mysql_query($query, $this->link);
        
        while($row = mysql_fetch_assoc($result)){
            $this->response[] = $row;
        }
        
        mysql_close($this->link);
        return $this->response;
    }
    
}

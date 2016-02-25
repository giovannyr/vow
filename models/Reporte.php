<?php
require "../config/DbOperator.php";

class Reporte{

    private $link;
    private $resp;


    public function __construct(){
        $this->link = DbOperator::conexion();
        $this->resp = array();
    }

    public function consolidado(){

        $query = "SELECT
        votacion.codCandidato,
        votacion.forma_votacion,
        candidato.nombres,
        candidato.plancha,
        candidato.categoria,
        COUNT(idv) AS num_votos
        FROM votacion
        JOIN candidato
        ON votacion.codCandidato = candidato.id
        GROUP BY
        votacion.codCandidato,
        candidato.categoria,
        candidato.nombres,
        candidato.plancha,
        candidato.categoria";

        $result = mysql_query($query, $this->link);

        while( $row = mysql_fetch_assoc($result) ){
            $this->resp[] = $row;
        }

        mysql_close($this->link);

        return $this->resp;
    }

    public function consultarDatos(){

        $query = "SELECT * FROM votacion, candidato
        WHERE
        votacion.codCandidato = candidato.id";

        $result = mysql_query($query, $this->link);

        while( $row = mysql_fetch_assoc($result) ){
            $this->resp[] = $row;
        }

        mysql_close($this->link);

        return $this->resp;
    }

    public function consultarCantidad(){
        $query = "SELECT COUNT(idv) AS cantidad FROM votacion";
        $result = mysql_result(mysql_query($query, $this->link),0);
        mysql_close($this->link);
        return $result;
    }

}

?>

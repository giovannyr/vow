<?php
ini_set('max_execution_time', 600);

require "../config/basedatos.php";


/*
for($i = 1; $i <= 28700; $i++){
    $text = base64_encode($i);
    echo $i;
    echo ' cod: ';
    echo $text;
    echo ' tam: ';
    echo strlen($text);
    echo '<br>';

    $query = "INSERT INTO codigoenlace (codigo) VALUES('".$text."')";

    mysql_query($query, $link) OR die(mysql_error());

    if(mysql_affected_rows() == 0){
        echo "<br><center><h3>No se inserto el registro: ".$i." cod:".$text."</h3></center>";
    }
}

mysql_close($link);
*/

?>

<?php
ini_set('max_execution_time', 1200);
header("Location: views/index.php");
//echo sha1('eq2');
//echo date("Y-m-d H:i:s");

/*$alfab = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
$file = fopen("C://codigosV.csv", "w") or die("no se creo el csv");
for($i=1;$i<=300;$i++){
    $cod = base64_encode($alfab[rand(0, 25)].$i);
    fwrite($file, ",".$cod."\n");
    echo $cod;
    echo "<br>";
}
fclose($file);*/


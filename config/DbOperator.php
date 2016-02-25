<?php

class DbOperator{

    private static $link;
    private static $server = "localhost";
    private static $user = "root";
    private static $pass = "";
    private static $database = "votacion";

    public static function conexion(){
        self::$link = mysql_connect(self::$server, self::$user, self::$pass);
        mysql_select_db(self::$database, self::$link);
        mysql_query("SET NAMES 'utf8'");
        return self::$link;
    }

}

?>

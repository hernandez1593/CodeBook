<?php
class Connection {

    function getConnection()
    {
        $user = "postgres";
        $password = "1234";
        $dbname = "dbweb";
        $port = "5433";
        $host = "localhost";
        $strconn = "host=$host port=$port dbname=$dbname user=$user password=$password";
        $conn = pg_connect($strconn) or die("Error de Conexion con la base de datos");
        return ($conn);
    }
}

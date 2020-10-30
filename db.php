<?php

    $db = "eval";
    $server = "mysql:host=localhost:3306;dbname=eval";
    $username = 'root';
    $password = '';
    $server_mysql = "127.0.0.1:3306";
    $options=[
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
    ];
    $cnx = new PDO($server, $username, $password, $options);
    

?>
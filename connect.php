<?php 

function connect(){
    $hostname = 'localhost';
    $dbname = 'users';
    $username = 'admin';
    $password = 'pass';

    $dsn = "mysql:host=$hostname;dbname=$dbname";

    try {
        return $sql = new PDO($dsn, $username, $password);

    } catch (PDOException $e){
        echo "Connection failed:" . $e->getMessage();
    }
}

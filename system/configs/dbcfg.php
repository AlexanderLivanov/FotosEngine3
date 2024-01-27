<!-- 10.11.2023 (c) Alexander Livanov -->
<?php

session_start();

date_default_timezone_set('Europe/Moscow');

// global $db_connect_obsolete;
// $db_connect_obsolete = mysqli_connect("localhost", "root", "", "fotosworld");

function dbConnect(){
    try {
        return new PDO('mysql:dbname=fotosworld;host=localhost', 'root', '');
    } catch (PDOException $e) {
        echo($e->getMessage());
    }
}

$db_connect_obsolete = dbConnect();

function getServerTime(){
    return date('d.m.Y H:i', time());
}

?>
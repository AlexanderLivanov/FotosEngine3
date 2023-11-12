<!-- 10.11.2023 (c) Alexander Livanov -->
<?php

session_start();

date_default_timezone_set('Europe/Moscow');

function dbConnect(){
    try {
        return new PDO('mysql:dbname=fotosengine;host=localhost', 'root', '');
    } catch (PDOException $e) {
        echo($e->getMessage());
    }
}

function getServerTime(){
    return date('d.m.Y H:i', time());
}

?>
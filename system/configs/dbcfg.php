<!-- 10.11.2023 (c) Alexander Livanov -->
<?php
session_start();

require_once('creds.php');

date_default_timezone_set('Europe/Moscow');

// global $db_connect_obsolete;
// $db_connect_obsolete = mysqli_connect("localhost", "root", "", "fotosworld");

function dbConnect(){
    global $user, $passwd;
    try {
        return new PDO('mysql:dbname=fotosworld;host=localhost', $user, $passwd);
    } catch (PDOException $e) {
        echo($e->getMessage());
    }
}

$db_connect = dbConnect();

function getServerTime(){
    return date('d.m.Y H:i', time());
}

?>

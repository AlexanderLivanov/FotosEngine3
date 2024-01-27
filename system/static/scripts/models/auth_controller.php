<?php 
// 27.01.2024 (c) Alexander Livanov
require_once('system/configs/dbcfg.php');

class User {
    public $id, $username;

    function isAdmin($id){
        global $db_connect_obsolete;
        echo("Current user ");
        // $db_request = "SELECT * FROM users WHERE id = $id";
        // $db_result = mysqli_query($db_connect_obsolete, $db_request);

        $query = $db_connect_obsolete->prepare("SELECT * FROM users WHERE id=" . $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        echo($result['role']);
    }

    // function getID(){

    // }

    // function getUsername($id){
    //     global $db_connect_obsolete;
    //     echo("Current uname is ");
    //     $db_request = "SELECT * FROM users WHERE id = $id";
    //     $db_result = mysqli_query($db_connect_obsolete, $db_request);

    //     $rows = mysqli_fetch_all($db_result, MYSQLI_ASSOC);

    //     if(!$db_result) {
    //         echo("Неизвестная ошибка...<br>");
    //     }

    //     foreach($rows as $row){
    //         print($row['username'] . "<br>");
    //     }
    // }

    // function setUsername(){

    // }

    // function getAV(){

    // }

    // function setAV(){

    // }

    // function getStoragePath(){
        
    // }

    // function login(){

    // }

    // function register(){

    // }

    // function auth(){

    // }
}

?>
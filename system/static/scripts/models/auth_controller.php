<?php 
// 27.01.2024 (c) Alexander Livanov
require_once('system/configs/dbcfg.php');

class User {
    private function getDataByID($id){
        global $db_connect;
        $query = $db_connect->prepare("SELECT * FROM users WHERE id=" . $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    function isAdmin($id){
        $result = $this->getDataByID($id);

        return $result['role'];
    }

    function getID($id){
        $result = $this->getDataByID($id);

        return $result['id'];
    }

    function getUsername($id){
        $result = $this->getDataByID($id);

        return $result['username'];
    }

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
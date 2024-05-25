<?php
// 27.01.2024 (c) Alexander Livanov

class User
{
    private function getDataByID($id)
    {
        global $db_connect;
        $query = $db_connect->prepare("SELECT * FROM users WHERE id=" . $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    private function setDataByID($id, $field_name, $data)
    {
        global $db_connect;
        $query = $db_connect->prepare("UPDATE users SET $field_name = '$data' WHERE id = $id");
        $query->execute();
    }

    function isAdmin($id)
    {
        $result = $this->getDataByID($id);

        return $result['role'];
    }

    function getID($id)
    {
        $result = $this->getDataByID($id);

        return $result['id'];
    }

    function getUsername($id)
    {
        $result = $this->getDataByID($id);

        return $result['username'];
    }

    function setUsername($id, $data){
        return $this->setDataByID($id, 'username', $data);
    }

    function getLastActivity($id){
        return $this->getDataByID($id)['last_activity'];        
    }

    function getUserRating($id){
        return $this->getDataByID($id)['rating'];        
    }

    function whoInvited($id){
        return $this->getDataByID($id)['invited_by'];
    }

    function getRegDate($id){
        return $this->getDataByID($id)['reg_date'];
    }

    function getServerTime()
    {
        return date('d.m.Y H:i', time());
    }

    function updateLastActivityTime($id){
        return $this->setDataByID($id, 'last_activity', getServerTime());
    }

    // function getAV(){

    // }

    // function setAV(){

    // }

    // function getStoragePath(){

    // }

    function findUserByToken($tokenHash){
        global $db_connect;
        $query = $db_connect->prepare("SELECT * FROM users WHERE token='" . hash('sha256', $tokenHash) . "'");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result['id'];
    }

    function auth(){
        global $uid;
        if (!empty($_COOKIE['FW_AUTH_TOKEN'])) {
            $_SESSION['uid'] = $this->findUserByToken($_COOKIE['FW_AUTH_TOKEN']);
            $uid = $_SESSION['uid'];
            return true;
        } else {
            return false;
        }
    }
}

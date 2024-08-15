<?php
// 09.08.2024 (c) Alexander Livanov

require_once('system/configs/dbcfg.php');

class Note
{
    function createNote($author, $title, $text, $status)
    {
        $connect = dbConnect();
        $local_datetime = getServerTime();
        $query = $connect->prepare("INSERT INTO notes(author, title, text, status, likes, dislikes, datetime)
    VALUES (:author, :title, :text, :status, '0', '0', :local_datetime);");
        $query->bindParam(":author", $author, PDO::PARAM_STR);
        $query->bindParam(":title", $title, PDO::PARAM_STR);
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->bindParam(":status", $status, PDO::PARAM_INT);
        $query->bindParam(":local_datetime", $local_datetime, PDO::PARAM_STR);

        $result = $query->execute();

        if ($result) {
            return $result;
        } else {
            return "Error";
        }
    }
}
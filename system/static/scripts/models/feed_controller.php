<?php
// 09.08.2024 (c) Alexander Livanov

class Note
{
    private function getDataByParam($column, $param)
    {
        global $db_connect;
        $query = $db_connect->prepare("SELECT * FROM notes WHERE $column='$param'");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    function createNote($author, $title, $text, $status)
    {
        $connect = dbConnect();
        $local_datetime = getServerTime();
        $query = $connect->prepare("INSERT INTO notes(author, title, text, img_path, status, views, likes, dislikes, datetime)
    VALUES (:author, :title, :text, '/appicon.png', :status, '0', '0', '0', :local_datetime);");
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

    function getNoteByAuthor($author) {
        $notes = $this->getDataByParam('author', $author);
        return $notes;
    }

    function getAllNotes(){
        global $db_connect;
        $query = $db_connect->prepare("SELECT * FROM notes ORDER BY id DESC;");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
<?php

if(!empty($_SESSION['uid'])){
    require_once('system/static/header.php');
    require_once('system/static/scripts/models/main_controller.php');

    echo ("<br><br>");
    $curr_user = new User();
    echo $curr_user->getID($_SESSION['uid']) . "<br>";
    echo $curr_user->getUsername($_SESSION['uid']) . "<br>";
}else{
    echo("</p>Вы не вошли в аккаунт</p>");
}

?>
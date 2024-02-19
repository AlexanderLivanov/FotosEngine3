<?php
//require_once('system/configs/dbcfg.php');

if(!empty($_SESSION['uid'])){
    require_once('system/static/header.php');
    require_once('system/static/scripts/models/main_controller.php');

    echo ("<br><br>");
    $curr_user = new User();
    echo $curr_user->getID($_SESSION['uid']) . "<br>";
    echo $curr_user->getUsername($_SESSION['uid']) . "<br>";
}else{
    require_once('system/static/header.php');
    echo("<br></p>Вы не вошли в аккаунт. Вы можете войти <a href='/login.php'>здесь</p>");
}

?>

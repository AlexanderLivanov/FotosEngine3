<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="appicon.png">
    <title>Fotos.World - Профиль</title>
</head>

<body>
    <?php
    require_once('system/configs/dbcfg.php');
    require_once('system/static/header.php');
    require_once('system/static/scripts/models/main_controller.php');
    require_once('system/static/scripts/models/storage_controller.php');

    echo ("<br><br>");
    $curr_user = new User();
    if ($curr_user->auth()){
        require_once('system/static/userprofile.php');
    } else {
        echo ("<br><p style='text-align: center;'>Вы не вошли в аккаунт. Вы можете войти <a href='/login.php'>здесь</a></p>");
    }
    ?>


<?php
    require_once('system/static/footer.php');
?>
</body>

</html>

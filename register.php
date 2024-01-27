<!-- 10.11.2023 (c) Alexander Livanov -->

<?php
require_once('system/configs/dbcfg.php');

if(!empty($_POST['register'])){

    $connect = dbConnect();

    $username = $_POST['username'];
    $passwd = $_POST['passwd'];
    $ref = $_POST['ref'];

    $local_datetime = getServerTime();

    $passwd_hash = password_hash($passwd, PASSWORD_BCRYPT);
    $query = $connect->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();

    if($query->rowCount() > 0){
        echo('<p>Это имя пользователя уже занято</p>');
    }
    if($query->rowCount() == 0){
        $query = $connect->prepare("INSERT INTO users(username, passwd, reg_date, last_activity, invited_by) VALUES 
                                                    (:username, :passwd_hash, :local_datetime, :local_datetime, :ref)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("passwd_hash", $passwd_hash, PDO::PARAM_STR);
        $query->bindParam("local_datetime", $local_datetime, PDO::PARAM_STR);
        $query->bindParam("local_datetime", $local_datetime, PDO::PARAM_STR);
        $query->bindParam("ref", $ref, PDO::PARAM_STR);

        $result = $query->execute();
        if($result){
            echo("<p>Регистрация прошла успешно.<br> Сейчас вы будете перенаправлены на страницу входа</p>");
            echo("<script>setTimeout(function () { window.location.href = 'login.php'; }, 1000);</script>");
        }else{
            echo("<p>Ошибка. Проверьте, что всё правильно...</p>");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="system/static/content/css/style.css">
    <title>Создать аккаунт</title>
</head>

<body>
    <form method="post" class="auth_form">
        <h1>FotosWorld - Создание учетной записи</h1>
        <input type="text" placeholder="придумайте имя пользователя" name="username" pattern="[A-Za-z._-]{4,}" required>
        <input type="password" placeholder="придумайте пароль" name="passwd" minlength="8" required>
        <input type="text" placeholder="кто пригласил?" name="ref" pattern="[A-Za-z]{4,}">
        <input type="submit" name="register" value="Готово">
    </form>
</body>

</html>

<!-- Юле: спасибо) -->
<!-- 10.11.2023 (c) Alexander Livanov -->

<?php
require_once('system/configs/dbcfg.php');
require_once('system/static/scripts/models/storage_controller.php');

if (!empty($_POST['register'])) {

    $connect = dbConnect();

    $username = $_POST['username'];
    $passwd = $_POST['passwd'];
    $ref = $_POST['ref'];
    $email = $_POST['email'];
    $local_datetime = getServerTime();
    $passwd_hash = password_hash($passwd, PASSWORD_BCRYPT);
    $user_token = $username . $passwd;
    $token = hash('sha256', $user_token);

    $query = $connect->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo ('<script>alert("Это имя пользователя занято. Придумайте другое");</script>');
    }
    if ($query->rowCount() == 0) {
        $query = $connect->prepare("INSERT INTO users(username, passwd, email, reg_date, last_activity, token, invited_by, rating, role, ip) VALUES 
                                                    (:username, :passwd_hash, :email, :local_datetime, :local_datetime, :token, :ref, '1', '0', '0:0:0:0');");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("passwd_hash", $passwd_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("local_datetime", $local_datetime, PDO::PARAM_STR);
        $query->bindParam("local_datetime", $local_datetime, PDO::PARAM_STR);
        $query->bindParam("token", $token, PDO::PARAM_STR);
        $query->bindParam("ref", $ref, PDO::PARAM_STR);
        $result = $query->execute();

        if ($result) {
            echo ('<p>ОК. Сейчас вы будете перенаправлены на страницу входа</p>');
            allocStorage($username);
            setcookie("FW_AUTH_TOKEN", $token, strtotime('+30 days'));
            echo ("<script>setTimeout(function () { window.location.href = 'login.php'; }, 1000);</script>");
        } else {
            echo ('<script>alert("Проверьте форму ещё раз");</script>');
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
    <title>Создать аккаунт - FotosWorld</title>
</head>

<body>
    <div class="main-container">
        <form method="post" class="auth_form">
            <h1>Создание учетной записи</h1>
            <p id="op_status"></p>
            <div class="form-element">
                <input type="text" placeholder="придумайте имя пользователя*" name="username" pattern="[A-Za-z._-1234567890]{4,}" required>
            </div>
            <div class="form-element">
                <input type="password" placeholder="придумайте пароль*" name="passwd" minlength="8" required>
            </div>
            <div class="form-element">
                <input type="email" name="email" required placeholder="эл.почта (в случае сброса пароля)*" />
            </div>
            <div class="form-element">
                <input type="text" placeholder="кто пригласил? (реферальный код)" name="ref" pattern="[A-Za-z._-1234567890]{4,}">
            </div>
            <button type="submit" name="register" value="register">Готово</button>
            <p>Уже есть аккаунт? <a href="login.php" class="white-link">Войдите</a></p>
        </form>
    </div>
</body>

</html>

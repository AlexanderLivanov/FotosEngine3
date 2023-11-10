<!-- 10.11.2023 (c) Alexander Livanov -->

<?php
require_once('system/configs/dbcfg.php');

// if(!empty($_POST['register']))
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать аккаунт</title>
</head>

<body>
    <form method="post">
        <input type="text" placeholder="придумайте логин" name="login" pattern="[A-Za-z]{4,}" required>
        <input type="passwd" placeholder="придумайте пароль" name="passwd" pattern="[A-Za-z]{8,}" required>
        <input type="text" placeholder="реф.код" name="ref" pattern="[A-Za-z]{4,}" required>
        <input type="submit" name="register" value="Готово">
    </form>
</body>

</html>
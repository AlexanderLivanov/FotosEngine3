<!-- 10.11.2023 (c) Alexander Livanov -->

<?php
require_once('system/configs/dbcfg.php');

$query = $connect->prepare("SELECT * FROM users");
$query->execute();
$users_arr = $query->fetch(PDO::FETCH_ASSOC);

echo('<pre>');
print_r($users_arr);
echo('</pre>');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FotosEngine</title>
</head>
<body>
    Здесь пока ничего нет...
</body>
</html>
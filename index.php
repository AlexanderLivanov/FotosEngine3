<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="system/static/content/css/style.css">
    <title>Fotos.World</title>
</head>

<body>
    <?php
	require_once('system/configs/dbcfg.php');
	require_once('system/static/header.php');
        require_once('system/static/scripts/models/main_controller.php');

        echo("<br><br>");
        $curr_user = new User();
        if(!empty($_SESSION['uid'])){
            echo("Здравствуйте, " . $curr_user->getUsername($_SESSION['uid']));
        }
	?>
    <div class="notify-banner">
        <h2>Совсем скоро здесь будет контент!</h1>
        <h4>Просто я пока не добавил возможность его публикации...</h3>
    </div>
	<?php
	require_once('system/static/footer.php');
	?>
   </body>

</html>

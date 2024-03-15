<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="system/static/content/css/style.css">
    <link rel="manifest" href="manifest.json" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="application-name" content="FotosWorld" />
    <meta name="apple-mobile-web-app-title" content="FotosWorld" />
    <title>Fotos.World</title>
    <script>
    if (typeof navigator.serviceWorker !== 'undefined') {
        navigator.serviceWorker.register('pwabuilder-sw.js')
    }
    </script>
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

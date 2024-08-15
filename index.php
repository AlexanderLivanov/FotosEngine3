<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="system/static/content/css/style.css">
    <link rel="icon" href="appicon.png">
    <title>Fotos.World</title>
</head>

<body>
    <?php
	require_once('system/configs/dbcfg.php');
	require_once('system/static/header.php');
    require_once('system/static/scripts/models/main_controller.php');

    echo("<br><br>");
    $curr_user = new User();
    
    // check if FW_AUTH_TOKEN exsists
    if(!empty($_COOKIE['FW_AUTH_TOKEN'])){
        $_SESSION['uid'] = $curr_user->findUserByToken($_COOKIE['FW_AUTH_TOKEN']);
        $uid = $_SESSION['uid'];
    }

    // check if $uid exsists
    if(!empty($uid)){
        echo("Здравствуйте, " . $curr_user->getUsername($uid));
        $curr_user->updateLastActivityTime($uid); 
    }
	?>
	<?php
	require_once('system/static/footer.php');
	?>
</body>

</html>
<?php
// В память о погибших во время теракта 22.03.2024
?>
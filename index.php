<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotos.World</title>
</head>

<body>
    <?php 
        require_once('system/static/header.php');
        require_once('system/static/scripts/models/auth_controller.php');

        echo("<br><br>");
        $curr_user = new User();
        echo $curr_user->getID(1) . "<br>";
        echo $curr_user->getUsername(1) . "<br>";
        
    ?>    
</body>

</html>
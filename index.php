<!-- 10.11.2023 (c) Alexander Livanov -->

<?php
require_once('system/configs/dbcfg.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="system/static/content/css/style.css">
    <title>FotosEngine</title>
</head>

<body>
    <div class="container">
        <?php

        for($i = 0; $i < 11; $i++){
            echo(
                '
                <div class="ubox">
                    <div class="ubox-header">
                        <div class="u-avatar">
                            <img src="system/static/content/img/julia.jpg" alt="">
                        </div>
                    </div>
                    <div class="ubox-content">

                    </div>
                    <div class="ubox-footer">

                    </div>
                </div>
                '
            );
        }
        ?>
    </div>
</body>

</html>
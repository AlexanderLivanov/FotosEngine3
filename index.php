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
                        <span class="u-name">julia.krotova</span>
                        <span class="u-subs">
                            <svg class="u-subs" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                            </svg>1.1M
                        </span>
                        <span class="u-subs">
                            <svg class="u-subs" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                            </svg>170
                        </span>
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
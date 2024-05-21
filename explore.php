<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotos.World - Поиск</title>
    <style>
        #profile-banner {
            height: auto;
            background-color: grey;
            border-radius: 5px;
            margin: 0.5em;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            object-fit: fill;
            /* background-image:  */
        }

        #profile-banner h1,
        h3 {
            color: whitesmoke;
            text-align: start;
            font-family: sans-serif;
            font-weight: 900;
            font-size: 16px;
        }

        #profile-avatar img {
            width: 150px;
            height: 150px;
            border-radius: 1000px;
            object-fit: cover;
            padding: 0.5em;
            justify-items: center;
        }

        @media(min-width: 950px) {
            #profile-banner {
                height: 100px;
                background-color: grey;
                border-radius: 5px;
                margin: 0.5em;
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                object-fit: fill;
                /* background-image:  */
            }

            #profile-banner h1,
            h3 {
                color: whitesmoke;
                text-align: start;
                font-family: sans-serif;
                font-weight: 600;
                font-size: 18px;
                margin: 0;
                padding-right: .3em;
                padding-top: .2em;
            }

            #profile-avatar img {
                width: 90px;
                height: 90px;
                border-radius: 1000px;
                object-fit: cover;
                padding: .5em;
                justify-items: center;
            }
        }

        @media(max-width: 450px) {
            #profile-banner {
                height: 100px;
                background-color: grey;
                border-radius: 5px;
                margin: 0.5em;
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                object-fit: fill;
                /* background-image:  */
            }

            #profile-banner h1,
            h3 {
                color: whitesmoke;
                text-align: start;
                font-family: sans-serif;
                font-weight: 600;
                margin: 0;
                padding-right: .3em;
                padding-top: .2em;
            }

            #profile-avatar img {
                width: 90px;
                height: 90px;
                border-radius: 1000px;
                object-fit: cover;
                padding: .5em;
                justify-items: center;
            }
        }
    </style>
</head>

<?php
require_once('system/configs/dbcfg.php');
function printUsers($users)
{
    foreach($users as $user){
        echo ('<div style="border-radius: 5px; text-align: center; padding: .5em;">');
        echo ('<div id="profile-banner">');
        echo ('
                <div id="profile-avatar">
                    <img src="system/usercontent/' . $user['username'] . '/avatar.png">
                </div>
            ');
        echo ('<div style="padding: 1em;">');
        echo ('<h1>' . $user['username'] . '</h1>');
        echo ('<h3>Последний раз в сети: ' . $user['last_activity'] . '</h3>');
        echo ('</div>');
        echo ('</div>');
        echo ('</div>');
    }
}

if (!empty($_POST['username'])) {
    $search_username = $_POST['username'];
    $query = $db_connect->prepare("SELECT username, last_activity FROM `users` WHERE username LIKE '$search_username%'");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    printUsers($result);

    if (empty($result)) {
        echo ('
    <head>
        <link rel="stylesheet" href="css/search.css">
    </head>
    <div class="search" style="text-align: center; background-color: whitesmoke; height: 100px; margin-right: 10%; margin-left: 10%; padding: 1em; border-radius: 40px;">
        <p>Упс... Кажется, такого пользователя нет... Попробуйте повторить поиск:</p>
        <form action="explore" method="POST">
            <input type="text" value="' . '" name="username" pattern="[a-zA-Z0-9]+">
            <input type="submit" value="Поиск" id="search-btn"><br>
            <a href="/" style="text-decoration: none; color: #0072ff;">На главную...</a>
        </form>
    </div>
    ');
    }
} else {
    echo ('
    <head>
        <link rel="stylesheet" href="css/search.css">
    </head>
    <div class="search" style="text-align: center; background-color: whitesmoke; height: 100px; margin-right: 10%; margin-left: 10%; padding: 1em; border-radius: 40px;">
        <p>Запрос не задан или не разрешен... Попробуйте повторить поиск:</p>
        <form action="explore.php" method="POST">
            <input type="text" value="" name="username" pattern="[a-zA-Z0-9]+">
            <input type="submit" value="Поиск" id="search-btn"><br>
            <a href="/" style="text-decoration: none; color: #0072ff;">На главную...</a>
        </form>
    </div>
    ');
}

?>
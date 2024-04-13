<?php

?>
<html>

<head>
    <link rel="stylesheet" href="system/static/content/css/style.css">
</head>

<body>
    <div class="user-profile-dock">
        <img src="appicon.png" alt="">
        <p><?= $curr_user->getUsername($uid); ?></p>
        <div class="user-meta">
            <p>Рейтинг: <?= $curr_user->getUserRating($uid); ?></p>
            <p>Пригласил(а): <?= $curr_user->whoInvited($uid); ?></p>
            <p>Был(а) в сети: <?= $curr_user->getLastActivity($uid); ?></p>
        </div>
    </div>
</body>

</html>
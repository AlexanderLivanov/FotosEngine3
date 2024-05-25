<?php
// 13.03.2024 (c) Alexander Livanov

if (!empty($_POST['session_destroy'])) {
    echo('destr sess');
    session_destroy();
    setcookie("FW_AUTH_TOKEN", "", strtotime('+30 days'));
    echo('<script>window.location.replace("/");</script>');
}
?>
<html>

<head>
    <style>
        /* USER PROFILE PAGE CSS */
        .profile {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            box-shadow: 0 0 10px rgb(150, 150, 150);
            border-radius: 15px;
        }

        .avatar img {
            margin-top: 10px;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            box-shadow: 0 0 10px rgb(150, 150, 150);
        }

        .info {
            margin-top: 20px;
        }

        .row {
            display: flex;
            justify-content: space-around;
        }

        .row p {
            box-shadow: 0 0 10px rgb(150, 150, 150);
            border-radius: 15px;
            margin: 0 10px 0 10px;
            padding: 3px;
        }

        .tabs {
            margin-top: 20px;
            border-radius: 15px;
        }

        .tab-btn {
            padding: 10px 20px;
            background-color: #f0f0f0;
            border: none;
            cursor: pointer;
            border-radius: 15px;
            min-width: 100px;
        }

        .tab-btn.active {
            background-color: #ccc;
        }

        .tab-content {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="profile">
        <div class="avatar">
            <img src="appicon.png" alt="User Avatar">
            <h2><?= $curr_user->getUsername($uid); ?>
                <?= $curr_user->updateLastActivityTime($uid); ?></h2>
        </div>
        <div class="info">
            <div class="row">
                <p><b>Репутация участника:</b> <?= $curr_user->getUserRating($uid); ?></p>
                <p><b>Участник сообщества </b> с <?= $curr_user->getRegDate($uid); ?></p>
                <p><b>Последний раз в сети:</b> <?= $curr_user->getLastActivity($uid); ?></p>
            </div>
        </div>
        <div class="tabs">
            <button class="tab-btn active" onclick="openTab('gallery')">Галерея</button>
            <button class="tab-btn" onclick="openTab('posts')">Посты</button>
            <button class="tab-btn" onclick="openTab('info')">Настройки</button>
        </div>
        <div id="gallery" class="tab-content">
            <h3>Галерея</h3>
        </div>
        <div id="posts" class="tab-content" style="display: none;">
            <h3>Посты</h3>
        </div>
        <div id="info" class="tab-content" style="display: none;">
            <h3>Настройки аккаунта</h3>
            <?php echo("<form method='post'><button type='submit' value='session_destroy' name='session_destroy'>Выйти</button></form>"); ?>
        </div>
    </div>

    <script>
        function openTab(tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "block";
            tablinks = document.getElementsByClassName("tab-btn");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }
            event.currentTarget.classList.add("active");
        }
    </script>
</body>

</html>
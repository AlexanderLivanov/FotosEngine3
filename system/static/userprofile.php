<?php
// 13.03.2024 (c) Alexander Livanov

if (!empty($_POST['session_destroy'])) {
    echo ('destr sess');
    session_destroy();
    setcookie("FW_AUTH_TOKEN", "", strtotime('+30 days'));
    echo ('<script>window.location.replace("/");</script>');
}
?>
<html>

<head>
    <link rel="stylesheet" href="css/userprofile.css">
    <style>
        #container {
            margin: 20px auto;
        }

        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 200px;
        }

        .ck-content .image {
            /* Block images */
            max-width: 80%;
            margin: 20px auto;
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
            <?php
            require_once('system/static/gallery.php');
            ?>
        </div>
        <div id="posts" class="tab-content" style="display: none;">
            <h3>Посты</h3>
            <div id="container">
                <textarea name="post_title" id="" placeholder="Название поста" style="width: 90%; border: none; border-bottom: 2px solid #0072ff; outline: none;"></textarea>
                <textarea id="default" placeholder="Краткость - сестра таланта..."></textarea>
                <input type="submit" value="Создать пост" style="border-radius: 15px; color: #0072ff; padding: 1em;" onclick="alert(tinymce.activeEditor.getContent());">
            </div>
        </div>
        <div id="info" class="tab-content" style="display: none;">
            <h3>Настройки аккаунта</h3>
            <?php echo ("<form method='post'><button type='submit' value='session_destroy' name='session_destroy'>Выйти</button></form>"); ?>
        </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/qz8i2t9v3yqmvp0hyjlv95kybrn89u3py39nj1efjraq0e9p/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
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
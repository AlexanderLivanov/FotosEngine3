<!-- 10.11.2023 (c) Alexander Livanov -->

<?php
require_once('system/configs/dbcfg.php');
require_once('system/static/scripts/models/main_controller.php');
require_once('system/static/scripts/models/feed_controller.php');

$curr_note = new Note();
$curr_user = new User();

$uid = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>FotosEngine</title>
</head>

<body>
    <header>
        <?php 
        require_once('system/static/header.php');
        if (!$curr_user->auth()) {
            header('Location: /login.php');
        }
        ?>
    </header>
    <div class="feed">
        <?php
            $notes = $curr_note->getAllNotes();
            foreach($notes as $note){
                echo('
                <div class="post-item">
                    <div class="post-container">
                        <div class="post-info">
                            <div class="post-avatar">

                            </div>
                            <div class="post-metatext">
                                <p>
                                '. 
                                $note['author'] . " <b>[Р: " . $curr_user->getUserRating($curr_user->getID($note['author'])) . "]</b>"
                                .'
                                </p>
                            </div>
                            <div class="post-title">
                                <p>
                                <b>'. $note['title'] .'</b>
                                </p>
                            </div>
                            <div class="post-text">
                                <p>
                                '.
                                    $note['text']
                                . '
                                </p>
                            </div>
                            <div class="post-meta">
                                <p>
                                '.
                                    "Просмотры: " . $note['views'] . " | +" . $note['likes'] . " | -" . $note['dislikes'] . " <br> " . $note['datetime']
                                .'
                                </p>
                            </div>
                        </div>
                        <div class="post-img">
                            <img src="'. $note['img_path'] .'" alt="">
                        </div>
                    </div>
                </div>
                ');
            }
        ?>
    </div>
    <footer>
        <?php require_once('system/static/footer.php'); ?>
    </footer>
</body>

</html>
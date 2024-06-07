<?php
// 31.01.2024 (c) Alexander Livanov

function allocStorage($username){
    mkdir('users/' . $username);
    mkdir('system/usercontent/' . $username);
    $userpage_file = 'users/' . $username . '/index.php';
    $userpage_content = '<?php require_once($_SERVER["DOCUMENT_ROOT"] . \'/system/static/content/userpage_template.php\'); ?>';
    file_put_contents($userpage_file, $userpage_content);
}

// 26.05.2024 (c) Alexander Livanov

function setDefaultAvatar($username){
    copy($_SERVER['DOCUMENT_ROOT'] . '/appicon.png', $_SERVER['DOCUMENT_ROOT'] . "/users/$username/avatar.png");
}

function deletePhoto(){
    unlink('users/' . $_GET['username'] . '/' . $_GET['photoID']);
}
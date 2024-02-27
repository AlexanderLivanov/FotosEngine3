<?php
// 31.01.2024 (c) Alexander Livanov

function setStoragePath(){

}

function allocStorage($username){
    mkdir('users/' . $username);
    mkdir('system/usercontent/' . $username);
    $userpage_file = 'users/' . $username . '/index.php';
    $userpage_content = '<?php require_once("/system/static/content/userpage__template.php?uname=' . $username . '"); ?>';
    file_put_contents($userpage_file, $userpage_content);
}
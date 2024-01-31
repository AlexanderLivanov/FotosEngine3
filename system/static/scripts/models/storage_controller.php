<?php
// 31.01.2024 (c) Alexander Livanov

function setStoragePath(){

}

function allocStorage($username){
    mkdir('users/' . $username);
    mkdir('system/usercontent/' . $username);
    copy('system/static/content/userpage__template.php', 'users/' . $username . '/index.php');
}
?>
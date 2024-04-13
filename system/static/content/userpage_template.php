<?php
$currentFolderName = basename(getcwd());
echo ("<h1>Это личная страница пользователя $currentFolderName</h1>");
echo ("<h3>и скоро здесь будет контент</h3>");
echo ("<br>");
echo ("<br>");
echo ("<br>");
echo ("<br>");
echo ("<br>");
echo ("<br>");
echo ("<br>");
echo ("<br>");
echo ("<br>");
echo ("<br>");
echo ("<h3 style='text-align: center; color: #0072ff;'>Ваш FWid: 
<span id='profName' style='color: black; cursor: pointer; text-decoration: underline;' onclick='copyProfileLink()'>FW@$currentFolderName</span></h3>");
?>

<script>
    function copyProfileLink() {
        const text = document.getElementById('profName').innerHTML;
        navigator.clipboard.writeText(text);
    }
</script>
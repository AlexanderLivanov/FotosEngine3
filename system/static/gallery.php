<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    <script src="js/logic.js"></script>
    <link rel="stylesheet" href="css/gallery.css">
    <title></title>
</head>
<body>
    <h3>Добавить фото:</h3>
    <h4 style="color: red;">Галерея пока не работает</h4>
    <div id="content">
        <form id="upload-form" method="post" enctype="multipart/form-data">
            <div class="input-file-row">
                <label class="input-file">
                    <input type="file" disabled name="file[]" multiple id="js-file" accept="image/*">
                    <span>Выберите файл</span>
                </label>
                <div class="input-file-list"></div>
                <!-- <input type="button" value="Опубликовать" id="publish-button" onclick="registerUploadClick()"> -->
            </div>
        </form>
    </div>
</body>

</html>
<!--  <h6 id="subtxt">Добавлено' . gmdate("d-m-Y H:i", $stat['mtime']) . '</h6> -->
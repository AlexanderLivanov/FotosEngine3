var dt = new DataTransfer();

$(".input-file input[type=file]").on("change", function () {
    let $files_list = $(this).closest(".input-file").next();
    $files_list.empty();

    for (var i = 0; i < this.files.length; i++) {
    let file = this.files.item(i);
    dt.items.add(file);

    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = function () {
        let new_file_input =
            '<div class="input-file-list-item">' +
            '<img class="input-file-list-img" src="' +
            reader.result +
            '">' +
            '<span class="input-file-list-name">' +
            file.name +
            "</span>" +
            "</div>";
        $files_list.append(new_file_input);
    };
}
this.files = dt.files;
});

function removeFilesItem(target) {
  let name = $(target).prev().text();
  let input = $(target).closest(".input-file-row").find("input[type=file]");
  $(target).closest(".input-file-list-item").remove();
  for (let i = 0; i < dt.items.length; i++) {
    if (name === dt.items[i].getAsFile().name) {
      dt.items.remove(i);
    }
  }
  input[0].files = dt.files;
}

function deleteThisPhoto(photoID) {
  document.getElementById(photoID).style.display = "none";
  jQuery.ajax({
    type: "POST",
    data: $(this).serialize(),
    dataType: "html",
    url: "system/static/scripts/models/storage_controller.php?photoID=" + photoID,
    success: function (html) {
      console.log("photo deleted");
    },
  });
}

function registerUploadClick() {
  var formData = imgObj.data;
  uploadImagesOnClick(formData);
}

function registerAVUploadClick() {
  var formData = imgObj.data;
  uploadAVOnClick(formData);
}

var imgObj = {};

$("#js-file").change(function () {
  if (window.FormData === undefined) {
    alert("В вашем браузере FormData не поддерживается");
  } else {
    getFileNameWithExt(event);
    var formData = new FormData();
    $.each($("#js-file")[0].files, function (key, input) {
      formData.append("file[]", input);
      imgObj.data = formData;
      document.getElementById("publish-button").style.width = "155px";
      document.getElementById("publish-button").style.height = "40px";
    });
  }
});

$("#av-file").change(function () {
  if (window.FormData === undefined) {
    alert("В вашем браузере FormData не поддерживается");
  } else {
    getFileNameWithExt(event);
    var formData = new FormData();
    formData.append("#av-file", input);
    imgObj.data = formData;
    document.getElementById("av-publish-button").style.width = "155px";
    document.getElementById("av-publish-button").style.height = "40px";
  }
});

function getFileNameWithExt(event) {
  if (
    !event ||
    !event.target ||
    !event.target.files ||
    event.target.files.length === 0
  ) {
    return;
  }

  const name = event.target.files[0].name;
  const lastDot = name.lastIndexOf(".");

  const fileName = name.substring(0, lastDot);
  const ext = name.substring(lastDot + 1);

  if (
    ext != "png" &&
    ext != "jpg" &&
    ext != "jpeg" &&
    ext != "gif" &&
    ext != "svg" &&
    ext != "mp4" &&
    ext != "PNG" &&
    ext != "JPG" &&
    ext != "JPEG" &&
    ext != "GIF" &&
    ext != "SVG" &&
    ext != "MP4"
  ) {
    Toaster.error("Ошибка: файл " + name + " загрузить нельзя");
    setTimeout(function () {
      window.location.reload(1);
    }, 1000);
  }
}

function uploadImagesOnClick(formData) {
  $.ajax({
    type: "POST",
    url: "content/upload.php",
    cache: false,
    contentType: false,
    processData: false,
    data: formData,
    dataType: "json",
    success: function (data) {
      data.forEach(function (msg) {
        Toaster.toast("Файлы успешно загружены");
      });
      window.location.reload();
    },
  });
}

function uploadAVOnClick(formData) {
  $.ajax({
    type: "POST",
    url: "content/uploadAV.php",
    cache: false,
    contentType: false,
    processData: false,
    data: formData,
    dataType: "json",
    success: function (data) {
      data.forEach(function (msg) {
        Toaster.toast("Аватар успешно загружен");
      });
      window.location.reload();
    },
  });
}

const observer = lozad(".gallery-img", {
  rootMargin: "10px 0px", // syntax similar to that of CSS Margin
  threshold: 0.1, // ratio of element convergence
  enableAutoReload: true, // it will reload the new image when validating attributes changes
});
observer.observe();

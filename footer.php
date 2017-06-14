<?php
if(!defined("FROM_INDEX_ALL")) exit(0);
?>

<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <h3 class="text-center"><?=$translate_data['MENU_BUTTON_TITLE']?></h3>
                    <ul class="social text-center">
                    <?php
                    if (PAGE === "index") {
                        echo '
                        <li class="link-active-footer"><a class="btn btn-link" href="index">'.$translate_data['MENU_HOME'].'</a></li>
						<li><a class="btn btn-link" href="gallery">'.$translate_data['MENU_GALLERY'].'</a></li>
						<li><a class="btn btn-link" href="skills">'.$translate_data['MENU_SKILLS'].'</a></li>
						<li><a class="btn btn-link" href="contact">'.$translate_data['MENU_CONTACT'].'</a></li>';
                    }elseif (PAGE === "gallery") {
                        echo '
                        <li><a class="btn btn-link" href="index">'.$translate_data['MENU_HOME'].'</a></li>
						<li class="link-active-footer"><a class="btn btn-link" href="gallery">'.$translate_data['MENU_GALLERY'].'</a></li>
						<li><a class="btn btn-link" href="skills">'.$translate_data['MENU_SKILLS'].'</a></li>
						<li><a class="btn btn-link" href="contact">'.$translate_data['MENU_CONTACT'].'</a></li>';
                    }elseif (PAGE === "article") {
                        echo '
                        <li><a class="btn btn-link" href="index">'.$translate_data['MENU_HOME'].'</a></li>
						<li class="link-active-footer"><a class="btn btn-link" href="gallery">'.$translate_data['MENU_GALLERY'].'</a></li>
						<li><a class="btn btn-link" href="skills">'.$translate_data['MENU_SKILLS'].'</a></li>
						<li><a class="btn btn-link" href="contact">'.$translate_data['MENU_CONTACT'].'</a></li>';
                    }elseif (PAGE === "skills") {
                        echo '
                        <li><a class="btn btn-link" href="index">'.$translate_data['MENU_HOME'].'</a></li>
						<li><a class="btn btn-link" href="gallery">'.$translate_data['MENU_GALLERY'].'</a></li>
						<li class="link-active-footer"><a class="btn btn-link" href="skills">'.$translate_data['MENU_SKILLS'].'</a></li>
						<li><a class="btn btn-link" href="contact">'.$translate_data['MENU_CONTACT'].'</a></li>';
                    }elseif (PAGE === "contact") {
                        echo '
                        <li><a class="btn btn-link" href="index">'.$translate_data['MENU_HOME'].'</a></li>
						<li><a class="btn btn-link" href="gallery">'.$translate_data['MENU_GALLERY'].'</a></li>
						<li><a class="btn btn-link" href="skills">'.$translate_data['MENU_SKILLS'].'</a></li>
						<li class="link-active-footer"><a class="btn btn-link" href="contact">'.$translate_data['MENU_CONTACT'].'</a></li>';
                    }else {
                        echo '
                        <li><a class="btn btn-link" href="index">'.$translate_data['MENU_HOME'].'</a></li>
						<li><a class="btn btn-link" href="gallery">'.$translate_data['MENU_GALLERY'].'</a></li>
						<li><a class="btn btn-link" href="skills">'.$translate_data['MENU_SKILLS'].'</a></li>
						<li><a class="btn btn-link" href="contact">'.$translate_data['MENU_CONTACT'].'</a></li>';
                    }
                    ?>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <h3 class="text-center"><?=$translate_data['CHANGE_LANGUAGE']?></h3>
                    <ul class="social text-center">
                        <?php
                        /*if ($lang === "en") {
                            echo'
                        <li><input type="submit" class="btn btn-link" form="language" disabled value="'.$translate_data['EN_LANGUAGE'].'" name="en" /></li>
                        <li><input type="submit" class="btn btn-link link-active" form="language" value="'.$translate_data['PL_LANGUAGE'].'" name="pl" /></li>
                        <li><input type="submit" class="btn btn-link link-active" form="language" value="'.$translate_data['RU_LANGUAGE'].'" name="ru" /></li>
                        <li><input type="submit" class="btn btn-link link-active" form="language" value="'.$translate_data['UK_LANGUAGE'].'" name="uk" /></li>';
                        }else*/if ($lang === "pl") {
                            echo'
                        <li><input type="submit" class="btn btn-link" form="language" disabled value="'.$translate_data['PL_LANGUAGE'].'" name="pl" /></li>
                        <li><input type="submit" class="btn btn-link link-active" form="language" value="'.$translate_data['RU_LANGUAGE'].'" name="ru" /></li>
                        <li><input type="submit" class="btn btn-link link-active" form="language" value="'.$translate_data['UK_LANGUAGE'].'" name="uk" /></li>
                        <li class="invisible"><input type="submit" class="btn btn-link link-active" disabled /></li>';
                        }elseif ($lang === "ru") {
                            echo'
                        <li><input type="submit" class="btn btn-link link-active" form="language" value="'.$translate_data['PL_LANGUAGE'].'" name="pl" /></li>
                        <li><input type="submit" class="btn btn-link" form="language" disabled value="'.$translate_data['RU_LANGUAGE'].'" name="ru" /></li>
                        <li><input type="submit" class="btn btn-link link-active" form="language" value="'.$translate_data['UK_LANGUAGE'].'" name="uk" /></li>
                        <li class="invisible"><input type="submit" class="btn btn-link link-active" disabled /></li>';
                        }elseif ($lang === "uk") {
                            echo'
                        <li><input type="submit" class="btn btn-link link-active" form="language" value="'.$translate_data['PL_LANGUAGE'].'" name="pl" /></li>
                        <li><input type="submit" class="btn btn-link link-active" form="language" value="'.$translate_data['RU_LANGUAGE'].'" name="ru" /></li>
                        <li><input type="submit" class="btn btn-link" form="language" disabled value="'.$translate_data['UK_LANGUAGE'].'" name="uk" /></li>
                        <li class="invisible"><input type="submit" class="btn btn-link link-active" disabled /></li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <h3 class="text-center"><?=$translate_data['GO_TO_SEND_ME_LETTER']?></h3>
                    <ul class="social text-center">
                        <li><a href="contact"><?=$translate_data['FOOTER_CONTAKT_PAGE']?></a></li>
                        <li><?=$translate_data['FOOTER_CONTAKT_OR']?></li>
                        <li><a href="mailto:t.chebyrator@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <h3 class="text-center"><?=$translate_data['FOOTER_CONTAKT_SOCIAL']?></h3>
                    <ul class="social text-center">
                        <li><a target="_blank" href="https://www.facebook.com/profile.php?id=100001860674164"><i id="social-fb" class="fa fa-facebook fa-3x social"></i></a></li>
                        <li><a target="_blank" href="https://vk.com/taras_bulba23"><i id="social-tw" class="fa fa-vk fa-3x social"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> Copyright &copy; <?=date("Y")?>. <?=$translate_data['FOOTER_ALL_RESERVED']?>. </p>
        </div>
    </div>
    <!--/.footer-->
</footer>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<?php

if (PAGE === "index") {
    echo '<script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $("#home").addClass("active");
    </script>';
}elseif (PAGE === "gallery") {
    echo '
    <script src="js/bootstrap.min.js"></script>
	<script src="js/salvattore.min.js"></script>
    <script type="text/javascript">
        $("#gallery").addClass("active");
    </script>';
}elseif (PAGE === "article") {
    echo '<script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $("#gallery").addClass("active");
    </script>';
}elseif (PAGE === "skills") {
    echo '
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $("#skills").addClass("active");
    </script>
    <script src="js/salvattore.min.js"></script>
    <script src="js/bootstrap-portfilter.min.js"></script>
    <script src="js/custom_s.js"></script>';
}elseif (PAGE === "contact") {
    echo '
    <script src="js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl='.$langsql->getLang().'" async defer></script>
    <script type="text/javascript" src="js/dmuploader.min.js"></script>
<script type="text/javascript">
$("#contact").addClass("active");
$(window).resize(function () {
  var wid = $(window).width();
  if (wid <= 340) {
    $(".g-recaptcha > div").css("width", "180px");
    $(".g-recaptcha > div > div > iframe").css("width", "180px");
  } else {
    $(".g-recaptcha > div").css("width", "304px");
    $(".g-recaptcha > div > div > iframe").css("width", "304px");
  }
});

$(window).ready(function () {

  var data_file;
  var data_file_comp = null;

  $("#drag-and-drop-zone").dmUploader({
    url: "php/upload.php",
	maxFileSize: 16000 * 1014,
    allowedTypes: "*",
	maxFiles: 1,
	extFilter: "zip;rar;pdf;doc;docx;txt",
    dataType: "json",
    method: "POST",
    extraData: {

      PHPSESSID: "'.$_COOKIE['PHPSESSID'].'",
      PHPSESSIP: "'.$langsql->getCryptDecrypt(true, $langsql->getIPAddress()).'",
    },
    /*extFilter: "jpg;png;gif",*/
    onInit: function () {
    },
    onBeforeUpload: function (id) {
      $("#file-progress").css("width", "2%");
      $(".image-preview-input-title").text("Change");
      $(".image-preview-clear").show();
      $(".image-preview-clear").prop("disabled", true);
      $("#file-input").prop("disabled", true);
      $("#send-button").prop("disabled", true);
      $(".image-preview-input").addClass("disabled");
    },
    onNewFile: function (id, file) {
      data_file = file;
    },
    onUploadProgress: function (id, percent) {
      var percentStr = percent + "%";
      $("#file-progress").css("width", percentStr);

    },
    onUploadSuccess: function (id, data) {
      if (data.type == "message") {
        $("#help-block-file").text(data.data.txt).addClass("bg-danger", 2000);
        $("#file-progress").css("width", "0%");
        $(".image-preview-clear").hide();
        $(".image-preview-input input:file").val("");
        $(".image-preview-input-title").text("Browse");
        btn_allow();
      }

      if (data.type == "upload") {
        data_file_comp = data.data.url;
        $("#file_name_h").val(data_file_comp);
        $("#file_name_h").attr("name", "file_name");
        $("#help-block-file").text(data_file.name).removeClass("bg-danger").addClass("bg-success", 2000);
        $("#file-progress").css("width", "100%");
        btn_allow();

      }
    },
    onUploadError: function (id, message) {
      $("#help-block-file").text("'.$translate_data['CONTACT_FAIL_TO_UPLOAD_FILE'].': " + message).addClass("bg-danger", 2000);
      $("#file-progress").css("width", "0%");
      $(".image-preview-clear").hide();
      $(".image-preview-input input:file").val("");
      $(".image-preview-input-title").text("Browse");
      btn_allow();
    },
    onFileTypeError: function (file) {
      $("#help-block-file").text("'.$translate_data["CONTACT_FAIL_TO_UPLOAD_FILE_TYPE"].': " + file.name).addClass("bg-danger", 2000);
      $("#file-progress").css("width", "0%");
      $(".image-preview-clear").hide();
      $(".image-preview-input input:file").val("");
      $(".image-preview-input-title").text("Browse");
      btn_allow();
    },
    onFileSizeError: function (file) {
      $("#help-block-file").text("'.$translate_data["FILE_LOAD_ERROR_TO_BIG_SIZE"].': " + file.name).addClass("bg-danger", 2000);
      $("#file-progress").css("width", "0%");
      $(".image-preview-clear").hide();
      $(".image-preview-input input:file").val("");
      $(".image-preview-input-title").text("Browse");
      btn_allow();
    },
    onFileExtError: function (file) {
      $("#help-block-file").text("'.$translate_data["FILE_LOAD_ERROR_WRONG_TYPE_FILE"].': " + file.name).addClass("bg-danger", 2000);
      $("#file-progress").css("width", "0%");
      $(".image-preview-clear").hide();
      $(".image-preview-input input:file").val("");
      $(".image-preview-input-title").text("Browse");
      btn_allow();
    },
    onFallbackMode: function (message) {
      $("#help-block-file").text("'.$translate_data["CONTACT_BROWSER_NOT_SUPPORT_DND"].'").addClass("bg-danger", 2000);

    }
  });
  $(".image-preview-clear").click(function () {
    $.ajax({
      url: "php/upload.php",
      data: {
        file_del: true,
        file_name: data_file_comp,
        PHPSESSID: "'.$_COOKIE["PHPSESSID"].'",
        PHPSESSIP: "'.$langsql->getCryptDecrypt(true, $langsql->getIPAddress()).'",
      },
      type: "POST",
      dataType: "json",

      success: function (data) {
          if (data.type == "upload") {
        $(".image-preview-clear").hide();
        $(".image-preview-input input:file").val("");
        $(".image-preview-input-title").text("Browse");
        $("#help-block-file").text(data.data.txt).removeClass("bg-danger").addClass("bg-success", 2000);
        $("#file-progress").css("width", "0%");
        }
        if (data.type == "message") {
        $("#help-block-file").text(data.data.txt).removeClass("bg-success").addClass("bg-danger");
            }
      },
      error:function (status) {
        $("#help-block-file").text(status.data.txt).removeClass("bg-success").addClass("bg-danger");
      },
	});
  });
  function btn_allow() {
    $("#send-button").prop("disabled", false);
    $("#file-input").prop("disabled", false);
    $(".image-preview-clear").prop("disabled", false);
    $(".image-preview-input").removeClass("disabled");
  }
});
</script>';
}else {
    echo '<script src="js/bootstrap.min.js"></script>
    <script src="js/salvattore.min.js"></script>';
}
if($error_sal == true){
	echo '<script src="js/salvattore.min.js"></script>';
	$error_sal = false;
}

?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88033033-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>

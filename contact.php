<?php
define( "FROM_INDEX_ALL", true ); require_once(dirname(__FILE__) . '/header.php');
define("PAGE", "contact");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $langsql->setWork($_POST);
    header("Location: ".substr($langsql->request_url(false),0,-4));
    exit;
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1">
        <?php
        if (!empty($_COOKIE['error'])) {
			setcookie("error", false, time()-3600*25, "/");
            echo'
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">'.$translate_data['CONTACT_CLOSE'].'</span></button>
                <strong>'.$translate_data['CONTACT_ERROR'].'</strong> '.$_COOKIE['error'].'
            </div>';
			unset($_COOKIE['error']);
        }elseif (!empty($_COOKIE['success'])) {
			setcookie("success", false, time()-3600*25, "/");
            echo'
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>'.$translate_data['CONTACT_SUCCESS'].'</strong> '.$_COOKIE['success'].'
            </div>';
			unset($_COOKIE['success']);
        }
        ?>
        </div>
        <div class="col-xs-12 col-sm-11 col-sm-offset-1">
            <p>
                <h1><?=$translate_data['CONTACT_HELLO']?></h1>
            </p>
        </div>
        <div class="col-xs-12 col-sm-6 col-sm-offset-1">
            <p>
                <address>
                    <strong><?=$translate_data['CONTACT_MEIL_ME']?></strong>
                    <a href="mailto:t.chebyrator@gmail.com">t.chebyrator@gmail.com</a>
                </address>
            </p>
        </div>
        <div class="col-xs-12 col-sm-4">
            <blockquote>
                <p><?=$translate_data['CONTACT_I_WILL_SENT_YOU']?></p>
            </blockquote>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-11">
            <form method="POST" action="<?=htmlentities($_SERVER['PHP_SELF'])?>" class="form-horizontal" role="form">

                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><?=$translate_data['CONTACT_YOU_NAME']?></label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="<?=$translate_data['CONTACT_YOU_NAME']?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label"><?=$translate_data['CONTACT_YOU_EMAIL']?></label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="<?=$translate_data['CONTACT_YOU_EMAIL']?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSubject" class="col-sm-2 control-label"><?=$translate_data['CONTACT_YOU_SUBJECT']?></label>
                    <div class="col-sm-10">
                        <input type="text" name="subject" class="form-control" id="inputSubject" placeholder="<?=$translate_data['CONTACT_YOU_SUBJECT']?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputText" class="col-sm-2 control-label"><?=$translate_data['CONTACT_YOU_TEXT']?></label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="text" rows="4" class="form-control textarea-contact" id="inputText" placeholder="<?=$translate_data['CONTACT_YOU_TEXT']?>" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFile" class="col-sm-2 control-label" id="lable-4-progress"><?=$translate_data['CONTACT_YOU_FILE']?></label>
                    <div class="col-sm-10" id="drag-and-drop-zone">
                        <div class="input-group" id="inputFile">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" id="file-progress" style="width: 0%">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                            <span class="input-group-btn">
                                <!-- image-preview-clear button -->
                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                    <span class="glyphicon glyphicon-remove"></span> <?=$translate_data['CONTACT_YOU_FILE_CLER']?>
                                </button>
                                <!-- image-preview-input -->
                                <div class="btn btn-default image-preview-input">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                    <span class="image-preview-input-title"><?=$translate_data['CONTACT_YOU_FILE_BROWSE']?></span>
                                    <input type="file" name="file" id="file-input" /> <!-- rename it -->
                                </div>
                            </span>
                        </div><!-- /input-group image-preview [TO HERE]-->
                        <p class="help-block" id="help-block-file"><?=$translate_data['CONTACT_YOU_FILE_DND_ZONE']?> <noscript class="text-danger"><?=$translate_data['CONTACT_YOU_FILE_NO_SCRIPT']?></noscript></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputText" class="col-sm-2 control-label"><?=$translate_data['CONTACT_YOU_CAPTCHA']?></label>
                    <div class="col-sm-10">
                        <div class="g-recaptcha" data-size="normal" data-sitekey="6LcfNgsUAAAAAJV1_nCTAuOGlNixcUgQqw-f6dwC"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success" role="button" id="send-button"><?=$translate_data['CONTACT_YOU_SEND_LETTER']?> <i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
                <input type="hidden" value="" id="file_name_h">
                <input type="hidden" value="<?=$_COOKIE['PHPSESSID']?>" name="PHPSESSID" >
                <input type="hidden" value="<?=$langsql->getCryptDecrypt(true, $langsql->getIPAddress())?>" name="PHPSESSIP" >
            </form>
        </div>

    </div>
</div>

<?php
require_once(dirname(__FILE__) . '/footer.php');
?>

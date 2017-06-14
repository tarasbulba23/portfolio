<?php

error_reporting(E_ALL);
ini_set('display_errors',0);

$status = $_SERVER['REDIRECT_STATUS'];
$codes = array("400","403","404","405","408","500","502","504");

if (empty($status) && !in_array($status, $codes)) {
    /*echo '
    <a href="index"><img src="images/404.gif" alt="error" style="max-width:100%;width:100vh;height:auto;display:block;margin-left:auto;margin-right:auto;"></a>';
    die;*/
    $status = "404";
    /*echo '<pre>';
    print_r($_SERVER);
    echo '</pre>';   */
}

$error_sal = null;

if($status === "200"){
	$status = "404";
}

if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
	define( "FROM_INDEX_ALL", true ); require_once(dirname(__FILE__) . '/header.php');
}else{
	$error_sal = true;
}
?>
<div class="container">
    <div class="row">

        <div class="col-xs-12">

            <div class="pacman center-block">
                <div class="pacman-mask">
                    <div class="pacman-inner"></div>
                </div>
            </div>

        </div>
        <div class="col-xs-12" style="margin-top:25px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center"><?=$translate_data['ERROR_TITLE']?> <i class="fa fa-frown-o fa-2x"></i></h3>
                </div>
                <div class="panel-body">

                    <div class="row masonry" data-columns>
                        <div class="item">
                                <ul class="list-group text-center">
                                    <li class="list-group-item list-group-item-danger"><strong><?=$translate_data['ERROR_BLOCK_DANGER_TITLE']?></strong></li>
                                    <li class="list-group-item"><?=$translate_data['ERROR_BLOCK_DANGER_FIRST']?></li>
                                    <li class="list-group-item"><?=$translate_data['ERROR_BLOCK_DANGER_SECOND']?></li>
                                    <li class="list-group-item"><strong><u><?=$translate_data['ERROR_BLOCK_DANGER_THIRD']?></u></strong></li>
                                </ul>
                        </div>
                        <div class="item">
                                <ul class="list-group text-center">
                                    <li class="list-group-item list-group-item-success"><strong><?=$translate_data['ERROR_BLOCK_SUCCESS_TITLE']?></strong></li>
                                    <li class="list-group-item"><a class="btn btn-primary btn-sm" href="index"><i class="fa fa-arrow-left"></i> <?=$translate_data['MENU_HOME']?></a></li>
                                    <li class="list-group-item"><a class="btn btn-primary btn-sm" href="gallery"><i class="fa fa-arrow-left"></i> <?=$translate_data['MENU_GALLERY']?></a></li>
                                    <li class="list-group-item"><a class="btn btn-primary btn-sm" href="skills"><i class="fa fa-arrow-left"></i> <?=$translate_data['MENU_SKILLS']?></a></li>
                                </ul>
                        </div>
                        <div class="item">
                                <ul class="list-group text-center">
                                    <li class="list-group-item list-group-item-info"><strong><?=$translate_data['ERROR_BLOCK_INFO_TITLE']?></strong></li>
                                    <li class="list-group-item"><a class="btn btn-primary btn-sm" href="contact"><?=$translate_data['MENU_CONTACT']?> <i class="fa fa-arrow-right"></i></a></li>
                                    <li class="list-group-item"><strong><?=$translate_data['ERROR_BLOCK_INFO_CODE']?></strong> <?=htmlspecialchars_decode($status)?></li>
                                    <li class="list-group-item"><strong><?=$translate_data['ERROR_BLOCK_INFO_INFO']?></strong> <?=$translate_data['ERROR_'.$status]?></li>
                                </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<?php
require_once(dirname(__FILE__) . '/footer.php');
?>
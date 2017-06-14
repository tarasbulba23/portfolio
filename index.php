<?php
define( "FROM_INDEX_ALL", true ); require_once(dirname(__FILE__) . '/header.php');
define("PAGE", "index");
$data = $langsql->getFront(true);
if (empty($data)) {
    header('HTTP/1.1 500 Internal Server Error');
    header('Status: 500 Internal Server Error');
    header("Location: /500");
    exit;
}
?>
<div class="container-fluid">
    <div class="row">

        <div class="col-xs-12 col-md-5 visible-xs visible-sm text-center">
            <p><h1><?=htmlspecialchars_decode($data['hello'])?></h1></p>
            <p><h2><?=htmlspecialchars_decode($data['sub_hello'])?></h2></p>
		</div>
        <div class="col-xs-12 col-md-5 col-md-offset-1">
			<picture>
				<source srcset="images/my_photo/my_photo_extra_small.jpg" media="screen and (max-width: 767px)">
				<source srcset="images/my_photo/my_photo_small.jpg" media="screen and (min-width: 768px) and (max-width: 991px)">
				<source srcset="images/my_photo/my_photo_extra_small.jpg" media="screen and (min-width: 992px) and (max-width: 1199px)">
				<source srcset="images/my_photo/my_photo_small.jpg" media="screen and (min-width: 1200px) and (max-width: 2299px)">
				<source srcset="images/my_photo/my_photo_large.jpg" media="screen and (min-width: 2300px)">
				<img srcset="images/my_photo/my_photo_small.jpg" alt="<?=$translate_data['ALT_MY_FRONT_IMAGE']?>" class="img-responsive img-thumbnail center-block">
			</picture>
        </div>
        <div class="col-xs-12 col-md-5 visible-md visible-lg">
            <p><h1><?=htmlspecialchars_decode($data['hello'])?></h1></p>
            <p><h2><?=htmlspecialchars_decode($data['sub_hello'])?></h2></p>
		</div>
        <div class="col-xs-12 col-md-5">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <p><a href="<?=htmlspecialchars_decode($data['link_4_pdf'])?>" target="_blank" class="btn btn-info btn-sm btn-block"><?=$translate_data['BUTTON_FRONT_CV']?></a></p>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <p><a href="gallery" class="btn btn-info btn-sm btn-block"><?=$translate_data['BUTTON_FRONT_PROJECT']?></a></p>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <p><a href="skills" class="btn btn-info btn-sm btn-block"><?=$translate_data['BUTTON_FRONT_SKILLS']?></a></p>
                </div>
            </div>
            <p class="text-justify">
                <?=htmlspecialchars_decode($data['article'])?>
            </p>
            <p class="text-right">
                <a href="contact" class="btn btn-success btn-block transition"><?=$translate_data['GO_TO_SEND_ME_LETTER']?> <i class="fa fa-arrow-right"></i></a>
            </p>
        </div>

    </div>
</div>

<?php
require_once(dirname(__FILE__) . '/footer.php');
?>

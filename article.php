<?php
define( "FROM_INDEX_ALL", true ); require_once(dirname(__FILE__) . '/header.php');
define("PAGE", "article");
$id = null;
$id = htmlspecialchars($_GET['article']);
if (empty($id) || !ctype_digit(strval($id))) {
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    header('Status: 404 Not Found');
    header("Location: /404" );
    require_once 'error.php';
	exit;

}

$data = $langsql->getAllArc(false, $id);

if (empty($data)) {
   	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    header('Status: 404 Not Found');
    header("Location: /404" );
	require_once 'error.php';
    exit;
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-push-7 col-sm-offset-1 col-sm-3 col-md-3">
            <div>
                <h3 class="text-center"><?=htmlspecialchars_decode($data['articleTitle'])?></h3>
                <p class="text-justify"><?=htmlspecialchars_decode($data['articleText'])?></p>
                <hr/>
                <p><h4><?=$translate_data['ARTICLE_SOFRWARE']?></h4><?=htmlspecialchars_decode($data['articleSoft'])?></p>
                <p><a href="gallery#<?=htmlspecialchars_decode($data['articleID'])?>" class="btn btn-success transition"> <i class="fa fa-arrow-left"></i> <?=$translate_data['ROLL_BACK_FROM_ARTICLE']?></a></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-pull-3 col-sm-7 col-md-7">
            <p><?=htmlspecialchars_decode($data['fullArticle'])?></p>
        </div>
        <div class="col-xs-12 visible-xs">
            <p><a href="gallery#<?=htmlspecialchars_decode($data['articleID'])?>" class="btn btn-success transition"> <i class="fa fa-arrow-left"></i> <?=$translate_data['ROLL_BACK_FROM_ARTICLE']?></a></p>
        </div>

    </div>
</div>


<?php
require_once(dirname(__FILE__) . '/footer.php');
?>

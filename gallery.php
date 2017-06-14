<?php
define( "FROM_INDEX_ALL", true ); require_once(dirname(__FILE__) . '/header.php');
define("PAGE", "gallery");
$data = $langsql->getAllArc();
if (empty($data)) {
    header('HTTP/1.1 404 Not Found');
    header('Status: 404 Not Found');
    header("Location: /404");
    exit;
}
?>

<div class="container-fluid">
    <div class="row masonry" data-columns>
        <?php
        foreach ($data as $val) {
            echo
        '<div class="item" id="'.htmlspecialchars_decode($val['articleID']).'">
            <div class="thumbnail">
            	<h3 class="hader-gallery"><a href="article?article='.htmlspecialchars_decode($val['articleID']).'" class="transition">'.htmlspecialchars_decode($val['articleTitle']).'</a></h3>
                '.htmlspecialchars_decode($val['articlePreviewImage']).'
                <div class="caption">
                    <p>'.htmlspecialchars_decode($val['shortDescription']).'</p>
                    <a href="article?article='.htmlspecialchars_decode($val['articleID']).'" class="btn btn-success transition">'.$translate_data['MORE_ARTICLE'].' <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>';
        }
        
        ?>

    </div>
</div>

<?php
require_once(dirname(__FILE__) . '/footer.php');
?>

<?php
define( "FROM_INDEX_ALL", true ); require_once(dirname(__FILE__) . '/header.php');
define("PAGE", "skills");
$sqldata = $langsql->getFront(false);
if (empty($sqldata)) {
    header('HTTP/1.1 500 Not Found');
    header('Status: 500 Not Found');
    header("Location: /500");
    exit;
}
?>

<div class="container-fluid">
    <div class="row">

        <div class="col-xs-12 col-md-6">

            <div class="row">
                <div class="col-xs-12">
                    <div class="list-group list-group-horizontal text-center">
                        <button data-toggle="portfilter" data-target="all" class="list-group-item filter-all active"><?=$translate_data['SKILLS_BUTTON_VIEW_ALL']?></button>
                        <div class="row">
                            <div class="col-xs-6">
                                <button data-toggle="portfilter" data-target="expert" class="list-group-item "><?=$translate_data['SKILLS_BUTTON_VIEW_EXPERT']?></button>
                                <button data-toggle="portfilter" data-target="can" class="list-group-item "><?=$translate_data['SKILLS_BUTTON_VIEW_CAN_DO']?></button>
                            </div>
                            <div class="col-xs-6">
                                <button data-toggle="portfilter" data-target="lang" class="list-group-item "><?=$translate_data['SKILLS_BUTTON_VIEW_LANG']?></button>
                                <button data-toggle="portfilter" data-target="hobby" class="list-group-item "><?=$translate_data['SKILLS_BUTTON_VIEW_HOBBY']?></button>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="text-justify well">
                        <h3 data-tag="all" class="text-center"><?=$translate_data['SKILLS_TITLE_ARTICLE_ABOUT_ME']?></h3>
                        <h3 data-tag="expert" class="not-my text-center hide"><?=$translate_data['SKILLS_TITLE_ARTICLE_EXPERT']?></h3>
                        <h3 data-tag="can" class="not-my text-center hide"><?=$translate_data['SKILLS_TITLE_TITLE_CAN_DO']?></h3>
                        <h3 data-tag="lang" class="not-my text-center hide"><?=$translate_data['SKILLS_TITLE_ARTICLE_LANGUAGE']?></h3>
                        <h3 data-tag="hobby" class="not-my text-center hide"><?=$translate_data['SKILLS_TITLE_ARTICLE_HOBBY']?></h3>
                        <div data-tag="all"><?=htmlspecialchars_decode($sqldata['fullArticleMe'])?></div>
                        <div data-tag="expert" class="not-my hide"><?=htmlspecialchars_decode($sqldata['fullArticleExpert'])?></div>
                        <div data-tag="can" class="not-my hide"><?=htmlspecialchars_decode($sqldata['fullArticleCan'])?></div>
                        <div data-tag="lang" class="not-my hide"><?=htmlspecialchars_decode($sqldata['fullArticleLang'])?></div>
                        <div data-tag="hobby" class="not-my hide"><?=htmlspecialchars_decode($sqldata['fullArticleHobby'])?></div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-xs-12 col-md-6">
            
            <div class="panel panel-default" data-tag="expert">
                <div class="panel-heading"><?=$translate_data['SKILLS_BUTTON_VIEW_EXPERT']?></div>
                <div class="panel-body">

                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="skills1" class="col-sm-3 control-label">3D Max</label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills1">
                                    <div class="progress-bar progress-bar-striped active" style="width: 90%">
                                        <span>90%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills2" class="col-sm-3 control-label">Substance Painter</label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills2">
                                    <div class="progress-bar progress-bar-striped active" style="width: 85%">
                                        <span>85%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills3" class="col-sm-3 control-label">V-Ray</label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills3">
                                    <div class="progress-bar progress-bar-striped active" style="width: 90%">
                                        <span>90%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="skills4" class="col-sm-3 control-label">ZBrush</label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills4">
                                    <div class="progress-bar progress-bar-striped active" style="width: 25%">
                                        <span>25%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="skills5" class="col-sm-3 control-label">PhotoShop</label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills5">
                                    <div class="progress-bar progress-bar-striped active" style="width: 65%">
                                        <span>65%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills5" class="col-sm-3 control-label">Mudbox</label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills5">
                                    <div class="progress-bar progress-bar-striped active" style="width: 30%">
                                        <span>30%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel-footer" >
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <p class="text-left">
                                <a href="gallery" class="btn btn-success btn-block transition"><i class="fa fa-arrow-left"></i> <?=$translate_data['GO_TO_VIEW_GALLERY']?></a>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <p class="text-right">
                                <a href="contact" class="btn btn-success btn-block transition"><?=$translate_data['GO_TO_SEND_ME_LETTER']?> <i class="fa fa-arrow-right"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default" data-tag="can">
                <div class="panel-heading"><?=$translate_data['SKILLS_BUTTON_VIEW_CAN_DO']?></div>
                <div class="panel-body">

                    <div class="form-horizontal">
                        <div class="form-group" data-toggle="tooltip" data-placement="top" title="<?=$translate_data['SKILLS_TITLE_TOOLTIP_DESIGN']?>">
                            <label for="skills6" class="col-sm-3 control-label"><?=$translate_data['SKILLS_TITLE_PROGRESS_DESIGN']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills6">
                                    <div class="progress-bar progress-bar-striped active" style="width: 99%">
                                        <span>99%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills7" class="col-sm-3 control-label"><?=$translate_data['SKILLS_TITLE_PROGRESS_OBJECT_VISUALIZATION']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills7">
                                    <div class="progress-bar progress-bar-striped active" style="width: 100%">
                                        <span>100%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills8" class="col-sm-3 control-label"><?=$translate_data['SKILLS_TITLE_PROGRESS_INTERIOR_VISUALIZATION']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills8">
                                    <div class="progress-bar progress-bar-striped active" style="width: 100%">
                                        <span>100%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills9" class="col-sm-3 control-label"><?=$translate_data['SKILLS_TITLE_PROGRESS_EXTERIOR_VISUALIZATION']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills9">
                                    <div class="progress-bar progress-bar-striped active" style="width: 100%">
                                        <span>100%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills10" class="col-sm-3 control-label"><?=$translate_data['SKILLS_TITLE_PROGRESS_MODELING']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills10">
                                    <div class="progress-bar progress-bar-striped active" style="width: 100%">
                                        <span>100%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills11" class="col-sm-3 control-label"><?=$translate_data['SKILLS_TITLE_PROGRESS_MODELING_LOW']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills11">
                                    <div class="progress-bar progress-bar-striped active" style="width: 100%">
                                        <span>100%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills12" class="col-sm-3 control-label"><?=$translate_data['SKILLS_TITLE_PROGRESS_MODELING_HIGT']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills12">
                                    <div class="progress-bar progress-bar-striped active" style="width: 100%">
                                        <span>100%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills13" class="col-sm-3 control-label"><?=$translate_data['SKILLS_TITLE_PROGRESS_TEXTURING']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills13">
                                    <div class="progress-bar progress-bar-striped active" style="width: 100%">
                                        <span>100%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills14" class="col-sm-3 control-label"><?=$translate_data['SKILLS_TITLE_PROGRESS_ANIMATION']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills14">
                                    <div class="progress-bar progress-bar-striped active" style="width: 35%">
                                        <span>35%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills15" class="col-sm-3 control-label"><?=$translate_data['SKILLS_TITLE_PROGRESS_FX']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills15">
                                    <div class="progress-bar progress-bar-striped active" style="width: 45%">
                                        <span>45%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills16" class="col-sm-3 control-label"><?=$translate_data['SKILLS_TITLE_PROGRESS_RENDERING']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills16">
                                    <div class="progress-bar progress-bar-striped active" style="width: 100%">
                                        <span>100%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <p class="text-left">
                                <a href="gallery" class="btn btn-success btn-block transition"><i class="fa fa-arrow-left"></i> <?=$translate_data['GO_TO_VIEW_GALLERY']?></a>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <p class="text-right">
                                <a href="contact" class="btn btn-success btn-block transition"><?=$translate_data['GO_TO_SEND_ME_LETTER']?> <i class="fa fa-arrow-right"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default" data-tag="lang">
                <div class="panel-heading"><?=$translate_data['SKILLS_BUTTON_VIEW_LANG']?></div>
                <div class="panel-body">

                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="skills17" class="col-sm-3 control-label"><?=$translate_data['UK_LANGUAGE']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills17">
                                    <div class="progress-bar progress-bar-striped active" style="width: 100%">
                                        <span>100%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills18" class="col-sm-3 control-label"><?=$translate_data['RU_LANGUAGE']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills18">
                                    <div class="progress-bar progress-bar-striped active" style="width: 60%">
                                        <span>60%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills19" class="col-sm-3 control-label"><?=$translate_data['EN_LANGUAGE']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills19">
                                    <div class="progress-bar progress-bar-striped active" style="width: 30%">
                                        <span>30%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills20" class="col-sm-3 control-label"><?=$translate_data['PL_LANGUAGE']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills20">
                                    <div class="progress-bar progress-bar-striped active" style="width: 65%">
                                        <span>65%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <p class="text-left"></p>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <p class="text-right">
                                <a href="contact" class="btn btn-success btn-block transition"><?=$translate_data['GO_TO_SEND_ME_LETTER']?> <i class="fa fa-arrow-right"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default" data-tag="hobby">
                <div class="panel-heading"><?=$translate_data['SKILLS_BUTTON_VIEW_HOBBY']?></div>
                <div class="panel-body">

                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="skills21" class="col-sm-3 control-label"><?=$translate_data['SKILLS_TITLE_PROGRESS_PROGRAMING_HTML_CSS']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills21">
                                    <div class="progress-bar progress-bar-striped active" style="width: 60%">
                                        <span>60%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills22" class="col-sm-3 control-label"><?=$translate_data['SKILLS_TITLE_PROGRESS_PROGRAMING_PHP']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills22">
                                    <div class="progress-bar progress-bar-striped active" style="width: 65%">
                                        <span>65%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills23" class="col-sm-3 control-label"><?=$translate_data['SKILLS_TITLE_PROGRESS_PROGRAMING_C']?></label>
                            <div class="col-sm-9">
                                <div class="progress" id="skills23">
                                    <div class="progress-bar progress-bar-striped active" style="width: 30%">
                                        <span>30%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <p class="text-left"></p>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <p class="text-right">
                                <a href="contact" class="btn btn-success btn-block transition"><?=$translate_data['GO_TO_SEND_ME_LETTER']?> <i class="fa fa-arrow-right"></i></a>
                            </p>
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
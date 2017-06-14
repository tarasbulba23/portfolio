<?php

error_reporting(E_ALL);
ini_set('display_errors',0);

if( !defined("FROM_INDEX_ALL") ) exit(0);
define( "FROM_SQL_ALL", true ); require_once(dirname(__FILE__) . '/php/langSQL.class.php');
header('Content-type: text/html; charset=utf-8');

$langsql = new langSql();
$lang = $langsql->getLang();
$translate_data = $langsql->getIni();

if (empty($_COOKIE['PHPSESSID'])) {
	setcookie("PHPSESSID", md5($langsql->getIPAddress()), time()+3600*24*365, "/", "");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!empty($_POST)) {
		$lan = null;
		foreach ($_POST as $key => $value) {
			//if ( $key === "en" || $key === "pl" || $key === "ru" || $key === "uk") {
			if ( $key === "pl" || $key === "ru" || $key === "uk") {
				$lan = $key;
				break;
			}
		}
		if (!empty($lan)) {
			$langsql->setLang($lan);
			unset($lan);
			$start = strpos($_POST['page'], "?article=", 20);
			if ($start === false) {
				header("Location: ".substr($langsql->request_url(false),0,-4));
				exit;
			}else {
				$page = substr($_POST['page'], $start);
				header("Location: ".substr($langsql->request_url(false),0,-4).$page);
				exit;
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="<?=$lang?>">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?=$translate_data['DESCRIPTION']?>">
    	<meta name="author" content="<?=$translate_data['AUTHOR']?>">
		<meta name="keywords" content="<?=$translate_data['KEYWORDS']?>">
		<meta name="robots" content="index, follow">
		<title><?=$translate_data['TITLE']?></title>
		<link rel="alternate" href="https://graphic-by-hereha.com/" hreflang="x-default" />

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

		<link rel="icon" href="images/favicon.ico">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script>
			document.createElement( "picture" );
		</script>
		<script src="https://cdn.rawgit.com/scottjehl/picturefill/3.0.2/dist/picturefill.min.js" async></script>
		<meta name="google-site-verification" content="iJEKvGIzosTGwCiIs2wv5u8WKcUJiX_28kR5foj0wpM" />
	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
						aria-controls="navbar">
            <span class="sr-only"><?=$translate_data['TOGGLE_NAVIGATION']?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
					<a class="navbar-brand" href="index"><?=$translate_data['PROJECT_NAME']?></a>
				</div>
				<div id="navbar" class="navbar-collapse navbar-right collapse">
					<ul class="nav navbar-nav">
						<li id="home"><a href="index"><?=$translate_data['MENU_HOME']?></a></li>
						<li id="gallery"><a href="gallery"><?=$translate_data['MENU_GALLERY']?></a></li>
						<li id="skills"><a href="skills"><?=$translate_data['MENU_SKILLS']?></a></li>
						<li id="contact"><a href="contact"><?=$translate_data['MENU_CONTACT']?></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$translate_data['CHANGE_LANGUAGE']?><span class="caret"></span></a>
							<ul class="dropdown-menu">
							<form action="<?=htmlentities($_SERVER['PHP_SELF'])?>" id="language" method="POST"><input type="hidden" name="page" value="<?=$langsql->request_url(false)?>"></form>
							<?php
								/*if ($lang === "en") {
									echo '<li class="active disabled"><input type="submit" class="link-btn en-flag" form="language" value="'.$translate_data['EN_LANGUAGE'].'" name="en" /></li>
									<li><input type="submit" class="link-btn pl-flag" form="language" value="'.$translate_data['PL_LANGUAGE'].'" name="pl" /></li>
									<li><input type="submit" class="link-btn ru-flag" form="language" value="'.$translate_data['RU_LANGUAGE'].'" name="ru" /></li>
									<li><input type="submit" class="link-btn uk-flag" form="language" value="'.$translate_data['UK_LANGUAGE'].'" name="uk" /></li>';
								}else*/if ($lang === "pl") {
									echo '
									<li class="active disabled"><input type="submit" class="link-btn pl-flag" form="language" value="'.$translate_data['PL_LANGUAGE'].'" name="pl" /></li>
									<li><input type="submit" class="link-btn ru-flag" form="language" value="'.$translate_data['RU_LANGUAGE'].'" name="ru" /></li>
									<li><input type="submit" class="link-btn uk-flag" form="language" value="'.$translate_data['UK_LANGUAGE'].'" name="uk" /></li>';
								}elseif ($lang === "ru") {
									echo '
									<li><input type="submit" class="link-btn pl-flag" form="language" value="'.$translate_data['PL_LANGUAGE'].'" name="pl" /></li>
									<li class="active disabled"><input type="submit" class="link-btn ru-flag" form="language" value="'.$translate_data['RU_LANGUAGE'].'" name="ru" /></li>
									<li><input type="submit" class="link-btn uk-flag" form="language" value="'.$translate_data['UK_LANGUAGE'].'" name="uk" /></li>';
								}elseif ($lang === "uk") {
									echo '
									<li><input type="submit" class="link-btn pl-flag" form="language" value="'.$translate_data['PL_LANGUAGE'].'" name="pl" /></li>
									<li><input type="submit" class="link-btn ru-flag" form="language" value="'.$translate_data['RU_LANGUAGE'].'" name="ru" /></li>
									<li class="active disabled"><input type="submit" class="link-btn uk-flag" form="language" value="'.$translate_data['UK_LANGUAGE'].'" name="uk" /></li>';
								}
							?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<noscript>
			<div class="contener-fluid">
				<div class="row">
					<div class="col-xs-12">
						<div class="alert alert-danger text-center text-uppercase" role="alert"><?=$translate_data['CONTACT_YOU_FILE_NO_SCRIPT']?></div>
					</div>
				</div>
			</div>
		</noscript>

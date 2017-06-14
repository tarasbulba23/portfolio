<?php
	$echo_data = array('ru' => array("Загрузка...", "Для просмотра контента нужно HTML5 / CSS3, WebGL или Adobe Flash Player версии 9 или выше.", "Пожалуйста, включите JavaScript!"),
	'uk' => array("Завантаження...", "Для перегляду контенту потрібно HTML5/CSS3, WebGL або Adobe Flash Player версії 9 або вище.", "Будь ласка, включіть JavaScript!"),
	'pl' => array("Ładowanie...", "Ta treść wymaga HTML5/CSS3, WebGL, lub Adobe Flash player w wersji 9 lub wyższej.", "Proszę włączyć obsługę JavaScript!"));
	$lang_arr = array('pl', 'uk', 'ru');
	$lang = 'ru';
	if(in_array($_COOKIE['lang'], $lang_arr)){
		$lang = $_COOKIE['lang'];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
		<title>Loft</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<meta name="mobile-web-app-capable" content="yes" />		
		<script type="text/javascript" src="swfobject.js">
		</script>
		<style type="text/css" title="Default">
			body, div, h1, h2, h3, span, p {
				font-family: Verdana,Arial,Helvetica,sans-serif;
			}
			/* fullscreen */
			html {
				height:100%;
			}
			body {
				height:100%;
				margin: 0px;
				overflow:hidden; /* disable scrollbars */
				font-size: 10pt;
			}
			/* fix for scroll bars on webkit & >=Mac OS X Lion */ 
			::-webkit-scrollbar {
				background-color: rgba(0,0,0,0.5);
				width: 0.75em;
			}
			::-webkit-scrollbar-thumb {
    			background-color:  rgba(255,255,255,0.5);
			}
		</style>	
	</head>
	<body>
<!-- - - - - - - 8<- - - - - - cut here - - - - - 8<- - - - - - - -->
		<script type="text/javascript" src="pano2vr_player.js">
		</script>
		<script type="text/javascript" src="skin.js">
		</script>
		<script type="text/javascript" src="pano2vrgyro.js">
		</script>
		<div id="container" style="width:100%;height:100%;">
		<br><?=$echo_data[$lang][0]?><br><br>
		<?=$echo_data[$lang][1]?>
		</div>
		<script type="text/javascript">
		var startNode=document.location.hash.substring(1);
		if (("onhashchange" in window) && (!(/MSIE (\d+\.\d+);/.test(navigator.userAgent)))) {
			window.onhashchange = function () {
				pano.openNext('{' + window.location.hash.substring(1) + '}');
         	}
	    } else {
        	var lastHash = window.location.hash;
        	window.setInterval(function () {
	           	if (window.location.hash != lastHash) {
   	        		lastHash = window.location.hash;
					pano.openNext('{' + window.location.hash.substring(1) + '}');
        	   	}
        	}, 100);
		}
	
		// check for CSS3 3D transformations and WebGL
		if (ggHasHtml5Css3D() || ggHasWebGL()) {
			// use HTML5 panorama
			// create the panorama player with the container
			pano=new pano2vrPlayer("container");
		} else 
		if (swfobject.hasFlashPlayerVersion("10.0.0")) {
			var flashvars = {};
			var params = {};
			// enable javascript interface
			flashvars.externalinterface="1";
			params.quality = "high";
			params.bgcolor = "";
			params.allowscriptaccess = "sameDomain";
			params.allowfullscreen = "true";
			var attributes = {};
			attributes.id = "flashpano";
			attributes.name = "flashpano";
			attributes.align = "middle";
			if (startNode.length>0) {
				flashvars.startnode=startNode;
			}
	
			params.base=".";
			params.wmode = "transparent";
			pano=new pano2vrPlayer("container",{ useFlash:true, flashPlayerId: 'flashpano', flashContainerId:'flashcontainer'});
			swfobject.embedSWF("pano2vr_player.swf", "flashcontainer", "100%", "100%", "10.0.0", "", flashvars, params, attributes);
		}
			pano.startNode=startNode;
		// add the skin object
		skin=new pano2vrSkin(pano);
		// load the configuration
		window.addEventListener("load", function() {
			pano.readConfigUrlAsync("pano.xml",function() {  gyro=new pano2vrGyro(pano,"container");});
		});
		</script>
		<noscript>
			<p><b><?=$echo_data[$lang][2]?></b></p>
		</noscript>
<!-- - - - - - - 8<- - - - - - cut here - - - - - 8<- - - - - - - --> 
		<!-- Hack needed to hide the url bar on iOS 9, iPhone 5s --> 
		<div style="width:1px;height:1px;"></div>
	</body>
</html>

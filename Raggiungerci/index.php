<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include($root."/include/globals.php");
include_once(BU.'libs/foundation-menu-generator.class.php');
include_once(BU.'libs/foundation-orbit-generator.class.php');
include_once(BU.'data/menu_data.php');
include_once('images_data.php');
include_once('translate_data.php');
?>

<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Casa Olivastro</title>
  <link rel="stylesheet" href="/css/foundation.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="style.css">
  <script src="/js/vendor/custom.modernizr.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="row">
			<div class="large-12 columns">
				<?=$menuGenerator->html()?>
			</div>
		</div>
		<?=$orbitGenerator->html()?>
		<div class="row" id="content">
			<div class="large-12 colums">
				<div class="panel">
					<div class="row">
						<div class="large-12 columns">
							<h1><?=$title?></h1>
						</div>
					</div>
					<div class="row options">
						<div class="large-6 columns">
							<input type="text" value="Nuoro NU" id="start"/>
						</div>
						<div class="large-3 columns ios_radioboxes">
							<ul class="inline-list">
							<li><input type="radio" name="veicolo" value="BICYCLING"id="bici"/><label id="lab_bici" for="bici"></label></li>
							<li><input type="radio" name="veicolo" value="DRIVING"  id="auto" checked/><label id="lab_auto" for="auto"></label></li>
							<li><input type="radio" name="veicolo" value="TRANSIT"  id="bus"/><label id="lab_bus" for="bus"></label></li>
							</ul>
						</div>
						<div class="large-3 columns">
							<input type="button" onclick="calcRoute()" class="alert button radius"value="<?=$mostraPercorso?>"/>
						</div>
					</div>
					<div class="row options">
						<div class="large-12 columns">
							<div id="map_canvas"></div>
						</div>
					</div>
					<div class="row">
						<div class="large-12 columns">
							<ul id="directions" class="pricing-table">
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="push"></div>
		</div>
	</div>
	<div class="footer">
		<?=$footer?>
	</div>

  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? '/js/vendor/zepto' : '/js/vendor/jquery') +
  '.js><\/script>')
  </script>  
  <script src="/js/foundation.min.js"></script>  
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

  <script>
  	$(document).ready(function(){
			    $(document).foundation();  	
  	});
  </script>
  <script src="map.js.php"></script>
</body>
</html>
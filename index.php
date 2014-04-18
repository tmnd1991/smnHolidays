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
					<h1><?=$title?></h1>
					<?=$desc?>
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
  <script>
  	$(document).ready(function(){
			    $(document).foundation();  	
  	});
  </script>
</body>
</html>
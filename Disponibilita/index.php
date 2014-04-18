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
<body >
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
					<div class="row">
						<div class="large-12 columns">
							<form id="contactForm" onSubmit="return ValidateForm('contactForm');" >
								<div class="row">
									<div class="large-4 columns">
										<label for="nome"><?=$nome?></label><input class="validate.not-empty" type="text" name="nome" id="nome"/>								
									</div>
									<div class="large-4 columns">
										<label for="cognome"><?=$cognome?></label><input class="validate.not-empty" type="text" name="cognome" id="cognome"/>
									</div>
									<div class="large-4 columns">
										<label for="email"><?=$email?></label><input class="validate.email" type="text" name="email" id="email"/>
									</div>
								</div>
								<div class="row">
									<div class="large-4 columns">
										<label for="telefono"><?=$telefono?></label><input class="validate.phonenumber"  type="text" name="telefono" id="telefono"/>
									</div>
									<div class="large-4 columns">
										<label for="data_arrivo"><?=$data_arrivo?></label><input type="text" class="my_date_picker validate.not-empty" name="data_arrivo" id="data_arrivo"/>
									</div>
									<div class="large-4 columns">
										<label for="data_partenza"><?=$data_partenza?></label><input type="text" class="my_date_picker validate.not-empty" name="data_partenza" id="data_partenza"/>
									</div>
								</div>
								<div class="row">
									<div class="large-12 columns last">
										<input type="submit" class="button radius success" value="<?=$invia?>"/>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div id="calendar"></div>	
					</div>
				</div>
			</div>
			<div class="push"></div>
		</div>
	</div>
	<div class="footer">
		<?=$footer?>
	</div>
  <script src="/js/vendor/jquery"></script>
  <script src="/js/date-picker/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="/js/date-picker/jquery.ui.datepicker-fr.js"></script>
  <script src="/js/date-picker/jquery.ui.datepicker-it.js"></script>
  <link href="/js/date-picker/jquery-ui-1.10.3.custom.min.css" rel="stylesheet"/>
  <script src="/js/foundation.min.js"></script>
  <script src="/js/fullcalendar/fullcalendar.min.js"></script>
  <link href="/js/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
  <script src="calendar.js.php"></script>
  <script>
  	$(document).ready(function(){
			    $(document).foundation();
  	});
  </script>
  <style>
  	td.fc-header-right, td.fc-header-left, td.fc-header-center
  	{
	  	padding-top:10px;
  	}
  	form .last
  	{
	  	text-align:right;
  	}
  </style>
</body>
</html>
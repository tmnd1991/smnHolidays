<?php
$elements = array();
$subelements = array();
$languages = array();

$subelements[] = new MenuElement('Veranda','/Veranda');
$subelements[] = new MenuElement('Montebianco','/Montebianco');
$elements[] = new MenuElement('The Apartments','',$subelements);
$elements[] = new MenuElement('Visit Us','/Raggiungerci');
$elements[] = new MenuElement('Avaiability','/Disponibilita');
$languages[] = new MenuImageElement('/img/flags/it.png','/changeLanguage.php?ln='.ITA);
$languages[] = new MenuImageElement('/img/flags/uk.png','/changeLanguage.php?ln='.ENG);
$menuGenerator = new MenuGenerator('Casa Olivastro','/',$elements,$languages);

switch ($language)
{
	case ITA;
		$elements = array();
		$subelements = array();
		$subelements[] = new MenuElement('Veranda','/Veranda');
		$subelements[] = new MenuElement('Montebianco','/Montebianco');
		$elements[] = new MenuElement('Gli Appartamenti','',$subelements);
		$elements[] = new MenuElement('Come Raggiungerci','/Raggiungerci');
		$elements[] = new MenuElement('Disponibilità','/Disponibilita');
		$menuGenerator = new MenuGenerator('Casa Olivastro','/',$elements,$languages);
		break;
}

?>
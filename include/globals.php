<?php
define('BU',$root."/");
define('ITA','it');
define('ENG','en');
$language = "";
session_start();
if (isset($_SESSION) && isset($_SESSION['language']))
{
	$language = $_SESSION['language'];
}
else
	$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

switch($language)
{
	case ITA:
		$footer = htmlspecialchars("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");		
		break;
	default:
		$footer = htmlspecialchars("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
		break;
}

?>
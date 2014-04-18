<?php
if (isset($_GET['ln']))
{
	if (!isset($_SESSION))
		session_start();
	$_SESSION['language'] = $_GET['ln'];
}
header('location: /');
?>
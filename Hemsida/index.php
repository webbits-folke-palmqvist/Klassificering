<?php
$page = @$_GET['page'];
switch ($page) {
	case '':
		$show_page = "home";
		$title = "Hem";
		break;
	case 'Hem':
		$show_page = "home";
		$title = "Hem";
		break;
	case 'Om-oss':
		$show_page = "about";
		$title = "Om oss";
		break;
	case 'Logga-in':
		$show_page = "login";
		$title = "Logga in";
		break;
	default:
		$show_page = "404";
		$title = "404";
		break;
}

include('assets/pages/'.$show_page.'.php');
?>
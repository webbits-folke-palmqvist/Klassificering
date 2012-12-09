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
	case 'Registrera':
		$show_page = "register";
		$title = "Registrera dig";
		break;
	case 'Dokument':
		$show_page = "document";
		$title = "Lägg till ett dokument";
		break;
	case 'Process':
		$show_page = "process";
		$title = "Process";
		break;
	case 'Lyckat':
		$show_page = "success";
		$title = "Lyckat";
		break;
	case 'Kategori':
		$show_page = "category";
		$title = "Kategori";
		break;
	case 'Admin':
		$show_page = "admin";
		$title = "Admin";
		break;
	default:
		$show_page = "404";
		$title = "404";
		break;
}

include('assets/pages/'.$show_page.'.php');
?>
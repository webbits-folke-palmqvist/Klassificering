<?php
ob_start();
session_start();
include('assets/database.php');
include('assets/functions.php');

if(@$_GET['page'] != "Sidan-nere"){
	SiteDown();
}
?>
<html>
	<head>
		<title>Klassificering · <?php echo $title; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href='assets/css/bootstrap.css' rel='stylesheet' type='text/css'>
		<link href='assets/css/stylesheet.css' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="assets/js/bootstrap-carousel.js"></script>
        <script src="assets/js/bootstrap-collapse.js"></script>
        <script src="assets/js/bootstrap-dropdown.js"></script>
	</head>
	<body>
		<div class="container">
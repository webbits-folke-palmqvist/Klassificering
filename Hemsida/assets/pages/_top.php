<?php
ob_start();
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/kunder/OnlineNote/Hemsida/assets/functions.php');
?>
<html>
	<head>
		<title>Online Note · <?php echo $title; ?></title>
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
<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/kunder/OnlineNote/Hemsida/assets/database.php');

function error() {
	echo '<p class="text-error">'.$_SESSION['error'].'</p>';
	unset_error();
}

function set_error($error) {
	$_SESSION['error'] = $error;
}

function unset_error() {
	unset($_SESSION['error']);
}

function success() {
	echo '<p class="text-success">'.$_SESSION['success'].'</p>';
	unset_error();
}

function set_success($success) {
	$_SESSION['success'] = $success;
}

function unset_success() {
	unset($_SESSION['success']);
}

function login(){
	if(!$_SESSION['user']) {
		header('location: ?page=Logga-in');
	}
}

function rank(){
	$session = $_SESSION['user'];

	$sql = "SELECT rank FROM users WHERE username = '$session'";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);

	return $row[0];
}

function count_rows($table) {
	$result = mysql_query("SELECT * FROM ".$table);
	$num_rows = mysql_num_rows($result);

	echo $num_rows;
}

function user_id($username){
	$result = mysql_query("SELECT id FROM users WHERE username = '$username' LIMIT 1");
	$row = mysql_fetch_row($result);

	return $row[0];
}

function secure($unsafe){
	$safe = mysql_real_escape_string($unsafe);
	return $safe;
}
?>
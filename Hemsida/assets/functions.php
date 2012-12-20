<?php
@session_start();
include('assets/database.php');

function error() {
	echo '<p class="text-error">'.@$_SESSION['error'].'</p>';
	unset_error();
}

function set_error($error) {
	$_SESSION['error'] = $error;
}

function unset_error() {
	unset($_SESSION['error']);
}

function success() {
	echo '<p class="text-success">'.@$_SESSION['success'].'</p>';
	unset_success();
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
	$result = mysql_query("SELECT * FROM ".$table." WHERE deleted = '0'");
	$num_rows = mysql_num_rows($result);

	if($num_rows < 1){
		echo "0";
	} else {
		echo $num_rows;
	}
}

function count_rows_return($table) {
	$result = mysql_query("SELECT * FROM ".$table." WHERE deleted = '0'");
	$num_rows = mysql_num_rows($result);

	if($num_rows < 1){
		return 0;
	} else {
		return $num_rows;
	}
}

function count_rows_user($table, $user_id) {
	$result = mysql_query("SELECT * FROM ".$table." WHERE user_id = '$user_id' AND deleted = '0'");
	$num_rows = mysql_num_rows($result);

	if($num_rows < 1){
		echo "0";
	} else {
		echo $num_rows;
	}
}

function user_id($username){
	$result = mysql_query("SELECT id FROM users WHERE username = '$username' LIMIT 1");
	$row = mysql_fetch_row($result);

	return $row[0];
}

function secure($unsafe){
	$unsafe = stripslashes($unsafe);
	$safe = mysql_real_escape_string($unsafe);
	return $safe;
}

function cat_name($id) {
	$result = mysql_query("SELECT name FROM category WHERE id = '$id' LIMIT 1");
	$row = mysql_fetch_row($result);

	return $row[0];
}

function my_cat($cat_id){
	$user_id = user_id($_SESSION['user']);

	$result = mysql_query("SELECT * FROM category WHERE deleted = '0' AND user_id = '$user_id' AND id = '$cat_id' LIMIT 1");
	$num_rows = mysql_num_rows($result);

	if($num_rows == 0){
		header('location: ?page=Hem');
	}
}

function my_doc($doc_id){
	$user_id = user_id($_SESSION['user']);

	$result = mysql_query("SELECT * FROM document WHERE deleted = '0' AND user_id = '$user_id' AND id = '$doc_id' LIMIT 1");
	$num_rows = mysql_num_rows($result);

	if($num_rows == 0){
		header('location: ?page=Hem');
	}
}

function random_code(){
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
	$length = 32;

	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}
?>
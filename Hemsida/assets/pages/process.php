<?php
require($_SERVER['DOCUMENT_ROOT'].'/kunder/OnlineNote/Hemsida/assets/functions.php');
require($_SERVER['DOCUMENT_ROOT'].'/kunder/OnlineNote/Hemsida/assets/database.php');

session_start();

$action = mysql_real_escape_string($_GET['action']);

if($action == "login"){
	$user = mysql_real_escape_string($_POST['username']);
	$pass = mysql_real_escape_string($_POST['password']);

	$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);

	if($count == 1){
		$_SESSION['user'] = $user;
		header('location: ?page=Hem');
	} else {
		echo "Ingen match";
	}
}

if($action == "logout"){
	session_destroy();
	header('location: ?page=Logga-in');
}

if($action == "register"){
	
}
?>
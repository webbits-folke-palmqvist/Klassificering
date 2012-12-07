<?php
require($_SERVER['DOCUMENT_ROOT'].'/OnlineNote/Hemsida/assets/functions.php');
require($_SERVER['DOCUMENT_ROOT'].'/OnlineNote/Hemsida/assets/database.php');

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
		set_error("* Fel användarnamn eller lösenord.");
		header('location: ?page=Logga-in');
	}
}

if($action == "logout"){
	session_destroy();
	header('location: ?page=Logga-in');
}

if($action == "register"){
	$user = mysql_real_escape_string($_POST['username']);
	$pass = mysql_real_escape_string($_POST['password']);
	$pass2 = mysql_real_escape_string($_POST['password2']);

	if(!$pass OR !$pass2 OR !$user){
		set_error("* Fyll i alla fälten.");
		header('location: ?page=Registrera');
	} else {
		if($pass == $pass2){
			$sql = "SELECT * FROM users WHERE username = '$user'";
			$result = mysql_query($sql);
			$count = mysql_num_rows($result);

			if($count == 1){
				set_error("* Användarnamn används redan.");
				header('location: ?page=Registrera');	
			} else {
				$sql = "INSERT INTO users(username, password, rank)VALUES('$user', '$pass', '1')";
				$add = mysql_query($sql);

				if($add){
					set_success("Grattis, du är nu registrerad!");
					header('location: ?page=Lyckat');
				}
			}
		} else {
			set_error("* Lösenorden måste matcha.");
			header('location: ?page=Registrera');
		}
	}
}
?>
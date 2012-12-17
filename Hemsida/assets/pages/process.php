<?php
require($_SERVER['DOCUMENT_ROOT'].'/OnlineNote/Hemsida/assets/functions.php');
require($_SERVER['DOCUMENT_ROOT'].'/OnlineNote/Hemsida/assets/database.php');

session_start();

$action = secure($_GET['action']);

if($action == "login"){
	$user = secure($_POST['username']);
	$pass = secure($_POST['password']);

	$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);

	if($count == 1){
		$_SESSION['user'] = strtolower($user);
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
	$user = secure($_POST['username']);
	$pass = secure($_POST['password']);
	$pass2 = secure($_POST['password2']);

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

if($action == "document"){
	$do = secure($_GET['do']);
	$cat_id = secure($_POST['cat_id']);

	if($do == "add"){
		if(empty($_POST['title']) OR empty($_POST['content'])){
			set_error("* Du måste fylla i alla fälten.");
			header('location: ?page=Dokument&action=add&cat_id='.$cat_id);
		} else {

			$user = $_SESSION['user'];

			$user_id = user_id($user);
			$cat_id = secure($_GET['cat_id']);
			$title = secure($_POST['title']);
			$content = secure($_POST['content']);

			$sql = "INSERT INTO document(category_id, user_id, title, content)VALUES('$cat_id', '$user_id', '$title', '$content')";
			$add = mysql_query($sql);

			if($add){
				set_success("* Ditt dokument har laggts in i databasen.");
				header('location: ?page=Kategori&action=view&cat_id='.$cat_id);
			}
		}
	}

	if($do == "delete"){
		$id = secure($_GET['id']);
		$cat_id = secure($_GET['cat_id']);

		if(!$id OR !$cat_id){
			header('location: ?page=Hem');
		} else {
			$sql = "UPDATE document SET deleted = '1' WHERE id = '$id'";
			mysql_query($sql) or die("SQL: $sql ".mysql_error());

			header('location: ?page=Kategori&action=view&cat_id='.$cat_id);
		}
	}

	if($do == "edit"){
		$id = secure($_GET['id']);
		$cat_id = secure($_GET['cat_id']);
		$title = secure($_POST['title']);
		$content = secure($_POST['content']);
		$user_id = user_id(secure($_SESSION['user']));

		if(!$id OR !$cat_id OR !$title OR !$content){
			header('location: ?page=Hem');
		} else {
			$sql = "UPDATE document SET title = '$title', content = '$content' WHERE id = '$id' AND category_id = '$cat_id' AND user_id = '$user_id'";
			mysql_query($sql) or die(mysql_error());

			header('location: ?page=Dokument&action=edit&id='.$id.'&cat_id='.$cat_id);
		}
	}
}

if($action == "category"){
	$do = secure($_GET['do']);
	if($do == "add"){
		if(empty($_POST['title'])){
			set_error("* Du måste fylla i alla fälten.");
			header('location: ?page=Kategori&action=add');
		} else {
			$user = $_SESSION['user'];

			$user_id = user_id($user);
			$title = secure($_POST['title']);


			$sql = "INSERT INTO category(user_id, name, deleted)VALUES('$user_id', '$title', '0')";
			$add = mysql_query($sql);

			if($add){
				set_success("* Din kategori har laggts in i databasen.");
				header('location: ?page=Hem');
			}
		}
	}

	if($do == "delete"){
		$cat_id = secure($_GET['cat_id']);

		if(!$cat_id){
			header('location: ?page=Hem');
		} else {
			$sql = "UPDATE category SET deleted = '1' WHERE id = '$cat_id' LIMIT 1";
			mysql_query($sql) or die("SQL: $sql ".mysql_error());

			header('location: ?page=Hem');
		}
	}
}
?>
<?php
session_start();

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

function login(){
	if(!$_SESSION['user']) {
		header('location: ?page=Logga-in');
	}
}
?>
<?php
session_start();

function error() {
	echo "error";
}

function login(){
	if(!$_SESSION['user']) {
		header('location: ?page=Logga-in');
	}
}
?>
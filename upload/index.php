<?php
	// Primal Fusion openSite v0.2.2
	// Created by Ryan "veran" Strug

	error_reporting('2037');

	$auth = $_GET['auth'];
	$action = $_GET['action'];

	include('src/variables.php');

	if ( $action == 'comments' | $action == 'register' | $action == 'profile' | $action == 'download' ) {
		include('src/content.php');
		exit;
	} elseif ( isset($_COOKIE['username']) & isset($_COOKIE['password']) & $auth != 'required' ) {
		include('src/engine.php');
		exit;
	}

	include('src/authenticate.php');
?>
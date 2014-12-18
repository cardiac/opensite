<?php
	include('variables.php');
	include('functions.php');
	include('drivers/'.$db_driver.'.php');

	if ( isset($_COOKIE['username']) & isset($_COOKIE['password']) ) {

		db_connect();

		$id = db_secure($_COOKIE['id']);
		$username = db_secure($_COOKIE['username']);
		$password = db_secure($_COOKIE['password']);
		$rights = db_secure($_COOKIE['rights']);
		$active = db_secure($_COOKIE['active']);

		$db_result = db_query("SELECT * FROM content_users WHERE id = '$id' AND username = '$username' AND password = '$password' AND rights = '$rights' AND active = '$active'");
		$db_num = db_num_rows($db_result);

		db_close();

		if ( $db_num != 1 ) {
			header("Location: $site_contenturl/index.php?auth=required");
		}
	}
?>
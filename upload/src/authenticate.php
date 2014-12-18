<?php
	error_reporting('2037');

	$auth = false;
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ( isset($username) & isset($password) ) {

		include('variables.php');
		include('functions.php');
		include('drivers/'.$db_driver.'.php');

		db_connect();

		$username = db_secure($username);
		$password = md5(db_secure($password));

		$db_result = db_query("SELECT * FROM content_users WHERE username = '$username' AND password = '$password'"); 
		$db_num = db_num_rows($db_result);
		$db_result = db_fetch_array($db_result);

		if ( $db_result['active'] == '0' ) {
			header('Location: ../index.php?auth=inactive');
			exit;
		}

		if ( $db_num != 0 ) {
			$auth = true;
		}
	
	} else {
		include('login.php');
		exit;
	}

	if ( !$auth ) {
		header('Location: ../index.php?auth=false');
		exit;
	}

	setcookie('id', $db_result['id'], time() + 31526000, "/");
	setcookie('username', $username, time() + 31526000, "/");
	setcookie('password', $password, time() + 31526000, "/");
	setcookie('email', $db_result['email'], time() + 31526000, "/");
	setcookie('im', $db_result['im'], time() + 31526000, "/");
	setcookie('title', $db_result['title'], time() + 31526000, "/");
	setcookie('avatar', $db_result['avatar'], time() + 31526000, "/");
	setcookie('sex', $db_result['sex'], time() + 31526000, "/");
	setcookie('site', $db_result['site'], time() + 31526000, "/");
	setcookie('siteurl', $db_result['siteurl'], time() + 31526000, "/");
	setcookie('posts', $db_result['posts'], time() + 31526000, "/");
	setcookie('comments', $db_result['comments'], time() + 31526000, "/");
	setcookie('team', $db_result['team'], time() + 31526000, "/");
	setcookie('skin', $db_result['skin'], time() + 31526000, "/");
	setcookie('rights', $db_result['rights'], time() + 31526000, "/");
	setcookie('active', $db_result['active'], time() + 31526000, "/");

	header('Location: ../index.php');
?>
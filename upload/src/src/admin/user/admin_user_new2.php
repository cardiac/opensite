<?php
	// creates a new user using the results from the previous form

	if ( !$_POST['username'] | !$_POST['password'] | !$_POST['password2'] | !$_POST['email'] | !$_POST['title'] | !$_POST['sex'] | !$_POST['team'] | !$_POST['skin'] | !$_POST['rights'] | !$_POST['active'] ) {
		error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	$avatar_size = getimagesize($avatar);

	if ( $avatar_size['0'] > $avatar_width | $avatar_size['1'] > $avatar_height ) {
		error('The avatar has an invalid size. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	if ( $_COOKIE['rights'] == 2 ) {
		$rights = 1;
	}

	if ( $_POST['password'] != $_POST['password2'] ) {
		error('The passwords do not match. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	if ( !preg_match('/^[^@\s<&>]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $_POST['email']) ) {
		error('Invalid e-mail address. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	db_connect();

	$username = db_secure($_POST['username']);
	$password = md5(db_secure($_POST['password']));
	$email = db_secure($_POST['email']);
	$im = db_secure($_POST['im']);
	$title = db_secure($_POST['title']);
	$avatar = db_secure($_POST['avatar']);
	$sex = db_secure($_POST['sex']);
	$site = db_secure($_POST['site']);
	$siteurl = db_secure($_POST['siteurl']);
	$team = db_secure($_POST['team']);
	$user_skin = db_secure($_POST['skin']);
	$rights = db_secure($_POST['rights']);
	$active = db_secure($_POST['active']);

	$db_result = db_query("SELECT * FROM content_users WHERE username='$username'");
	$db_num = db_num_rows($db_result);

	if ( $db_num != 0 ) {
		error('Sorry, the requested username is already taken, please select another one. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	db_query("INSERT INTO content_users (username,password,email,im,title,avatar,sex,site,siteurl,team,skin,rights,active) VALUES ('$username','$password','$email','$im','$title','$avatar','$sex','$site','$siteurl','$team','$user_skin','$rights','$active')");

	db_close();
?>
  User added successfully. He may now login. Click <a href="index.php?action=user" title="Users">here</a> to return.
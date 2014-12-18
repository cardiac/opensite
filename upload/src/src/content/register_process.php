<?php
	// processes the information from the registration form

	session_start();
	header('Cache-control: private');

	if ( $_POST['secure'] != $_SESSION['rand'] ) {
		error('The text displayed on the image and the text that you inputted do not match. Click <a href="javascript:history.back()" title="Back">here</a> to return and try again.');
	}

	if ( !$_POST['username'] | !$_POST['password'] | !$_POST['password2'] | !$_POST['email'] | !$_POST['title'] ) {
		error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);
	$password2 = strip_tags($_POST['password2']);
	$email = strip_tags($_POST['email']);
	$im = strip_tags($_POST['im']);
	$title = strip_tags($_POST['title']);
	$avatar = strip_tags($_POST['avatar']);
	$sex = $_POST['sex'];
	$site = strip_tags($_POST['site']);
	$siteurl = strip_tags($_POST['siteurl']);

	$avatar_size = getimagesize($avatar);

	if ( $avatar_size['0'] > $avatar_width | $avatar_size['1'] > $avatar_height ) {
		error('Your avatar has an invalid size. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	if ( !get_magic_quotes_gpc() ) {
		$username = addslashes($username);
	}

	if ( $password != $password2 ) {
		error('The passwords do not match. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	if ( !preg_match('/^[^@\s<&>]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $email) ) {
		error('Invalid e-mail address. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	db_connect();

	$db_result = db_query("SELECT username FROM content_users WHERE username = '$username'");
	$db_num = db_num_rows($db_result);

	if ( $db_num != 0 ) {
		error('Sorry, the requested username is already taken, please select another one. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	$password = md5($password);

	if ( !get_magic_quotes_gpc() ) {
		$email = addslashes($email);
		$im = addslashes($im);
		$title = addslashes($title);
		$avatar = addslashes($avatar);
		$site = addslashes($site);
		$siteurl = addslashes($siteurl);
	}

	db_query("INSERT INTO content_users (username,password,email,im,title,avatar,sex,site,siteurl,team,rights,active) VALUES ('$username','$password','$email','$im','$title','$avatar','$sex','$site','$siteurl','Standard Users','1','1')");

	db_close();
?>
  The new user was added successfully. You may now login. Click <a href="index.php?action=user">here</a> to return.
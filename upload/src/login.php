<?php
	error_reporting('2039');
        $auth = $_GET['auth'];

	if ( $auth == 'false' ) {
		$message = 'Wrong Login Credentials';
	} elseif ( $auth == 'required' ) {
		$message = 'Authorization Required';
	} elseif ( $auth == 'logout' ) {
		$message = 'Logout Successful';
	} elseif ( $auth == 'inactive' ) {
		$message = 'Account Disabled';
	} elseif ( $auth == 'modify' ) {
		$message = 'User Modified Successfully';
	}

	$login = implode('', file("src/layout/skins/$skin/login.php"));
	$login = str_replace('{title}', $title, $login);
	$login = str_replace('{form_start}', '<form name="login" action="src/authenticate.php" method="post">', $login);
	$login = str_replace('{form_end}', '</form>', $login);
	$login = str_replace('{message}', $message, $login);

	echo $login;
?>
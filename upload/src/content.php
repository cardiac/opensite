<?php
	include('functions.php');
	include('drivers/'.$db_driver.'.php');

	$action = $_GET['action'];
	$comments = $_GET['comments'];
	$register = $_GET['register'];
	$id = $_GET['id'];
	$newsid = $_GET['newsid'];

	error_reporting('2037');

	if ( $action == 'comments') {
		include('src/layout/header.php');

		if ( $comments == 'post' ) {
			include('src/content/comments_post.php');
		} else {
			include('src/content/comments.php');
		}

		include('src/layout/footer.php');
	} elseif ( $action == 'register' & $registration == 1 ) {
		include('src/layout/header.php');

		if ( $register == 'process' ) {
			include('src/content/register_process.php');
		} else {
			include('src/content/register.php');
		}

		include('src/layout/footer.php');
	} elseif ( $action == 'profile' ) {
		include('src/layout/header.php');

		include('src/content/profile.php');

		include('src/layout/footer.php');
	} elseif ( $action == 'download' ) {
		include('src/layout/header.php');

		include('src/content/download.php');

		include('src/layout/footer.php');
	}
?>
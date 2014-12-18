<?php
	// modifies a user using the results from the previous form

	db_connect();

	$id = db_secure($id);

	$db_result = db_query("SELECT * FROM content_users WHERE id = '$id'");
	$db_result = db_fetch_array($db_result);

	if ( $_COOKIE['rights'] == 2 & $id != $_COOKIE['id'] & ( $db_result['rights'] == 2 | $db_result['rights'] == 3 ) ) {
		error('Moderators do not have the rights to modify other moderators or administrators. Click <a href="index.php?action=user">here</a> to return.');
	} elseif ( $id == 1 & $_COOKIE['id'] != 1 ) {
		error('You do not have permission to modify the admin account.');
	}

	if ( !$_POST['email'] | !$_POST['title'] | !$_POST['sex'] | !$_POST['team'] | !$_POST['skin'] | !$_POST['rights'] | !isset($_POST['active']) ) {
		error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	if ( $_COOKIE['rights'] == 2 & $_COOKIE['id'] == $id ) {
		$rights = 2;
	} elseif ( $_COOKIE['rights'] == 2 ) {
		$rights = 1;
	}

	if ( $id == 1 ) {
		$rights = 3;
		$active = 1;
	}

	if ( $handle = fopen("$avatar", 'r') ) {
		$avatar_size = getimagesize($avatar);

		if ( $avatar_size['0'] > $avatar_width | $avatar_size['1'] > $avatar_height ) {
			error('The avatar has an invalid size. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
		}

		fclose("$handle");
	}

	if ( $_POST['password'] != '' & $_POST['password2'] != '' ) {
		if ( $_POST['password'] != $_POST['password2'] ) {
			error('The passwords did not match. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
		}

		$password = md5(db_secure($_POST['password']));

		db_query("UPDATE content_users SET password='$password' WHERE id=$id");
	}

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

	db_query("UPDATE content_users SET email='$email',im='$im',title='$title',avatar='$avatar',sex='$sex',site='$site',siteurl='$siteurl',team='$team',skin='$user_skin',rights='$rights',active='$active' WHERE id=$id");

	if ( $_COOKIE['id'] == $id ) {
		logout();

		$db_result = db_query("SELECT * FROM content_users WHERE id = '$id'"); 
		$db_num = db_num_rows($db_result);
		$db_result = db_fetch_array($db_result);

		login();
	}

	db_close();
?>
  User account modified successfully. Click <a href="index.php?action=user" title="Users">here</a> to return.
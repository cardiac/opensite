<?php
	// carries out the action of the profile form

	db_connect();

	if (!$_POST['email'] | !$_POST['title']) {
		error('You did not fill in a required field. Click <a href="index.php?action=profile">here</a> to return.');
	}

	$email = strip_tags($_POST['email']);
	$im = strip_tags($_POST['im']);
	$title = strip_tags($_POST['title']);
	$avatar = strip_tags($_POST['avatar']);
	$sex = strip_tags($_POST['sex']);
	$site = strip_tags($_POST['site']);
	$siteurl = strip_tags($_POST['siteurl']);
	$user_skin = strip_tags($_POST['skin']);

	$avatar_size = getimagesize($avatar);

	if ( $avatar_size['0'] > $avatar_width | $avatar_size['1'] > $avatar_height ) {
		error('The avatar has an invalid size. Click <a href="index.php?action=profile">here</a> to return.');
	}

	if ( $_POST['password'] != '' && $_POST['password2'] != '' ) {
		if ( $_POST['password'] != $_POST['password2'] ) {
			error('The passwords do not match. Click <a href="index.php?action=profile">here</a> to return.');
		}

		$password = strip_tags($_POST['password']);
		$password = md5($_POST['password']);
		db_query("UPDATE content_users SET password='$password' WHERE id=$id");
	}

	db_query("UPDATE content_users SET email='$email',im='$im',title='$title',avatar='$avatar',sex='$sex',site='$site',siteurl='$siteurl',skin='$user_skin' WHERE id=$id");

	db_close();
?>
  <font class="type2">Logging you out in order to save your settings...</font><br>
  <meta http-equiv="refresh" content="0; url=<?php echo $site_contenturl; ?>/src/logout.php">
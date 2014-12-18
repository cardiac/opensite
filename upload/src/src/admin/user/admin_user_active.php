<?php
	// disables/enables a user from the user's previous state

	db_connect();

	$id = db_secure($id);

	$db_result = db_query("SELECT * FROM content_users WHERE id=$id");
	$db_result = db_fetch_array($db_result);

	if ( $id == $_COOKIE['id'] ) {
		error('You may not disable your own account. Click <a href="index.php?action=user">here</a> to return.');
	} elseif ( $id == 1 ) {
		error('You may not disable the administrator account. Click <a href="index.php?action=user">here</a> to return.');
	} elseif ( $_COOKIE['rights'] == 2 & ( $db_result['rights'] == 2 | $db_result['rights'] == 3 ) ) {
		error('Moderators do not have the rights to disable or enable other moderators or administrators. Click <a href="index.php?action=user">here</a> to return.');
	}

	if ( $db_result['active'] == 1 ) {
		$active = 0;
	} else {
		$active = 1;
	}

	db_query("UPDATE content_users SET active='$active' WHERE id=$id");

	db_close();
?>
  User has successfully been <?php if ( $active == 1 ) { ?>enabled<?php } else { ?>disabled<?php } ?>. Click <a href="index.php?action=user">here</a> to return.
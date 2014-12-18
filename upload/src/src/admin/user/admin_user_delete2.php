<?php
	// deletes the user account specified

	db_connect();

	$id = db_secure($id);

	$db_result = db_query("SELECT * FROM content_users WHERE id=$id");
	$db_result = db_fetch_array($db_result);

	if ( $id == 1 ) {
		error('You may not delete the administrator account. Click <a href="index.php?action=user" title="Back">here</a> to return.');
	} elseif ( $id == $_COOKIE['id'] ) {
		error('You may not delete your own account. If you wish to delete yourself, contact another administrator. Click <a href="index.php?action=user" title="Back">here</a> to return.');
	} elseif ( $_COOKIE['rights'] == 2 & ( $db_result['rights'] == 2 | $db_result['rights'] == 3 ) ) {
		error('Moderators do not have the rights to delete other moderators or administrators. Click <a href="index.php?action=user" title="Back">here</a> to return.');
	} else {
		db_query("DELETE FROM content_users WHERE id=$id");

		db_close();
	}
?>
  Account successfully deleted. Click <a href="index.php?action=user" title="Users">here</a> to return.
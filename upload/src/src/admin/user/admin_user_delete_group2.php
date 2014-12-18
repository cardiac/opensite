<?php
	// deletes the specified news category

	if ( $_COOKIE['rights'] == 2 ) {
		error('Moderators do not have the rights needed to create or delete user groups.');
	}

	db_connect();

	$id = db_secure($id);

	db_query("DELETE FROM content_categories WHERE id=$id");

	db_close();
?>
  The user group was successfully deleted. Click <a href="index.php?action=user&amp;user=groups" title="Groups">here</a> to return.
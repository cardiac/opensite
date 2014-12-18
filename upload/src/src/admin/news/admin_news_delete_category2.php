<?php
	// deletes the specified news category

	if ( $_COOKIE['rights'] == 2 ) {
		error('Moderators do not have the rights needed to create or delete categories.');
	}

	db_connect();

	$id = db_secure($id);

	db_query("DELETE FROM content_categories WHERE id=$id");

	db_close();
?>
  The category was successfully deleted. Click <a href="index.php?action=news&amp;news=categories" title="Categories">here</a> to return.
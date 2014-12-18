<?php
	// adds a user type group to the database

	if ( !$_POST['group'] ) {
		error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	db_connect();

	$group = db_secure($_POST['group']);

	db_query("INSERT INTO content_categories (category,type) VALUES ('$group','u')");
	db_close();
?>
  Your user group has been sucessfully added. Click <a href="index.php?action=user&amp;user=groups" title="Groups">here</a> to return.
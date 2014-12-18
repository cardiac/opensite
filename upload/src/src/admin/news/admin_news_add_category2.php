<?php
	// adds a news type category to the database

	if ( !$_POST['category'] ) {
		error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	db_connect();

	$category = db_secure($_POST['category']);
	
	db_query("INSERT INTO content_categories (category,type) VALUES ('$category','n')");
	db_close();
?>
  Your category has been sucessfully added. Click <a href="index.php?action=news&amp;news=categories" title="Categories">here</a> to return.
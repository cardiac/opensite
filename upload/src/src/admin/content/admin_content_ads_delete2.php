<?php
	// deletes the advertisement that was selected

	db_connect();
	$id = db_secure($id);
	db_query("DELETE FROM content_ads WHERE id=$id");
	db_close();
?>
  The advertisement was successfully deleted. Click <a href="index.php?action=content&content=ads">here</a> to return.
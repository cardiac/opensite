<?php
	// actually deletes the content page selected

	db_connect();
	db_secure($id);
	db_query("DELETE FROM content_main WHERE id=$id");
	db_close();
?>
  The page of content has been successfully deleted. Click <a href="index.php?action=content&content=content" title="Content">here</a> to return.
<?php
	// deletes the news post that was selected

	db_connect();

	$id = db_secure($id);

	$db_result = db_query("SELECT * FROM content_news WHERE id = '$id'");
	$db_result = db_fetch_array($db_result);

	$author = $db_result['author'];

	if ( $_COOKIE['rights'] == 2 & $db_result['author'] != $_COOKIE['username'] ) {
		error('Moderators do not have the rights to modify other moderators\' and administrators\' posts. Click <a href="index.php?action=news">here</a> to return.');
	}

	db_query("DELETE FROM content_news WHERE id=$id");

	db_close();
?>
  The news post was successfully deleted. Click <a href="index.php?action=news" title="News">here</a> to return.
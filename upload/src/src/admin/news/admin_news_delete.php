<?php
	// displays a warning message to prevent accidental deletion of a news post

	db_connect();

	$id = db_secure($id);

	$db_result = db_query("SELECT * FROM content_news WHERE id = '$id'");
	$db_result = db_fetch_array($db_result);

	db_close();

	if ( $_COOKIE['rights'] == 2 & $db_result['author'] != $_COOKIE['username'] ) {
		error('Moderators do not have the rights to delete other moderators\' and administrators\' posts. Click <a href="index.php?action=news">here</a> to return.');
	}
?>
  Are you sure that you want to delete this news post?<br>
  &nbsp;&nbsp;<a href="index.php?action=news&amp;news=delete2&amp;id=<?php echo $id; ?>" title="Yes">- Yes</a><br />
  &nbsp;&nbsp;<a href="index.php?action=news" title="No">- No</a>
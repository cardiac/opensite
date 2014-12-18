<?php
	// deletes the comment that was selected

	db_connect();

	$id = db_secure($id);

	$db_result = db_query("SELECT * FROM content_comments WHERE id = '$id'");
	$db_result = db_fetch_array($db_result);

	$author = $db_result['author'];

	$db_result = db_query("SELECT * FROM content_users WHERE username = '$author'");
	$db_num = db_num_rows($db_result);
	$db_result = db_fetch_array($db_result);

	if ( $db_num != 0 ) {

		if ( $_COOKIE['rights'] == 2 & $db_result['rights'] != 1 & $db_result['username'] != $_COOKIE['username'] ) {
			db_close();
			error('Moderators do not have the rights to delete other moderators\' and administrators\' comments. Click <a href="index.php?action=news&amp;news=comments&amp;id=$newsid" title="Back">here</a> to return.');
		}

	}

	db_query("DELETE FROM content_comments WHERE id=$id");

	db_close();
?>
  The comment was successfully deleted. Click <a href="index.php?action=news&amp;news=comments&amp;id=<?php echo $newsid; ?>" title="Comments">here</a> to return.
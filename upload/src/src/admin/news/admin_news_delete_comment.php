<?php
	// displays a warning before deleting the comment

	db_connect();

	$db_result = db_query("SELECT * FROM content_comments WHERE id = '$id'");
	$db_result = db_fetch_array($db_result);

	$author = $db_result['author'];

	db_query("SELECT * FROM content_users WHERE username = '$author'");
	$db_num = db_num_rows($db_result);
	$db_result = db_fetch_array($db_result);

	db_close();

	if ( $db_num != 0 ) {

		if ( $_COOKIE['rights'] == 2 & $db_result['rights'] != 1 & $db_result['username'] != $_COOKIE['username'] ) {
			error('Moderators do not have the rights to delete other moderators\' and administrators\' comments. Click <a href="index.php?action=news&amp;news=comments&amp;id=$newsid" title="Back">here</a> to return.');
		}

	}
?>
  Are you sure that you want to delete this comment?<br />
  &nbsp;&nbsp;<a href="index.php?action=news&news=delete_comment2&newsid=<?php echo $newsid; ?>&id=<?php echo $id; ?>" title="Yes">- Yes</a><br />
  &nbsp;&nbsp;<a href="index.php?action=news&news=comments&id=<?php echo $newsid; ?>" title="No">- No</a>
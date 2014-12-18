<?php
	// modifies the comment using the information from the previous form

	db_connect();

	$username = $_COOKIE['username'];

	$db_result = db_query("SELECT * FROM content_users WHERE username = '$username'");
	$db_result = db_fetch_array($db_result);

	$author = $db_result['author'];

	$db_test = db_query("SELECT * FROM content_users WHERE username = '$author'");
	$db_num = db_num_rows($db_test);
	$db_test = db_fetch_array($db_test);

	if ( $db_num == 0 ) {
		$rights = 1;
	} else {
		$rights = $db_test['rights'];
	}

	if ( $_COOKIE['rights'] == 2 & $rights != 1 ) {
		error('Moderators do not have the rights to modify other moderators\' and administrators\' posts. Click <a href="index.php?action=news">here</a> to return.');
	}

	if ( !$_POST['author'] & $_COOKIE['rights'] == 3 ) {
		error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	if ( !$_POST['title'] | !$_POST['content'] ) {
		error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	if ( $news_comments_html == 1 ) {
		$title = db_secure($_POST['title']);
		$content = db_secure($_POST['content']);
	} else {
		$title = db_secure(strip_tags($_POST['title']));
		$content = db_secure(strip_tags($_POST['content']));
	}

	if ( $_COOKIE['rights'] == 3 ) {
		$author = db_secure($_POST['author']);
		db_query("UPDATE content_comments SET author='$author',title='$title',content='$content' WHERE id=$id");
	} else {
		db_query("UPDATE content_comments SET title='$title',content='$content' WHERE id=$id");
	}

	db_close();
?>
  Comment modified successfully. Click <a href="index.php?action=news&amp;news=comments&amp;id=<?php echo $newsid; ?>" title="Comments">here</a> to return.
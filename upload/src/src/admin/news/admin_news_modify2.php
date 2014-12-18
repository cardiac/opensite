<?php
	// modifies the news post with the information from the previous form

	db_connect();

	$username = $_COOKIE['username'];

	$db_result = db_query("SELECT * FROM content_users WHERE username = '$username'");
	$db_result = db_fetch_array($db_result);

	if ( $_COOKIE['rights'] == 2 & $db_result['username'] != $_COOKIE['username'] ) {
		error('Moderators do not have the rights to modify other moderators\' and administrators\' posts. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	if ( !$_POST['author'] & $_COOKIE['rights'] == 3 ) {
		error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	if ( !$_POST['title'] | !$_POST['category'] | !$_POST['content'] ) {
		error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	if ( $news_html == 1 ) {
		$title = db_secure($_POST['title']);
		$content = db_secure($_POST['content']);
	} else {
		$title = db_secure(strip_tags($_POST['title']));
		$content = db_secure(strip_tags($_POST['content']));
	}

	$category = db_secure($_POST['category']);

	if ( $_COOKIE['rights'] == 3 ) {
		$author = db_secure($_POST['author']);
		db_query("UPDATE content_news SET author='$author',title='$title',category='$category',content='$content' WHERE id=$id");
	} else {
		db_query("UPDATE content_news SET title='$title',category='$category',content='$content' WHERE id=$id");
	}

	db_close();
?>
  News post modified successfully. Click <a href="index.php?action=news" title="News">here</a> to return.
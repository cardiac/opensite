<?php
	// creates a news post using the information from the previous form

	db_connect();

	if (!$_POST['title'] | !$_POST['category'] | !$_POST['content']) {
		error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	if ( $news_html == 1 ) {
		$title = db_secure($_POST['title']);
		$content = db_secure($_POST['content']);
	} else {
		$title = db_secure(strip_tags($_POST['title']));
		$content = db_secure(strip_tags($_POST['content']));
	}

	$date = time();
	$author = $_COOKIE['username'];
	$category = db_secure(strip_tags($_POST['category']));

	db_query("INSERT INTO content_news (category,title,date,author,content) VALUES ('$category','$title','$date','$author','$content')");

	$db_result = db_query("SELECT * FROM content_users WHERE username = '$author'");
	$db_result = db_fetch_array($db_result);

	$posts = $db_result['posts'] + 1;

	db_query("UPDATE content_users SET posts='$posts' WHERE username='$author'");

	db_close();
?>
  Your news has been sucessfully posted. Click <a href="index.php?action=news" title="News">here</a> to return.
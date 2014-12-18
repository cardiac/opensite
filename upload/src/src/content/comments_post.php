<?php
	// carries out the action from the comment form on the previous page

	db_connect();

	$id = db_secure($id);

	if ( $_COOKIE['username'] ) {
		include('secure.php');
		$author = $_COOKIE['username'];
		$password = $_COOKIE['password'];
	} else {
		$author = db_secure($_POST['author']);
		$member = 0;
	}

	$db_result = db_query("SELECT * FROM content_users WHERE username = '$author'");
	$db_num = db_num_rows($db_result);
	$db_result = db_fetch_array($db_result);

	if ( $db_num != 0 ) {
		if ( !$_COOKIE['password'] ) {
			$password = md5($_POST['password']);
		}

		if ( $password != $db_result['password'] ) {
			error('This is a registered user and requires a password. Either no password was entered or the one given was incorrect. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
		}

		if ( $db_result['active'] == 0 ) {
			error('This account has been disabled and is unable to post. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
		}

		$member = 1;
		$comments = $db_result['comments'] + 1;
	}

	if ( !$_POST['title'] | !$_POST['content'] | !$author ) {
		error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Back">here</a> to return."');
	}

	if ( $news_html == 1 ) {
		$title = db_secure($_POST['title']);
		$content = db_secure($_POST['content']);
	} else {
		$title = db_secure(strip_tags($_POST['title']));
		$content = db_secure(strip_tags($_POST['content']));
	}

	$date = time();

	db_query("INSERT INTO content_comments (newsid,author,title,date,member,content) VALUES ('$id','$author','$title','$date','$member','$content')");

	if ( $member == 1 ) {
		db_query("UPDATE content_users SET comments='$comments' WHERE username = '$author'");
	}

	db_close();
?>
  <?php echo $author; ?>, your comment was posted successfully. Click <a href="javascript:history.back()" title="Back">here</a> to return.
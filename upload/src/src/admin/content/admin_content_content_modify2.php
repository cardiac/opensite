<?php
	// saves the results of the content modify form

	if ( !$_POST['title'] | !$_POST['page'] | !$_POST['content'] ) {
		error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	db_connect();

	$title = db_secure($_POST['title']);
	$cat = db_secure($_POST['cat']);
	$sub = db_secure($_POST['sub']);
	$page = db_secure($_POST['page']);
	$content = db_secure($_POST['content']);

	$db_result = db_query("SELECT * FROM content_main WHERE cat = '$cat' AND sub = '$sub' AND page = '$page' AND id != '$id'");

	$db_result = db_fetch_array($db_result);

	if ( $db_result != '' ) {
		error('That page already exists. Click <a href="javascript:history.back()">here</a> to return.');
	}

	db_query("UPDATE content_main SET title='$title',cat='$cat',sub='$sub',page='$page',content='$content' WHERE id=$id");

	db_close();
?>
  Content page modified successfully. Click <a href="index.php?action=content&amp;content=content" title="Content">here</a> to return.
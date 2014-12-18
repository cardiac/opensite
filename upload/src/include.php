<?php
	session_start();
	header('Cache-control: private');

	include('variables.php');
	include('functions.php');
	include('drivers/'.$db_driver.'.php');

	error_reporting('2037');

	$session = session_id();

	if ( file_exists("$site_contentfolder/src/tmp/$session.php") ) {
		unlink("$site_contentfolder/src/tmp/$session.php");
	}

	if ( isset($_GET['layout']) ) {
		$_SESSION['layout'] = $_GET['layout'];
	}

	$action = $_GET['action'];
	$layout = $_SESSION['layout'];
	$news = $_GET['news'];
	$cat = $_GET['cat'];
	$sub = $_GET['sub'];
	$page = $_GET['page'];

	if ( empty($layout) ) {
		$layout = 'default';
	}

	$var = $layout;

	if ( file_exists("$site_contentfolder/src/data/layouts/$layout/$layout.php") ) {
		$layout = implode('', file("$site_contentfolder/src/data/layouts/$layout/$layout.php"));
	} else {
		$layout = implode('', file("$site_contentfolder/src/data/layouts/default/default.php"));
	}

	// content | start

	db_connect();

	if ( !$page ) {
		$content = implode('', file("$site_contentfolder/src/data/layouts/$var/main.php"));
	} else {
		if ( $page & $cat & $sub ) {
			$db_result = db_query("SELECT * FROM content_main WHERE page = '$page' AND cat = '$cat' AND sub = '$sub'");
		} elseif ( $page & $cat ) {
			$db_result = db_query("SELECT * FROM content_main WHERE page = '$page' AND cat = '$cat'");
		} elseif ( $page ) {
			$db_result = db_query("SELECT * FROM content_main WHERE page = '$page'");
		}

		$db_result = db_fetch_array($db_result);

		if ( $db_result == '' ) {
			$content = implode('', file("$site_contentfolder/src/data/layouts/$var/404.php"));
			$title = '404';
		} else {
			$title = $db_result['title'];
			$content = $db_result['content'];
		}
	}

	$layout = str_replace('{style}', '<link rel="stylesheet" type="text/css" href="'.$site_contentfolder.'/src/data/layouts/stylesheets/', $layout);
	$layout = str_replace('{/style}', '.css" />', $layout);
	$layout = str_replace('{content}', $content, $layout);

	// temporary fix
	include("$site_contentfolder/src/tmp/user.php");
	$layout = str_replace('{user}', $user, $layout);
	// temporary fix

	// content | news

	$news = explode('{cat}', $layout);

	if ( count($news) == 3 ) {
		$layout = $news[0].$news[2];
		$test = 1;
	}

	if ( strpos($layout, '{news}') !== false ) {
		if ( $news_display == 2 ) {
			include('include/news_day.php');
		} else {
			include('include/news.php');
		}
	}

	// content | ads

	if ( strpos($layout, '{advertisement}') !== false ) {
		include('include/ads.php');
	}

	// content | close

	$layout = str_replace('{title}', $title, $layout);

	db_close();

	// content | display

	$layout = stripslashes($layout);

	$handle = fopen("$site_contentfolder/src/tmp/$session.php", 'x');

	if ( fwrite($handle, $layout) === false ) {
		unlink("$site_contentfolder/src/tmp/$session.php");
	}	

	fclose($handle);

	include("$site_contentfolder/src/tmp/$session.php");

	unlink("$site_contentfolder/src/tmp/$session.php");
?>
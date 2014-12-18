<?php
	if ( $test == 1 ) {
		$news = explode(', ', $news[1]);
		$count = 0;
		$max = count($news) - 1;

		while ( $count < $max ) {
			$db_query = $db_query.'category = \''.$news["$count"].'\' OR ';
			$count++;
		}

		$db_query = $db_query.'category = \''.$news["$count"].'\'';

		$db_result_news = db_query("SELECT * FROM content_news WHERE $db_query ORDER BY date desc LIMIT $news_posts");
	} else {
		$db_result_news = db_query("SELECT * FROM content_news ORDER BY date desc LIMIT $news_posts");
	}

	$test = false;

	include("$site_contentfolder/src/data/layouts/$var/news_day_settings.php");

	while ( $db_row = db_fetch_array($db_result_news) ) {
		$date = date($date_format, $db_row['date']);
		$time = date($time_format, $db_row['date']);
		$id = $db_row['id'];
		$category = stripslashes($db_row['category']);
		$author = stripslashes($db_row['author']);
		$subject = stripslashes($db_row['title']);
		$content = stripslashes($db_row['content']);

		$db_result_users = db_query("SELECT * FROM content_users WHERE username = '$author'");
		$db_user = db_fetch_array($db_result_users);
		$user_id = stripslashes($db_user['id']);
		$avatar = stripslashes($db_user['avatar']);
		$email = stripslashes($db_user['email']);
		$title = stripslashes($db_user['title']);

		$db_result_comments = db_query("SELECT * FROM content_comments WHERE newsid = '$id'");
		$noc = db_num_rows($db_result_comments);

		if ( $date != $prev_date ) {
			$news_header = implode('', file("$site_contentfolder/src/data/layouts/$var/news_day_header.php"));
			$news_header = str_replace('{date}', $date, $news_header);
			$final_content = $final_content.$news_header;
		}

		$prev_date = $date;

		format_news();

		$news = implode('', file("$site_contentfolder/src/data/layouts/$var/news_day.php"));
		$news = str_replace('{avatar}', "<a href=\"$site_contentfolder/index.php?action=profile&amp;id=$user_id\" title=\"$author\"><img src=\"$avatar\" class=\"avatar\" border=\"0\" title=\"$author\" alt=\"$author\" /></a>", $news);
		$news = str_replace('{subject}', $subject, $news);
		$news = str_replace('{time}', $time, $news);
		$news = str_replace('{author}', "<a href=\"$site_contentfolder/index.php?action=profile&amp;id=$user_id\" title=\"$author\">$author</a>", $news);
		$news = str_replace('{content}', $content, $news);
		$news = str_replace('{comments}', '<a href="'.$site_contenturl.'/index.php?action=comments&amp;id='.$id.'" title="'.$subject.' Comments">', $news);
		$news = str_replace('{/comments}', '</a>', $news);
		$news = str_replace('{noc}', $noc, $news);
		$news = str_replace('{title}', $title, $news);
		$news = str_replace('{category}', $category, $news);

		$final_content = $final_content.$news;

		$db_row++;
		$test = true;
	}

	if ( $db_row == false and $test == false ) {
		$final_content = '&nbsp;&nbsp;&nbsp;There were no posts found in the database.';
	}

	$title = 'Site News';

	$layout = str_replace('{news}', $final_content, $layout);
?>
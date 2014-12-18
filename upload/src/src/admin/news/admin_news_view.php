<?php
	// displays all of the news in the database
?>
  <strong><img src="src/images/icons/news.gif" alt="&nbsp;" title="News" /> View News</strong><br />
  <table border="0" width="100%">
  <tr>
    <td>
<?php
	db_connect();

	$db_result_news = db_query('SELECT * FROM content_news ORDER BY date desc');
	$test = false;

	while ( $db_row = db_fetch_array($db_result_news) ) {
		$id = $db_row['id'];
		$date = date($date_format, $db_row['date']);
		$author = stripslashes($db_row['author']);
		$db_result_users = db_query("SELECT * FROM content_users WHERE username = '$author'");
		$db_user = db_fetch_array($db_result_users);
		$avatar = stripslashes($db_user['avatar']);
		$email = stripslashes($db_user['email']);
		$title = stripslashes($db_row['title']);
		$content = stripslashes($db_row['content']);

		format_news();
?>
      <table border="0" width="500" cellpadding="4" cellspacing="0" class="news">
      <tr>
        <td valign="bottom" align="left" class="news_header" width="50">
          <img src="<?php echo $avatar; ?>" border="0" alt="<?php echo $author; ?>" title="<?php echo $author; ?>" />
        </td>
        <td class="news_header" valign="bottom" width="350">
          <strong>subject:</strong> <span class="type2"><?php echo $title; ?></span><br /><strong>date:</strong> <?php echo $date; ?><br /><strong>posted by:</strong> <a href="mailto:<?php echo $email; ?>" title="<?php echo $author; ?>"><?php echo $author; ?></a>
        </td>
        <td valign="bottom" align="right" class="news_header" width="100">
          <a href="index.php?action=news&amp;news=modify&amp;id=<?php echo $id; ?>" title="Modify"><img src="src/images/icons/content_modify.gif" border="0" alt="Modify News" title="Modify News" /></a><a href="index.php?action=news&news=comments&id=<?php echo $id; ?>" title="Comments"><img src="src/images/icons/news_comments.gif" border="0" alt="View Comments" title="Modify News" /></a><a href="index.php?action=news&news=delete&id=<?php echo $id; ?>" title="Delete"><img src="src/images/icons/content_delete.gif" border="0" alt="Delete News" title="Modify News" /></a>
        </td>
      </tr>
      <tr>
        <td class="news_content" width="100%" colspan="3">
          <?php echo $content; ?><br /><br />
        </td>
      </tr>
      </table>
      <p />
<?php
		$db_row++;
		$test = true;
	}

	if ( $db_row == false and $test == false ) {
		echo '&nbsp;&nbsp;&nbsp;There were no posts found in the database.';
	}

	db_close();
?>
    </td>
  </tr>
  </table>
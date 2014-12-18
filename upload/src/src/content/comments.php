<?php
	// displays the comments for one news post and a form for posting new comments

	db_connect();

	$id = db_secure($id);

	$db_result = db_query("SELECT * FROM content_news WHERE id='$id'");
	$db_row = db_fetch_array($db_result);

	$newsid = $db_row['id'];
	$date = date($date_format, $db_row['date']);
	$author = stripslashes($db_row['author']);
	$db_result_users = db_query("SELECT * FROM content_users WHERE username = '$author'");
	$db_user = db_fetch_array($db_result_users);
	$user_id = $db_user['id'];
	$avatar = stripslashes($db_user['avatar']);
	$email = stripslashes($db_user['email']);
	$title = stripslashes($db_row['title']);
	$content = stripslashes($db_row['content']);

	format_news();
?>
  <strong><img src="src/images/icons/news.gif" title="News"> Viewing Comments for <span class="type2"><?php if ( $title == '' ) { ?>absolutely nothing<?php } else { echo $title; } ?></span></strong><br />
  <table border="0" width="100%">
  <tr>
    <td>
      <table border="0" width="500" cellpadding="4" cellspacing="0" class="news">
      <tr>
        <td valign="bottom" align="left" class="news_header" width="50">
          <a href="index.php?action=profile&amp;id=<?php echo $user_id; ?>" title="<?php echo $author; ?>"><img src="<?php echo $avatar; ?>" border="0" title="<?php echo $author; ?>" alt="<?php echo $author; ?>"></a>
        </td>
        <td class="news_header" valign="bottom" width="450">
          <strong>subject:</strong> <span class="type2"><?php echo $title; ?></span><br /><strong>date:</strong> <?php echo $date; ?><br /><strong>posted by:</strong> <a href="index.php?action=profile&amp;id=<?php echo $user_id; ?>" title="<?php echo $author; ?>"><?php echo $author; ?></a>
        </td>
      </tr>
      <tr>
        <td class="news_content" width="100%" colspan="3">
          <?php echo $content; ?>
        </td>
      </tr>
      </table>
    </td>
  </tr>
  </table>
  <strong><span class="type2">Comments</span></strong>
  <table border="0" width="100%">
  <tr>
    <td>
<?php
	$db_result_comments = db_query("SELECT * FROM content_comments WHERE newsid='$id' ORDER BY date desc");

	$test = false;

	while ( $db_row = db_fetch_array($db_result_comments) ) {
		$id = $db_row['id'];
		$date = date($date_format, $db_row['date']);
		$author = stripslashes($db_row['author']);
		$title = stripslashes($db_row['title']);
		$content = stripslashes($db_row['content']);

		if ( $db_row['member'] == 1 ) {
			$db_result_users = db_query("SELECT * FROM content_users WHERE username = '$author'");
			$db_user = db_fetch_array($db_result_users);
			$user_id = $db_user['id'];
			$avatar = stripslashes($db_user['avatar']);
			$email = stripslashes($db_user['email']);
		} else {
			$avatar = $guest_avatar;
			$user_id = 0;
		}

		format_comments();
?>
      <table border="0" width="500" cellpadding="4" cellspacing="0" class="news">
      <tr>
        <td valign="bottom" align="left" class="news_header" width="50">
          <a href="index.php?action=profile&amp;id=<?php echo $user_id; ?>" title="<?php echo $author; ?>"><img src="<?php echo $avatar; ?>" border="0" title="<?php echo $author; ?>" alt="<?php echo $author; ?>"></a>
        </td>
        <td class="news_header" valign="bottom" width="350">
          <strong>subject:</strong> <span class="type2"><?php echo $title; ?></span><br /><strong>date:</strong> <?php echo $date; ?><br /><strong>posted by:</strong> <a href="index.php?action=profile&amp;id=<?php echo $user_id; ?>" title="<?php echo $author; ?>"><?php echo $author; ?></a>
        </td>
<?php
	if ( $_COOKIE['rights'] == 2 | $_COOKIE['rights'] == 3 ) {
?>
        <td valign="bottom" align="right" class="news_header" width="50">
          <a href="index.php?action=news&amp;news=modify_comment&amp;newsid=<?php echo $newsid; ?>&amp;id=<?php echo $id; ?>" title="<?php echo $id; ?>"><img src="src/images/icons/content_modify.gif" border="0" alt="Modify Comment" title="Modify Comment" /></a><a href="index.php?action=news&amp;news=delete_comment&amp;newsid=<?php echo $newsid; ?>&amp;id=<?php echo $id; ?>" title="Delete"><img src="src/images/icons/content_delete.gif" border="0" alt="Delete Comment" title="Delete Comment" /></a>
        </td>
<?php
	} else {
?>
	<td valign="bottom" align="right" class="news_header" width="50">
	</td>
<?php
	}
?>
      </tr>
      <tr>
        <td class="news_content" width="100%" colspan="2">
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
		echo 'There are no comments for this news post.<br /><br />';
	}

	db_close();
?>
    </td>
  </tr>
  </table>
  <strong><span class="type2">Post a Comment</span></strong><br />
  <form method="post" action="index.php?action=comments&comments=post&id=<?php echo $newsid; ?>">
    <table border="0" width="400">
    <tr><td colspan="2">Post a comment to this news post here. The password field is only required if the author specified is an official user.</td></tr>
<?php
	if ( $_COOKIE['username'] ) {
		include('secure.php');
?>
  <tr><td width="100">author</td><td><span class="type2"><?php echo $_COOKIE['username']; ?></span></td></tr>
<?php
	} else {
?>
    <tr><td width="100">author</td><td><input type="text" name="author" size="30" maxlength="25"></td></tr>
    <tr><td>password</td><td><input type="password" name="password" size="30" maxlength="25"></td></tr>
<?php
	}
?>
    <tr><td>subject</td><td><input type="text" name="title" size="30" maxlength="25"></td></tr>
    <tr><td>comment</td><td><textarea name="content" rows="15" cols="80" maxlength="65536"></textarea></td></tr>
    <tr><td colspan="2"><input type="submit" name="Post" value="Post" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Reset" value="Reset" class="button" style="width: 100px;"></td></tr>
    </table>
  </form>
  <strong><span class="type2">Formatting System</span></strong><br />
  &nbsp;&nbsp;[b]<em>text</em>[/b] - boldens text<br />
  &nbsp;&nbsp;[u]<em>text</em>[/u] - underlines text<br />
  &nbsp;&nbsp;[i]<em>text</em>[/i] - italicizes text<br />
  &nbsp;&nbsp;[h<em>#</em>]<em>text</em>[/h<em>#</em>] - places your text in a header, possible sizes are 1 - 6<br />
  &nbsp;&nbsp;[center]<em>text</em>[/center] - centers text<br />
  &nbsp;&nbsp;[span color="<em>color</em>" size="<em>size</em>" align="<em>alignment</em>"]<em>text</em>[/span] - your text is formatted using the html span tag<br />
  &nbsp;&nbsp;[br] - creates a new line<br />
  &nbsp;&nbsp;[p]<em>paragraph</em>[/p] - use to format paragraphs (usually not needed)<br />
  &nbsp;&nbsp;[link href="<em>web address</em>" title="<em>link title</em>"]<em>address name</em>[/link] - creates a link to another page, type the full link out and remember to title it (follows xhtml specifications)<br />
  &nbsp;&nbsp;[img]<em>image link</em>[/img] - displays an image, please use the full address<br />
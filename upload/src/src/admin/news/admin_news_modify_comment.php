<?php
	// displays a form to modify a comment

	db_connect();

	$id = db_secure($id);

	$db_result = db_query("SELECT * FROM content_comments WHERE id = '$id'");
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
		error('Moderators do not have the rights to modify other moderators\' and administrators\' posts. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	db_close();

	$title = stripslashes($db_result['title']);
	$content = stripslashes($db_result['content']);

	format_content();
?>
  <strong><img src="src/images/icons/news.gif" alt="&nbsp;" title="News" /> Modify Comment</strong><br />
  <form method="post" action="index.php?action=news&amp;news=modify_comment2&amp;newsid=<?php echo $newsid; ?>&amp;id=<?php echo $id; ?>">
    <table border="0" width="400">
    <tr><td width="100">author</td><td><?php if ( $_COOKIE['rights'] == 3 ) { ?><input type="text" name="author" size="30" maxlength="25" value="<?php echo $db_result['author']; ?>"><?php } else { ?><font class="type2"><?php echo $db_result['author']; ?></font><?php } ?></td></tr>
    <tr><td>subject</td><td><input type="text" name="title" size="30" maxlength="25" value="<?php echo $title; ?>"></td></tr>
    <tr><td>content</td><td><textarea name="content" rows="15" cols="80" maxlength="65536"><?php echo $content; ?></textarea></td></tr>
    <tr><td colspan="2"><input type="submit" name="Modify" value="Modify" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Reset" value="Reset" class="button" style="width: 100px;"></td></tr>
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
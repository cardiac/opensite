<?php
	// displays a form for creating a news post

	$id = $_COOKIE['id'];

	db_connect();

	$db_result = db_query("SELECT * FROM content_users WHERE id = '$id'");
	$db_result = db_fetch_array( $db_result );

	$db_result_cat = db_query("SELECT * FROM content_categories WHERE type= 'n' ORDER BY category ASC");

	db_close();
?>
  <strong><img src="src/images/icons/news.gif" alt="&nbsp;" title="News" /> Add New Post</strong><br />
  <form method="post" action="index.php?action=news&amp;news=post2">
    <table border="0" width="400">
    <tr><td width="100">user</td><td><span class="type2"><?php echo $db_result['username']; ?></span></td></tr>
    <tr><td>subject</td><td><input type="text" name="title" size="30" maxlength="40"></td></tr>
    <tr><td>category</td><td><select name="category"><?php if ( db_num_rows( $db_result_cat ) == 0 ) { echo '<option value="General">General</option>'; } else { while ( $db_row = db_fetch_array($db_result_cat) ) { echo '<option value="'.$db_row['category'].'">'.$db_row['category'].'</option>'; $db_row++; } } ?></select></td></tr>
    <tr><td>content</td><td><textarea name="content" rows="15" cols="80" maxlength="65536"></textarea></td></tr>
    <tr><td colspan="2"><input type="submit" name="Post" value="Post" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Clear" value="Clear" class="button" style="width: 100px;"></td></tr>
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
<?php
	// serves as the main hub for the news system
?>
  <strong><img src="src/images/icons/news.gif" alt="&nbsp;" title="News" /> News System</strong><br />
  <a href="index.php?action=news&news=post" title="Add New Post">Add New Post</a><?php if ( $_COOKIE['rights'] == 3 ) { ?> | <a href="index.php?action=news&news=view" title="View News">View News</a> | <a href="index.php?action=news&news=layout" title="News Layout">News Layout</a> | <a href="index.php?action=news&news=categories" title="Manage Categories">Manage Categories</a><?php } ?><p>
<?php
	db_connect();

	$db_result = db_query("SELECT * FROM content_news ORDER BY date DESC");

	if ( db_num_rows($db_result) == 0 ) {
		echo '<span class="type2">&nbsp;&nbsp;&nbsp;There were no posts found in the database.</span>';
	} else {
?>
  <table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20">&nbsp;</td><td width="275"><font class="type2">news</font></td><td width="125"><font class="type2">category<font></td><td width="110"><font class="type2">author</font></td><td width="50" align="center"><font class="type2">modify</font></td><td width="50" align="center"><font class="type2">comments</font></td><td width="50" align="center"><font class="type2">delete</font></td>
  </tr>
<?php
		while ( $db_row = db_fetch_array($db_result) ) {
			$date = date($date_format, $db_row['date']);
?>
  <tr>
    <td width="20" height="20">
      <img src="src/images/icons/content_page.gif" alt="News Post" title="News Post" />
    </td>
    <td>
      <a href="index.php?action=news&news=modify&id=<?php echo $db_row['id']; ?>"><?php echo $db_row['title']; ?></a>
    </td>
    <td>
      <?php echo $db_row['category']; ?>
    </td>
    <td>
      <?php echo $db_row['author']; ?>
    </td>
    <td align="center">
      <a href="index.php?action=news&news=modify&id=<?php echo $db_row['id']; ?>"><img src="src/images/icons/content_modify.gif" border="0" alt="Modify News" title="Modify News" /></a>
    </td>
    <td align="center">
      <a href="index.php?action=news&news=comments&id=<?php echo $db_row['id']; ?>"><img src="src/images/icons/news_comments.gif" border="0" alt="View Comments" title="View Comments" /></a>
    </td>
    <td align="center">
      <a href="index.php?action=news&news=delete&id=<?php echo $db_row['id']; ?>"><img src="src/images/icons/content_delete.gif" border="0" alt="Delete News" title="Delete News" /></a>
    </td>
  </tr>
<?php
			$db_row++;
		}

	db_close();
?>
  </table>
<?php
	}
?>
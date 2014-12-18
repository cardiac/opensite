<?php
	// lists all of the news categories

	if ( $_COOKIE['rights'] == 2 ) {
		error('Moderators do not have the rights needed to create or delete categories.');
	}
?>
  <strong><img src="src/images/icons/news.gif" alt="&nbsp;" title="News" /> Manage Categories</strong><br />
  <a href="index.php?action=news&amp;news=add_category" title="Add Category">Add Category</a><p />
<?php
	db_connect();

	$db_result = db_query("SELECT * FROM content_categories WHERE type = 'n' ORDER BY category ASC");

	if ( db_num_rows($db_result) == 0 ) {
		echo '<span class="type2">&nbsp;&nbsp;&nbsp;There were no categories found in the database.</span>';
	} else {
?>
  <table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20">&nbsp;</td><td width="160"><span class="type2">category</span></td><td width="50" align="center"><span class="type2">delete</span></td>
  </tr>
<?php
		while ( $db_row = db_fetch_array($db_result) ) {
			$date = date($date_format, $db_row['date']);
?>
  <tr>
    <td width="10" height="20">
      <img src="src/images/icons/content_page.gif" alt="&nbsp;" title="Content Page" />
    </td>
    <td>
      <?php echo $db_row['category']; ?>
    </td>
    <td align="center">
      <a href="index.php?action=news&amp;news=delete_category&amp;id=<?php echo $db_row['id']; ?>" title="Delete Category"><img src="src/images/icons/content_delete.gif" border="0" alt="Delete Category" title="Delete" /></a>
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
<?php
	// lists all of your content pages and serves as the content system's main hub
?>
  <strong><img src="src/images/icons/content.gif" alt="&nbsp;" title="Content" /> Content System</strong><br />
  <a href="index.php?action=content&amp;content=content_new" title="Add New Page">Add New Page</a><p />
<?php
	db_connect();

	$db_result = db_query("SELECT * FROM content_main ORDER BY cat ASC, sub ASC, page ASC");

	if ( db_num_rows($db_result) == 0 ) {
		echo '<span class="type2">&nbsp;&nbsp;&nbsp;There was no content found in the database.</span>';
	} else {
?>
  <table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20">&nbsp;</td><td width="125"><span class="type2">category</span></td><td width="125"><span class="type2">sub category</span></td><td width="120"><span class="type2">page</span></td><td width="240"><span class="type2">title</span></td><td width="50" align="center"><span class="type2">modify</span></td><td width="50" align="center"><span class="type2">delete</span></td>
  </tr>
<?php
		while ( $db_row = db_fetch_array($db_result) ) {
?>
  <tr>
    <td width="10" height="20">
      <img src="src/images/icons/content_page.gif" alt="Content Page" title="Content Page" />
    </td>
    <td>
      <?php echo stripslashes($db_row['cat']); ?>&nbsp;
    </td>
    <td>
      <?php echo stripslashes($db_row['sub']); ?>&nbsp;
    </td>
    <td>
      <?php echo stripslashes($db_row['page']); ?>&nbsp;
    </td>
    <td>
      <?php echo stripslashes($db_row['title']); ?>&nbsp;
    </td>
    <td align="center">
      <a href="index.php?action=content&amp;content=content_modify&amp;id=<?php echo $db_row['id']; ?>" title="Modify Page"><img src="src/images/icons/content_modify.gif" border="0" alt="Modify Page" title="Modify Page" /></a>
    </td>
    <td align="center">
      <a href="index.php?action=content&amp;content=content_delete&amp;id=<?php echo $db_row['id']; ?>" title="Delete Page"><img src="src/images/icons/content_delete.gif" border="0" alt="Delete Page" title="Delete Page" /></a>
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
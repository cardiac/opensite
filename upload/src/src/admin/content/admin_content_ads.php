<?php
	// displays all of the ads in the database with options
?>
  <strong><img src="src/images/icons/content.gif" alt="&nbsp;" title="Content" /> Advertisement Management</strong><br />
  <a href="index.php?action=content&amp;content=ads_new" title="New Advertisement">New Advertisment</a><p>
<?php
	db_connect();

	$db_result = db_query("SELECT * FROM content_ads ORDER BY hits, site DESC");

	if ( db_num_rows( $db_result ) == 0 ) {
		echo '<span class="type2">&nbsp;&nbsp;&nbsp;There were no advertisements found in the database.</span>';
	} else {
?>
  <table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20">&nbsp;</td><td width="140"><span class="type2">site</span></td><td width="150"><span class="type2">category</span></td><td width="175"><span class="type2">hits</span></td><td width="50" align="center"><span class="type2">modify</span></td><td width="50" align="center"><span class="type2">delete</span></td>
  </tr>
<?php
		while ( $db_row = db_fetch_array($db_result) ) {
			$date = date($date_format, $db_row['date']);
?>
  <tr>
    <td width="10" height="20">
      <img src="src/images/icons/content_page.gif" alt="&nbsp;" title="Advertisement" />
    </td>
    <td>
      <a href="index.php?action=content&amp;content=ads_view&amp;id=<?php echo $db_row['id']; ?>" title="Site"><?php echo $db_row['site']; ?></a>
    </td>
    <td>
      <?php echo $db_row['category']; ?>
    </td>
    <td>
      <?php echo $db_row['hits']; ?>
    </td>
    <td align="center">
      <a href="index.php?action=content&amp;content=ads_modify&amp;id=<?php echo $db_row['id']; ?>" title="Modify"><img src="src/images/icons/content_modify.gif" border="0" alt="Modify" title="Modify" /></a>
    </td>
    <td align="center">
      <a href="index.php?action=content&amp;content=ads_delete&amp;id=<?php echo $db_row['id']; ?>" title="Delete"><img src="src/images/icons/content_delete.gif" border="0" alt="Delete" title="Modify" /></a>
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
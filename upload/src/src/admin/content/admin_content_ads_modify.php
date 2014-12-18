<?php
	// a form for modifying advertisments

	db_connect();

	$db_result_cat = db_query("SELECT * FROM content_categories WHERE type = 'a'");

	$id = db_secure($id);

	$db_result = db_query("SELECT * FROM content_ads WHERE id = '$id'");
	$db_result = db_fetch_array($db_result);

	db_close();
?>
  <strong><img src="src/images/icons/news.gif" alt="&nbsp;" title="Advertisement" /> Modifying Advertisement "<span class="type2"><?php echo $db_result['site']; ?></span>"</strong><br />
  <form method="post" action="index.php?action=content&amp;content=ads_modify2&amp;id=<?php echo $id; ?>">
    <table border="0" width="400">
    <tr><td>site name</td><td><input type="text" name="site" size="30" maxlength="25" value="<?php echo $db_result['site']; ?>"></td></tr>
    <tr><td>category</td><td><select name="category"><?php if ( db_num_rows($db_result_cat) == 0 ) { echo '<option value="General">General</option>'; } else { while ( $db_row = db_fetch_array($db_result_cat) ) { echo '<option value="'.$db_row['category'].'">'.$db_row['category'].'</option>'; $db_row++; } } ?></select></td></tr>
    <tr><td>site url</td><td><input type="text" name="url" size="50" maxlength="100" value="<?php echo $db_result['url']; ?>"></td></tr>
    <tr><td>site image</td><td><input type="text" name="image" size="50" maxlength="150" value="<?php echo $db_result['image']; ?>"></td></tr>
    <tr><td>alternate text</td><td><input type="text" name="alt" size="30" maxlength="50" value="<?php echo $db_result['alt']; ?>"></td></tr>
    <tr><td colspan="2"><input type="submit" name="Modify" value="Modify" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Reset" value="Reset" class="button" style="width: 100px;"></td></tr>
    </table>
  </form>
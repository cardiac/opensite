<?php
	// the form for creating a new advertisement

	db_connect();
	$db_result_cat = db_query("SELECT * FROM content_categories WHERE type = 'a'");
	db_close();
?>
  <strong><img src="src/images/icons/news.gif" alt="&nbsp;" title="News" /> Add New Advertisement</strong><br />
  <form method="post" action="index.php?action=content&amp;content=ads_new2">
    <table border="0" width="400">
    <tr><td>site name</td><td><input type="text" name="site" size="30" maxlength="25"></td></tr>
    <tr><td>category</td><td><select name="category"><?php if ( db_num_rows( $db_result_cat ) == 0 ) { echo '<option value="General">General</option>'; } else { while ( $db_row = db_fetch_array($db_result_cat) ) { echo '<option value="'.$db_row['category'].'">'.$db_row['category'].'</option>'; $db_row++; } } ?></select></td></tr>
    <tr><td>site url</td><td><input type="text" name="url" size="50" maxlength="100"></td></tr>
    <tr><td>site image</td><td><input type="text" name="image" size="50" maxlength="150"></td></tr>
    <tr><td>alternate text</td><td><input type="text" name="alt" size="30" maxlength="50"></td></tr>
    <tr><td colspan="2"><input type="submit" name="Add" value="Add" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Clear" value="Clear" class="button" style="width: 100px;"></td></tr>
    </table>
  </form>
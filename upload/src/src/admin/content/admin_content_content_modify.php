<?php
	// modifies a content page

	db_connect();

	db_secure($id);

	$db_result = db_query("SELECT * FROM content_main WHERE id = '$id'");
	$db_result = db_fetch_array($db_result);

	db_close();

	$title = stripslashes($db_result['title']);
	$content = stripslashes($db_result['content']);
	format_content();
?>
  <strong><img src="src/images/icons/content.gif" alt="&nbsp;" title="Content" /> Modifying "<span class="type2"><?php echo $title; ?>"</span></strong><br />
  <form method="post" action="index.php?action=content&amp;content=content_modify2&amp;id=<?php echo $id; ?>">
    <table border="0" width="400">
    <tr><td>title</td><td><input type="text" name="title" size="30" maxlength="25" value="<?php echo $title; ?>"></td></tr>
    <tr><td>category</td><td><input type="text" name="cat" size="30" maxlength="25" value="<?php echo stripslashes($db_result['cat']); ?>"></td></tr>
    <tr><td>sub category</td><td><input type="text" name="sub" size="30" maxlength="25" value="<?php echo stripslashes($db_result['sub']); ?>"></td></tr>
    <tr><td>page</td><td><input type="text" name="page" size="30" maxlength="25" value="<?php echo stripslashes($db_result['page']); ?>"></td></tr>
    <tr><td>content</td><td><textarea name="content" rows="35" cols="130"><?php echo $content; ?></textarea></td></tr>
    <tr><td colspan="2"><input type="submit" name="Save" value="Save" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Reset" value="Reset" class="button" style="width: 100px;"></td></tr>
    </table>
  </form>
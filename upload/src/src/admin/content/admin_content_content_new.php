<?php
	// the form for adding new content pages
?>
  <strong><img src="src/images/icons/content.gif" alt="&nbsp;" title="Content" /> Add New Page</strong><br />
  <form method="post" action="index.php?action=content&amp;content=content_new2">
    <table border="0" width="400">
    <tr><td>title</td><td><input type="text" name="title" size="30" maxlength="25"></td></tr>
    <tr><td>category</td><td><input type="text" name="cat" size="30" maxlength="25"></td></tr>
    <tr><td>sub category</td><td><input type="text" name="sub" size="30" maxlength="25"></td></tr>
    <tr><td>page</td><td><input type="text" name="page" size="30" maxlength="25"></td></tr>
    <tr><td>content</td><td><textarea name="content" rows="35" cols="130"></textarea></td></tr>
    <tr><td colspan="2"><input type="submit" name="Save" value="Save" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Clear" value="Clear" class="button" style="width: 100px;"></td></tr>
    </table>
  </form>
<?php
	// displays a form to add a new news category
?>
  <strong><img src="src/images/icons/news.gif" alt="&nbsp;" title="News" /> Add New Category</strong>
  <form method="post" action="index.php?action=news&amp;news=add_category2">
    <table border="0" width="400">
    <tr><td>category name</td><td><input type="text" name="category" size="30" maxlength="25"></td></tr>
    <tr><td colspan="2"><input type="submit" name="Add" value="Add" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Clear" value="Clear" class="button" style="width: 100px;"></td></tr>
    </table>
  </form>
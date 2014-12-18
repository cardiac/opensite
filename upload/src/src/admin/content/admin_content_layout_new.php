<?php
	// displays a form to create a new site layout
?>
  <strong><img src="src/images/icons/content.gif" alt="&nbsp;" title="Content" /> New Layout</strong><br />
  <form method="post" action="index.php?action=content&amp;content=layout_new2">
    <table border="0" width="720">
    <tr><td>layout name</td><td><input type="text" name="layout_name" size="30" maxlength="25"></td></tr>
    <tr><td>layout code</td><td><textarea name="layout" class="layout" width="720" wrap="off"></textarea><br /></td></tr>
    <tr><td colspan="2"><input type="submit" name="Create" value="Create" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Clear" value="Clear" class="button" style="width: 100px;"></td></tr>
    </table>
  </form>
<?php
	// displays a form to add a new user group
?>
  <strong><img src="src/images/icons/user.gif" alt="&nbsp;" title="Users" /> Add New User Group</strong>
  <form method="post" action="index.php?action=user&amp;user=add_group2">
    <table border="0" width="400">
    <tr><td>group name</td><td><input type="text" name="group" size="30" maxlength="25"></td></tr>
    <tr><td colspan="2"><input type="submit" name="Add" value="Add" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Clear" value="Clear" class="button" style="width: 100px;"></td></tr>
    </table>
  </form>
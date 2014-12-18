<?php
	// form to add a new user
?>
  <strong><img src="src/images/icons/user.gif" alt="&nbsp;" title="Users" /> Add New User</strong>
<?php
	if ( $avatar_width == 'unlimited' or $avatar_width == '' or $avatar_width == '0' ) {
		$avatar_width = 'unlimited';
	}

	if ( $avatar_height == 'unlimited' or $avatar_height == '' or $avatar_height == '0' ) {
		$avatar_height = 'unlimited';
	}

	// automatic skin detection
	if ( $handle = opendir('src/layout/skins/') ) {
		$skin_list = "<option value=\"$default_skin\">$default_skin</option>";

		while ( false !== ($file = readdir($handle)) ) {
			if ( $file != '.' & $file != '..' & $file != 'index.html' ) {

				if ( $file != $default_skin ) {
					$skin_list = $skin_list."<option value=\"$file\">$file</option>";
				}
			}
		}

		closedir($handle);
	}
	
	db_connect();
	
	$db_result_cat = db_query("SELECT * FROM content_categories WHERE type= 'u' ORDER BY category ASC");
	
	db_close();
?>
  <form method="post" action="index.php?action=user&amp;user=new2">
    <table border="0" width="500">
    <tr><td>Username*</td><td><input type="text" name="username" size="25" maxlength="25"></td></tr>
    <tr><td>Password*</td><td><input type="password" name="password" size="25" maxlength="20"></td></tr>
    <tr><td>Confirm Password*</td><td><input type="password" name="password2" size="25" maxlength="20"></td></tr>
    <tr><td>E-Mail*</td><td><input type="text" name="email" size="25" maxlength="50"></td></tr>
    <tr><td>IM SN</td><td><input type="text" name="im" size="25" maxlength="25"></td></tr>
    <tr><td>Title*</td><td><input type="text" name="title" size="25" maxlength="25"></td></tr>
    <tr><td>Avatar</td><td><input type="text" name="avatar" size="25" maxlength="255">&nbsp;&nbsp;<font class="type2">max size - <?php echo $avatar_width; ?> x <?php echo $avatar_height; ?></font></td></tr>
    <tr><td>Gender*</td><td><select name="sex"><option value="M">male</option><option value="F">female</option></select></td></tr>
    <tr><td>Site</td><td><input type="text" name="site" size="25" maxlenght="25"></td></tr>
    <tr><td>Site Url</td><td><input type="text" name="siteurl" size="25" maxlenght="150"></td></tr>
    <tr><td>Group*</td><td><select name="team"><?php if ( db_num_rows( $db_result_cat ) == 0 ) { echo '<option value="Standard Users">Standard Users</option>'; } else { while ( $db_row = db_fetch_array($db_result_cat) ) { echo '<option value="'.$db_row['category'].'">'.$db_row['category'].'</option>'; $db_row++; } } ?></select></td></tr>
    <tr><td>Skin*</td><td><select name="skin"><?php echo $skin_list; ?></select></td></tr>
    <tr><td>Rights*</td><td><select name="rights"><option value="1">standard</option><?php if ( $_COOKIE['rights'] == 3 ) { ?><option value="2">moderator</option><option value="3">administrator</option><?php } ?></select></td></tr>
    <tr><td>Account Status*</td><td>Enabled: <input type="radio" name="active" value="1" checked><br />Disabled: <input type="radio" name="active" value="0"></td></tr>
    <tr><td colspan="2"><input type="submit" name="Add" value="Add" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Clear" value="Clear" class="button" style="width: 100px;"></td></tr>
    </table>
  </form>
  <span class="type2">Fields marked by an asterisk (*) are required.</span>
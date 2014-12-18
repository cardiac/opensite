<?php
	// form to modify a user

	if ( $avatar_width == 'unlimited' or $avatar_width == '' or $avatar_width === 0 ) {
		$avatar_width = 'unlimited';
	}

	if ( $avatar_height == 'unlimited' or $avatar_height == '' or $avatar_height === 0 ) {
		$avatar_height = 'unlimited';
	}

	db_connect();

	$id = db_secure($id);

	$db_result = db_query("SELECT * FROM content_users WHERE id = '$id'");
	$db_result = db_fetch_array($db_result);

	$default_skin = $db_result['skin'];

	if ( $_COOKIE['rights'] == 2 & $db_result['username'] != $_COOKIE['username'] & ( $db_result['rights'] == 2 | $db_result['rights'] == 3 ) ) {
		error('Moderators do not have the rights to modify other moderators or administrators. Click <a href="index.php?action=user">here</a> to return.');
	} elseif ( $id == 1 & $_COOKIE['id'] != 1 ) {
		error('You do not have permission to modify the admin account.');
	}

	$db_result_cat = db_query("SELECT * FROM content_categories WHERE type= 'u' ORDER BY category ASC");

	db_close();

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
?>
  <strong><img src="src/images/icons/user.gif" alt="&nbsp;" title="Users" /> Modifying User: <span class="type2"><?php echo $db_result['username']; ?></span></strong> <a href="index.php?action=profile&amp;id=<?php echo $id; ?>" title="View User">&raquo; view user</a>
  <form method="post" action="index.php?action=user&amp;user=modify2&amp;id=<?php echo $id; ?>">
    <table border="0" width="550">
    <tr><td>Password</td><td><input type="password" name="password" size="25" maxlength="20"></td></tr>
    <tr><td>Confirm Password</td><td><input type="password" name="password2" size="25" maxlength="20"></td></tr>
    <tr><td>E-Mail</td><td><input type="text" name="email" size="25" maxlength="50" value="<?php echo $db_result['email']; ?>"></td></tr>
    <tr><td>IM SN</td><td><input type="text" name="im" size="25" maxlength="25" value="<?php echo $db_result['im']; ?>"></td></tr>
    <tr><td>Title</td><td><input type="text" name="title" size="25" maxlength="25" value="<?php echo $db_result['title']; ?>"></td></tr>
    <tr><td>Avatar</td><td><input type="text" name="avatar" size="25" maxlength="255" value="<?php echo $db_result['avatar']; ?>">&nbsp;&nbsp;<font class="type2">max size - <?php echo $avatar_width; ?> x <?php echo $avatar_height; ?></font></td></tr>
    <tr><td>Gender</td><td><select name="sex"><?php if ( $db_result['sex'] == "M" ) { ?><option value="M">male</option><option value="F">female</option><?php } else { ?><option value="F">female</option><option value="M">male</option></select><?php } ?></td></tr>
    <tr><td>Site</td><td><input type="text" name="site" size="25" maxlength="25" value="<?php echo $db_result['site']; ?>"></td></tr>
    <tr><td>Site URL</td><td><input type="text" name="siteurl" size="25" maxlength="255" value="<?php echo $db_result['siteurl']; ?>"></td></tr>
    <tr><td>Group</td><td><select name="team"><?php if ( db_num_rows($db_result_cat) == 0 ) { echo '<option value="Standard Users">Standard Users</option>'; } else { echo '<option value="'.$db_result['team'].'">'.$db_result['team'].'</option>'; while ( $db_row = db_fetch_array($db_result_cat) ) { if ( $db_row['team'] != $category ) { echo '<option value="'.$db_row['category'].'">'.$db_row['category'].'</option>'; } $db_row++; } } ?></select></td></tr>
    <tr><td>Skin</td><td><select name="skin"><?php echo $skin_list; ?></select></td></tr>
    <tr><td>Rights</td><td><select name="rights"><?php if ( $_COOKIE['rights'] == 2 & $id == $_COOKIE['id'] ) { ?><option value="2">moderator</option><?php } elseif ( $_COOKIE['rights'] == 2 ) { ?><option value="1">standard</option><?php } elseif ( $db_result['rights'] == 1 ) { ?><option value="1">standard</option><option value="2">moderator</option><option value="3">administrator</option><?php } elseif ( $db_result['rights'] == 2 ) { ?><option value="2">moderator</option><option value="1">standard</option><option value="3">administrator</option><?php } else { ?><option value="3">administrator</option><option value="1">standard</option><option value="2">moderator</option></select><?php } ?></td></tr>
    <tr><td>Account Status</td><td><?php if ( $db_result['active'] == 1 ) { ?>Enabled: <input type="radio" name="active" value="1" checked><br />Disabled: <input type="radio" name="active" value="0"><?php } else { ?> Enabled: <input type="radio" name="active" value="1"><br />Disabled: <input type="radio" name="active" value="0" checked><?php } ?></td></tr>
    <tr><td colspan="2"><input type="submit" name="Modify" value="Modify" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Reset" value="Reset" class="button" style="width: 100px;"></td></tr>
    </table>
  </form>
<?php
	// basic profile form

	if ( $avatar_width == 'unlimited' | $avatar_width == '' | $avatar_width == 0 ) {
		$avatar_width = 'unlimited';
	}
	if ( $avatar_height == 'unlimited' | $avatar_height == '' | $avatar_height == 0 ) {
		$avatar_height = 'unlimited';
	}

	$id = $_COOKIE['id'];

	db_connect();

	$db_result = db_query("SELECT * FROM content_users WHERE id = '$id'");
	$db_result = db_fetch_array($db_result);

	db_close();

	// automatic skin detection
	if ( $handle = opendir('src/layout/skins/') ) {
		$skin_list = "<option value=\"$skin\">$skin</option>";

		while ( false !== ($file = readdir($handle)) ) {
			if ( $file != '.' & $file != '..' & $file != 'index.html' ) {

				if ( $file != $skin ) {
					$skin_list = $skin_list."<option value=\"$file\">$file</option>";
				}
			}
		}

		closedir($handle);
	}
?>
  <b>Update <font class="type2"><?php echo $db_result['username']; ?>'s</font> Profile</b>
  <form method="post" action="index.php?action=modify&id=<?php echo $id; ?>">
  <table border="0" width="550">
  <tr><td width="100">password</td><td><input type="password" name="password" size="25" maxlength="20"></td></tr>
  <tr><td>confirm password</td><td><input type="password" name="password2" size="25" maxlength="20"></td></tr>
  <tr><td>e-mail</td><td><input type="text" name="email" size="25" maxlength="50" value="<?php echo $db_result['email']; ?>"></td></tr>
  <tr><td>im</td><td><input type="text" name="im" size="25" maxlength="50" value="<?php echo $db_result['im']; ?>"></td></tr>
  <tr><td>title</td><td><input type="text" name="title" size="25" maxlength="25" value="<?php echo $db_result['title']; ?>"></td></tr>
  <tr><td>avatar</td><td><input type="text" name="avatar" size="25" maxlength="255" value="<?php echo $db_result['avatar']; ?>">&nbsp;&nbsp;<font class="type2">max size - <?php echo $avatar_width; ?> x <?php echo $avatar_height; ?></font></td></tr>
  <tr><td>sex</td><td><select name="sex"><?php if ( $db_result['sex'] == "F" ) { ?><option value="F">female</option><option value="M">male</option><?php } else { ?><option value="M">male</option><option value="F">female</option></select><?php } ?></td></tr>
  <tr><td>site</td><td><input type="text" name="site" size="25" maxlength="25" value="<?php echo $db_result['site']; ?>"></td></tr>
  <tr><td>siteurl</td><td><input type="text" name="siteurl" size="25" maxlength="255" value="<?php echo $db_result['siteurl']; ?>"></td></tr>
  <tr><td>skin</td><td><select name="skin"><?php echo $skin_list; ?></select></td></tr>
  <tr><td colspan="2"><input type="submit" name="Update" value="Update" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Reset" value="Reset" class="button" style="width: 100px;"></td></tr>
  </table>
  </form>
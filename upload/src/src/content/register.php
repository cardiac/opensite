<?php
	// page for registering new users

	$keychars = 'abcdefghijklmnopqrstuvwxyz0123456789';
	$length = 7;
	$rand = '';
	for ($i=0;$i<$length;$i++)
  	$rand .= substr($keychars, rand(1, strlen($keychars) ), 1);

	session_start();
	header('Cache-control: private');
	$_SESSION['rand'] = $rand;
?>
  <strong><img src="src/images/icons/user.gif" title="User"> Register New User</strong>
<?php
	if ( $avatar_width == 'unlimited' or $avatar_width == '' or $avatar_width == '0' ) {
		$avatar_width = 'unlimited';
	}

	if ( $avatar_height == 'unlimited' or $avatar_height == '' or $avatar_height == '0' ) {
		$avatar_height = 'unlimited';
	}
?>
  <form method="post" action="index.php?action=register&amp;register=process">
    <table border="0" width="500">
    <tr><td>username*</td><td><input type="text" name="username" size="25" maxlength="25"></td></tr>
    <tr><td>password*</td><td><input type="password" name="password" size="25" maxlength="20"></td></tr>
    <tr><td>confirm password*</td><td><input type="password" name="password2" size="25" maxlength="20"></td></tr>
    <tr><td>e-mail*</td><td><input type="text" name="email" size="25" maxlength="50"></td></tr>
    <tr><td>im</td><td><input type="text" name="im" size="25" maxlength="25"></td></tr>
    <tr><td>title*</td><td><input type="text" name="title" size="25" maxlength="25"></td></tr>
    <tr><td>avatar</td><td><input type="text" name="avatar" size="25" maxlength="255">&nbsp;&nbsp;<font class="type2">max size - <?php echo $avatar_width; ?> x <?php echo $avatar_height; ?></font></td></tr>
    <tr><td>sex*</td><td><select name="sex"><option value="M">male</option><option value="F">female</option></select></td></tr>
    <tr><td>site</td><td><input type="text" name="site" size="25" maxlength="25"></td></tr>
    <tr><td>siteurl</td><td><input type="text" name="siteurl" size="25" maxlength="150"></td></tr>
    <tr><td colspan="2">Below is an image with text that is designed to prevent excessive registration. Type the text found on the image in the box found farther below to proceed.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="src/src/content/register_img.php" title="Security Image" /></td></tr>
    <tr><td>security image</td><td><input type="text" name="secure" size="25" maxlength="10"></td></tr>
    <tr><td colspan="2"><input type="submit" name="Register" value="Register" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Reset" value="Reset" class="button" style="width: 100px;"></td></tr>
    </table>
  </form>
  <span class="type2">Fields marked with an asterisk (*) are required. If the security image is not displayed, you don't have cookies enabled. This site requires cookies in order to function properly.</span>
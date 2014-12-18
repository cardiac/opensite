<?php
	// displays a form to modify the rights of a module

	if ( $_COOKIE['rights'] != 3 ) {
		error('You do not have rights to view this page.');
	}

	$mod_list = '<select name="module">';
	$test = 0;

	if ( $handle = opendir('src/modules/') ) {
		while ( false !== ($module = readdir($handle)) ) {
			if ( $module != '.' & $module != '..' & $module != 'index.html' ) {
				include("src/modules/$module/mod_file.php");

				if ( $_COOKIE['rights'] == 3 | $mod_auth <= $_COOKIE['rights'] ) {
					$mod_list = $mod_list."<option value=\"$module\">$mod_title</option>";
				}

				$test = 1;
			}
		}

		closedir($handle);

		$mod_list = $mod_list.'</select>';
	}
?>
  <strong><img src="src/images/icons/modules.gif" alt="&nbsp;" title="Modules" /> Modify Rights</strong>
<?php
	if ( $test == 1 ) {
?>
  <form method="post" action="index.php?action=modules&amp;id=rights2">
    <table border="0" width="400">
    <tr><td>select module</td><td><?php echo $mod_list; ?></td></tr>
    <tr><td>select rights</td><td><select name="mod_auth"><option value="3">Administrators Only</option><option value="2">Administrators and Moderators</option><option value="1">All Users</option></td></tr>
    <tr><td colspan="2"><input type="submit" name="Modify" value="Modify" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Reset" value="Reset" class="button" style="width: 100px;"></td></tr>
    </table>
  </form>
<?php
	} else {
?>
  <p><span class="type2">There are no modules installed</span></p>
<?php
	}
?>
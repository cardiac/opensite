<?php
	// lists all of the site layouts for possible deletion
?>
  <strong><img src="src/images/icons/content.gif" alt="&nbsp;" title="Content" /> Delete Layout</strong><br />
  <form method="post" action="index.php?action=content&amp;content=layout_delete2">
    <table border="0" width="400">
    <tr><td width="100">select layout</td><td>
<?php
	if ( $handle = opendir('src/data/layouts/') ) {
		$test = false;

		while (false !== ($file = readdir($handle))) {
			if ( $file != '.' & $file != '..' & $file != 'stylesheets' & $file != 'index.html' & $file != '.htaccess' & $file != 'default' ) {
				if ( $test == false ) {
					echo '<select name="delete">';
				}

				$file = basename($file, '.php');
				echo "<option value=\"$file\">$file</option>";
				$test = true;
			}
		}

		closedir($handle);
	}

	if ( $test == true ) {
		echo '</select>';
	} else {
		echo '<span class="type2">No layouts could be found</span>';
	}
?>
    </td></tr>
<?php
	if ( $test == true ) {
?>
    <tr><td colspan="2"><input type="submit" name="Delete Layout" value="Delete Layout" class="button" style="width: 100px;"></td></tr>
<?php
	}
?>
    </table>
  </form>
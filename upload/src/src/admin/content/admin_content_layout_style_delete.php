<?php
	// displays a list of all of the stylesheets for deletion
?>
  <strong><img src="src/images/icons/content.gif" alt="&nbsp;" title="Content" /> Delete Stylsheet</strong><br />
  <form method="post" action="index.php?action=content&amp;content=layout_style_delete2">
    <table border="0" width="400">
    <tr><td width="100">select stylesheet</td><td>
<?php
	if ( $handle = opendir('src/data/layouts/stylesheets/') ) {
		$test = false;

		while (false !== ($file = readdir($handle))) {
			if ( $file != '.' & $file != '..' & $file != 'index.html' & $file != '.htaccess' ) {
				if ( $test == false ) {
					echo '<select name="delete">';
				}

				$file = basename($file, '.css');
				echo "<option value=\"$file\">$file</option>";
				$test = true;
			}
		}

		closedir($handle);
	}

	if ( $test == true ) {
		echo '</select>';
	} else {
		echo '<span class="type2">No stylesheets could be found</span>';
	}
?>
    </td></tr>
<?php
	if ( $test == true ) {
?>
    <tr><td colspan="2"><input type="submit" name="Delete Style" value="Delete Style" class="button" style="width: 100px;"></td></tr>
<?php
	}
?>
    </table>
  </form>
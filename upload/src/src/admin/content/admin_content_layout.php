<?php
	// lists the site's layouts and stylsheets
?>
  <strong><img src="src/images/icons/content.gif" alt="&nbsp;" title="Content" /> Site Layouts</strong><br />
  <table cellpadding="0" cellspacing="0">
<?php
	if ( $handle = opendir('src/data/layouts/') ) {
		while ( false !== ($file = readdir($handle)) ) {
			if ( $file != '.' & $file != '..' & $file != '.htaccess' & $file != 'index.html' & $file != 'stylesheets' ) {
				echo "<tr><td><a href=\"index.php?action=content&amp;content=layout2&amp;id=$file\" title=\"Modify $file\">- Modify $file</a></td><td width=\"20\"></td><td width=\"60\"><a href=\"index.php?action=content&amp;content=layout2&amp;name=default&amp;id=$file\" title=\"Modify Default Page\">&raquo; Default</a></td><td><a href=\"index.php?action=content&amp;content=layout2&amp;name=404&amp;id=$file\" title=\"Modify 404 Page\">&raquo; 404</a></td></tr>";
			}
		}

		closedir($handle);
	}
?>
  </table>
  <a href="index.php?action=content&amp;content=layout_new" title="New Layout">- New Layout</a><br />
  <a href="index.php?action=content&amp;content=layout_delete" title="Delete Layout">- Delete Layout</a><br />
  <p />
  <strong><img src="src/images/icons/content.gif" alt="&nbsp;" title="Content" /> Site Stylesheets</strong><br />
	<?php
		if ( $handle = opendir('src/data/layouts/stylesheets/') ) {
			while ( false !== ($file = readdir($handle)) ) {
				if ( $file != '.' & $file != '..' & $file != '.htaccess' & $file != 'index.html' ) {
					$file = basename($file, '.css');
					echo "<a href=\"index.php?action=content&amp;content=layout_style2&amp;id=$file\" title=\"Modify $file\">- Modify $file</a><br />";
				}
			}

			closedir($handle);
		}
	?>
  <a href="index.php?action=content&amp;content=layout_style_new" title="New Stylesheet">- New Stylesheet</a><br />
  <a href="index.php?action=content&amp;content=layout_style_delete" title="Delete Stylesheet">- Delete Stylesheet</a><br />
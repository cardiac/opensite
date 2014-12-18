<?php
	// serves as the main hub for basic user access to the module system

	$test = 0;
?>
  <strong><img src="src/images/icons/modules_installed.gif" title="Installed Modules" alt="&nbsp;"> Modules</strong><br />
<?php
	if ( $handle = opendir('src/modules/') ) {
		while ( false !== ($module = readdir($handle)) ) {
			if ( $module != '.' & $module != '..' & $module != 'index.html' ) {
				include("src/modules/$module/mod_file.php");

				if ( $mod_auth == 1 ) {
					$test = 1;
					echo "<a href=\"index.php?action=modules&module=$module\" title=\"$mod_title\">- $mod_title</a><br />";
				}
			}
		}

		closedir($handle);
	}

	if ( $test == 0 ) {
		echo '&nbsp;&nbsp;<span class="type2">There are currently no accessible modules</span>';
	}
?>
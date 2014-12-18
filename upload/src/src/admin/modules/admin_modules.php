<?php
	// serves as the main hub for the module system

	$test = 0;

	if ( $_COOKIE['rights'] == 3 ) {
?>
  <strong><img src="src/images/icons/modules.gif" alt="&nbsp;" title="Modules" /> Module Options</strong><br />
  - <a href="index.php?action=modules&amp;id=rights" title="Modify Rights">Modify Rights</a><br />
  <p />
<?php
	}
?>
  <strong><img src="src/images/icons/modules_installed.gif" alt="&nbsp;" title="Installed Modules" /> Installed Modules</strong><br />
<?php
	if ( $handle = opendir('src/modules/') ) {
		while ( false !== ($module = readdir($handle)) ) {
			if ( $module != '.' & $module != '..' & $module != 'index.html' ) {
				include("src/modules/$module/mod_file.php");

				if ( $_COOKIE['rights'] == 3 | $mod_auth <= $_COOKIE['rights'] ) {
					$test = 1;
					echo "<a href=\"index.php?action=modules&amp;module=$module\" title=\"$mod_title\">- $mod_title</a><br />";
				}
			}
		}

		closedir($handle);
	}

	if ( $test == 0 ) {
		echo '&nbsp;&nbsp;<span class="type2">There are currently no installed modules</span>';
	}
?>
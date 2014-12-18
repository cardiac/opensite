<?php
	// Primal Fusion openSite
	// Help File Viewer v1.0.1
	// Created by Ryan Strug
	// Compatible with openSite v0.1.0 and later

	error_reporting('2039');

	$help = "help";
	$id = $_GET['id'];
	$install = $_GET['install'];

	include('src/variables.php');
	include('src/layout/header.php');

	if ( $id == 'errors' ) {
		include('docs/help/errors.html');
	} elseif ( $id == 'lockedout' ) {
		include('docs/help/lockedout.html');
	} elseif ( $id == 'about' ) {
		include('docs/help/about.html');
	} elseif ( $id == 'changelog' ) {
		include('docs/help/changelog.html');
	} elseif ( $id == 'development' ) {
		include('docs/help/development.html');
	} else {
?>
  <strong><img src="src/images/icons/help.gif" alt="&nbsp;" title="Help" /> Help Files</strong><br />
  <a href="help.php?action=help&amp;id=errors" title="Troubleshooting Errors">- Troubleshooting Errors</a><br />
  <a href="help.php?action=help&amp;id=lockedout" title="Locked Out?">- Locked out?</a><p>
  <strong><img src="src/images/icons/help_about.gif" alt="&nbsp;" title="Help - About" /> Version Information</strong><br />
  <a href="help.php?action=help&amp;id=about" title="About">- About</a><br />
  <a href="help.php?action=help&amp;id=changelog" title="Change Log">- Change Log</a><br />
  <a href="help.php?action=help&amp;id=development" title="Development">- Development</a><br />
<?php
	}

	include('src/layout/footer.php');
?>
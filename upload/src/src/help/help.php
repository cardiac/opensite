<?php
	// serves as the main hub for help section
?>
  <strong><img src="src/images/icons/help.gif" title="Help" alt="&nbsp;" /> Help Files</strong><br />
  <a href="index.php?action=help&amp;id=errors" title="Errors">- Troubleshooting Errors</a><br />
  <a href="index.php?action=help&amp;id=lockedout" title="Locked Out">- Locked out?</a><p>
  <strong><img src="src/images/icons/help_about.gif" title="Help" alt="&nbsp;" /> Version Information</strong><br />
  <a href="index.php?action=help&amp;id=about" title="About">- About</a><br />
  <a href="index.php?action=help&amp;id=changelog" title="Change Log">- Change Log</a><br />
  <a href="index.php?action=help&amp;id=development" title="Development">- Development</a><br />
<?php
	if ( $_COOKIE['rights'] == 3 ) {
?>
  <br />
  <a href="index.php?action=help&amp;id=update" title="openSite Updates">Check for Updates &raquo;</a><br />
<?php
	}
?>
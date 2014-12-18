<?php
	if ( $_COOKIE['rights'] != 3 ) {
		error('You do not have the rights needed to view this page.');
	}
?>
<div style="text-align: center;">
  <img src="http://opensite.primalfusion.net/support/update/verify.gif" alt="Update Server Down" title="Verify" border="1" width="110" height="40"><br />
  If you can see the image above, the update server is online.<br /><br />
  Welcome to openSite Update. To get open the update page, <a target="_blank" href="http://opensite.primalfusion.net/update/index.php?version=<?php echo $current_version; ?>&amp;build=<?php echo $current_build; ?>" title="Upgrade">click here</a>.
</div>
<?php
	include('variables.php');
	include('functions.php');
	logout();
?>
<font class="type2">Logging you out in order to save your settings...</font>
<meta http-equiv="refresh" content="0; url=<?php echo $site_contenturl; ?>/index.php?auth=modify">
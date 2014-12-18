<?php
	// displays a warning message to prevent accidental site layout deletion

	if ( $_POST['delete'] == 'default' ) {
		error('You may not delete your default layout. This is the primary layout loaded when visitors first see your page. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}
?>
  Are you sure that you want to delete the layout <span class="type2"><?php echo $_POST['delete']; ?></span>?<br />
  &nbsp;&nbsp;<a href="index.php?action=content&amp;content=layout_delete3&amp;name=<?php echo $_POST['delete']; ?>" title="Yes">- Yes</a><br />
  &nbsp;&nbsp;<a href="index.php?action=content&amp;content=layout_delete" title="No">- No</a>
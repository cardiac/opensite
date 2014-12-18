<?php
	// displays a warning message to prevent accidental deletion of a stylesheet
?>
  Are you sure that you want to delete this stylesheet?<br />
  &nbsp;&nbsp;<a href="index.php?action=content&amp;content=layout_style_delete3&name=<?php echo $_POST['delete']; ?>" title="Yes">- Yes</a><br />
  &nbsp;&nbsp;<a href="index.php?action=content&amp;content=layout_style_delete" title="No">- No</a>
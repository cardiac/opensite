<?php
	// displays a warning message to prevent accidental deletion of an advertisement
?>
  Are you sure that you want to delete this advertisement?<br />
  &nbsp;&nbsp;<a href="index.php?action=content&amp;content=ads_delete2&amp;id=<?php echo $id; ?>" title="Yes">- Yes</a><br />
  &nbsp;&nbsp;<a href="index.php?action=content&amp;content=ads" title="No">- No</a>
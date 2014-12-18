<?php
	// displays a warning to prevent accidental deletion of a news category

	if ( $_COOKIE['rights'] == 2 ) {
		error('Moderators do not have the rights needed to create or delete categories.');
	}
?>
  WARNING: This does not modify news posts with this category.<p />
  Are you sure that you want to delete this category?<br />
  &nbsp;&nbsp;<a href="index.php?action=news&amp;news=delete_category2&amp;id=<?php echo $id; ?>" title="Yes">- Yes</a><br />
  &nbsp;&nbsp;<a href="index.php?action=news&amp;news=categories" title="No">- No</a>
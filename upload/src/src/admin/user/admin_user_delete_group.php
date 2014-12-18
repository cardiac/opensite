<?php
	// displays a warning to prevent accidental deletion of a user group

	if ( $_COOKIE['rights'] == 2 ) {
		error('Moderators do not have the rights needed to create or delete user groups.');
	}
?>
  WARNING: This does not modify users with this user group.<p />
  Are you sure that you want to delete this user group?<br />
  &nbsp;&nbsp;<a href="index.php?action=user&amp;user=delete_group2&amp;id=<?php echo $id; ?>" title="Yes">- Yes</a><br />
  &nbsp;&nbsp;<a href="index.php?action=user&amp;user=groups" title="No">- No</a>
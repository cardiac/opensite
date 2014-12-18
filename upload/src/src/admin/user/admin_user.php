<?php
	// serves as the root hub for user management
?>


<center>
<table width="70%" class="dashed_head">
  <tr>
    <td>
      <img src="src/src/admin/user/users.gif" alt="&nbsp;" title="Users" /></td><td><strong>User Management</strong> &raquo; <a href="index.php?action=user&amp;user=groups" title="Groups">Manage User Groups</a><br />
      Use this utility to adjust users and passwords. If you have any questions refer to the manual, <a href="#manual">here</a>.
    </td>
  </tr>
  </table>
<table>
	<tr>
		<td align="center"><img src="src/src/admin/user/pip.gif"><a href="index.php?action=user&amp;user=new">Create New User</a>
		</td>

	</tr>
</table>
</center>
<center>

<table border="0" cellpadding="1" cellspacing="1" width="495">
<?php if ( $_COOKIE['rights'] == 3 ) { ?>
<tr><td colspan="6"><strong><img src="src/src/admin/user/pip.gif"> Administrators</strong></td></tr>
<?php
	db_connect();
		
	$db_result = db_query("SELECT * FROM content_users WHERE rights = '3' ORDER BY username ASC");

	while ( $db_row = db_fetch_array($db_result) ) {
		if ( $db_row['id'] == 1 & $_COOKIE['id'] != 1 ) {
		} else {
?>
  <tr>
    <td width="5">
      &nbsp;
    </td>
    <td width="210">
      <img src="src/src/admin/user/loop.gif" alt="&nbsp;" title="Loop" /> <img src="src/images/icons/user_rights_administrator.gif" alt="&nbsp;" title="Administrators" /> [<a href="index.php?action=user&amp;user=active&amp;id=<?php echo $db_row['id']; ?>" title="Enable/Disable"><?php if ($db_row['active'] == '0') { ?><span class="type3">X</span><?php } else { ?><span class="type4">+</span><?php } ?></a>] <a href="index.php?action=user&amp;user=modify&amp;id=<?php echo $db_row['id']; ?>" alt="Modify <?php echo $db_row['username']; ?>" title="Modify <?php echo $db_row['username']; ?>"> <?php echo $db_row['username']; ?></a>
    </td>
    <td width="225">
      <a href="mailto:<?php echo stripslashes($db_row['email']); ?>" title="Email <?php echo stripslashes($db_row['email']); ?>"><?php echo $db_row['email']; ?></a>
    </td>
    <td width="30">
	<a href="index.php?action=profile&amp;id=<?php echo $db_row['id']; ?>" title="View <?php echo $db_row['username']; ?>"><img src="src/images/icons/news_comments.gif" border="0" alt="View Profile" title="View Profile" /></a>
    </td>
    <td width="30">
	<a href="index.php?action=user&amp;user=delete&amp;id=<?php echo $db_row['id']; ?>" title="Remove <?php echo $db_row['username']; ?>"><img src="src/images/icons/content_delete.gif" border="0" alt="Delete User" title="Delete User" /></a>
    </td>
  </tr>
<?php
		}

		$db_row++;
	}

	db_close();

	}
?>

  </table>

<br />

<table border="0" cellpadding="1" cellspacing="1" width="495">
<tr><td colspan="6"><img src="src/src/admin/user/pip.gif"> <strong> Moderators</strong></td></tr>
  
<?php
	db_connect();
		
	$db_result = db_query("SELECT * FROM content_users WHERE rights = '2' ORDER BY username ASC");
	$test = 0;

	while ( $db_row = db_fetch_array($db_result) ) {
		$test = 1;
?>
  <tr>
    <td width="5">
      &nbsp;
    </td>
    <td width="210">
      <img src="src/src/admin/user/loop.gif" alt="&nbsp;" title="Loop" /> <img src="src/images/icons/user_rights_moderator.gif" alt="&nbsp;" title="Moderators" /> [<a href="index.php?action=user&amp;user=active&amp;id=<?php echo $db_row['id']; ?>" title="Enable/Disable"><?php if ($db_row['active'] == '0') { ?><span class="type3">X</span><?php } else { ?><span class="type4">+</span><?php } ?></a>] <a href="index.php?action=user&amp;user=modify&amp;id=<?php echo $db_row['id']; ?>" alt="Modify <?php echo $db_row['username']; ?>" title="Modify <?php echo $db_row['username']; ?>"> <?php echo $db_row['username']; ?></a>
    </td>
    <td width="225">
      <a href="mailto:<?php echo stripslashes($db_row['email']); ?>" title="Email <?php echo stripslashes($db_row['email']); ?>"><?php echo $db_row['email']; ?></a>
    </td>
    <td width="30">
	<a href="index.php?action=profile&amp;id=<?php echo $db_row['id']; ?>" title="View <?php echo $db_row['username']; ?>"><img src="src/images/icons/news_comments.gif" border="0" alt="View Profile" title="View Profile" /></a>
    </td>
    <td width="30">
	<a href="index.php?action=user&amp;user=delete&amp;id=<?php echo $db_row['id']; ?>" title="Remove <?php echo $db_row['username']; ?>"><img src="src/images/icons/content_delete.gif" border="0" alt="Delete User" title="Delete User" /></a>
    </td>
  </tr>
<?php
		$db_row++;
	}

	if ( $test == 0 ) {
?>
  <tr>
	<td width="5">&nbsp;</td>

    <td width="175">
      <img src="src/src/admin/user/loop.gif">
    </td>
    <td colspan="2">
      There are no users with moderator access
    </td>
  </tr>
<?php
	}

	db_close();
?>




  </table>
<br />


<table border="0" cellpadding="1" cellspacing="1" width="495">
<tr><td colspan="6"><img src="src/src/admin/user/pip.gif"> <strong> Standard Users</strong></td></tr>
  
<?php
	db_connect();
		
	$db_result = db_query("SELECT * FROM content_users WHERE rights = '1' ORDER BY username ASC");
	$test = 0;

	while ( $db_row = db_fetch_array($db_result) ) {
		$test = 1;
?>
  <tr>
    <td width="5">
      &nbsp;
    </td>
    <td width="210">
      <img src="src/src/admin/user/loop.gif" alt="&nbsp;" title="Loop" /> <img src="src/images/icons/user_rights_standard.gif" alt="&nbsp;" title="Standard Users" /> [<a href="index.php?action=user&amp;user=active&amp;id=<?php echo $db_row['id']; ?>" title="Enable/Disable"><?php if ($db_row['active'] == '0') { ?><span class="type3">X</span><?php } else { ?><span class="type4">+</span><?php } ?></a>] <a href="index.php?action=user&amp;user=modify&amp;id=<?php echo $db_row['id']; ?>" alt="Modify <?php echo $db_row['username']; ?>" title="Modify <?php echo $db_row['username']; ?>"> <?php echo $db_row['username']; ?></a>
    </td>
    <td width="225">
      <a href="mailto:<?php echo stripslashes($db_row['email']); ?>" title="Email <?php echo stripslashes($db_row['email']); ?>"><?php echo $db_row['email']; ?></a>
    </td>
    <td width="30">
	<a href="index.php?action=profile&amp;id=<?php echo $db_row['id']; ?>" title="View <?php echo $db_row['username']; ?>"><img src="src/images/icons/news_comments.gif" border="0" alt="View Profile" title="View Profile" /></a>
    </td>
    <td width="30">
	<a href="index.php?action=user&amp;user=delete&amp;id=<?php echo $db_row['id']; ?>" title="Remove <?php echo $db_row['username']; ?>"><img src="src/images/icons/content_delete.gif" border="0" alt="Delete User" title="Delete User" /></a>
    </td>
  </tr>
<?php
		$db_row++;
	}

	if ( $test == 0 ) {
?>
  <tr>
	<td width="5">&nbsp;</td>

    <td width="175">
      <img src="src/src/admin/user/loop.gif">
    </td>
    <td colspan="2">
      No users exist with standard rights
    </td>
  </tr>
<?php
	}

	db_close();
?>




  </table>

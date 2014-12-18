<?php
	// displays a user's details in a neat little package

	db_connect();

	$id = db_secure($id);

	$db_result = db_query("SELECT * FROM content_users WHERE id = '$id'");
	$db_result = db_fetch_array($db_result);

	db_close();

	$email = $db_result['email'];
	$sex = $db_result['sex'];
	$rights = $db_result['rights'];
	$posts = $db_result['posts'];

	$display_email = str_replace('@', ' at ', $email);
	$display_email = str_replace('.', ' dot ', $display_email);

	if ( $sex == 'M' ) {
		$sex = 'Male';
	} else {
		$sex = 'Female';
	}

	if ( $rights == 3 ) {
		$rights = 'Administrator';
	} elseif ( $rights == 2 ) {
		$rights = 'Moderator';
	} else {
		$rights = 'Standard user';
		$posts = -1;
	}

	if ( $id == 0 ) {
		$db_result['avatar'] = $guest_avatar;
		$db_result['username'] = 'Guest';
		$db_result['site'] = $site;
		$db_result['siteurl'] = $site_url;
		$sex = 'Unknown';
		$db_result['team'] = 'Site Guests';
		$rights = 'Guest';
	}
?>
  <strong><img src="src/images/icons/user.gif" alt="&nbsp;" title="Users" /> Viewing User: <span class="type2"><?php echo $db_result['username']; ?></span></strong>
  <table border="0">
  <tr>
    <td style="text-align: right;">
      <img src="<?php if ( $db_result['avatar'] == '' ) { ?>src/images/avatars/noavatar.png<?php } else { ?><?php echo $db_result['avatar']; ?><?php }; ?>" alt="<?php echo $db_result['username']; ?>" title="<?php echo $db_result['username']; ?>" /><br />
      <?php echo $db_result['title']; ?><br />
      &raquo; <a href="javascript:history.back()" title="Back">Previous Page</a>
    </td>
    <td class="news_header" style="text-align: right; width: 110px;">
      <strong>User</strong><br />
      <?php if ( $id != 0 ) { ?><strong>E-mail</strong><br /><?php } ?>
      <?php if ( $id != 0 ) { ?><strong>IM</strong><br /><?php } ?>
      <strong>Site Name</strong><br />
      <strong>Site URL</strong><br />
      <strong>Sex</strong><br />
      <strong>Group</strong><br />
      <strong>Rights</strong><br />
      <?php if ( $posts != -1 ) { ?><strong>News Posts</strong><br /><?php } ?>
      <?php if ( $id != 0 ) { ?><strong>Comments</strong><br /><?php } ?>
    </td>
    <td>
      <?php echo $db_result['username']; ?><br />
      <?php if ( $id != 0 ) { ?><a href="mailto:<?php echo $email; ?>" title="<?php echo $db_result['username']; ?>"><?php echo $display_email; ?></a><br /><?php } ?>
      <?php if ( $id != 0 ) { echo $db_result['im']; ?><br /><?php } ?>
      <?php echo $db_result['site']; ?><br />
      <a href="<?php echo $db_result['siteurl']; ?>" title="<?php echo $db_result['site']; ?>"><?php echo $db_result['siteurl']; ?></a><br />
      <?php echo $sex; ?><br />
      <?php echo $db_result['team']; ?><br />
      <?php echo $rights; ?><br />
      <?php if ( $posts != -1 ) { echo $posts; ?><br /><?php } ?>
      <?php if ( $id != 0 ) { echo $db_result['comments']; ?><br /><?php } ?>
    </td>
  </tr>
  </table>
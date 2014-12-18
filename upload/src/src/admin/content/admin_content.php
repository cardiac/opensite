<?php
	// serves as the content center main hub and displays some server information
?>
  <strong><img src="src/images/icons/content.gif" alt="&nbsp;" title="Content" /> Content Center</strong><br />
  <strong><span class="type2">site</span></strong> &gt; <a href="<?php echo $site_url; ?>">My Site</a> | <a href="index.php?action=content&amp;content=content">Content System</a> | <a href="index.php?action=content&amp;content=layout">Site Layout</a><?php // | <a href="index.php?action=content&amp;content=sidebar">Sidebar Editor</a> ?><br />
  <strong><span class="type2">misc</span></strong> &gt; <?php // <a href="index.php?action=content&amp;content=affiliates">Affiliate Tracker</a> | ?><a href="index.php?action=content&amp;content=ads">Advertisements</a><br /><br /><?php // | <a href="index.php?action=content&amp;content=downloads">Downloads</a> | <a href="index.php?action=content&amp;content=image">Image Gallery</a> | <a href="index.php?action=content">Site Statistics</a> ?>
  <strong><span class="type2">Site Statistics</span></strong>
  <table border="0" width="700" cellpadding="1" cellspacing="0">
  <tr><td>Site Name</td><td><?php echo $site; ?></td></tr>
  <tr><td>Site URL (Address)</td><td><?php echo $site_url; ?></td></tr>
  <tr><td>Site Content URL</td><td><?php echo $site_contenturl; ?></td></tr>
  <tr><td></td></tr>
  <tr><td>Server Name</td><td><?php echo $_SERVER['SERVER_NAME']; ?></td></tr>
  <tr><td>Server Software</td><td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td></tr>
  <tr><td>Server Document Root</td><td><?php echo $_SERVER['DOCUMENT_ROOT']; ?></td></tr>
  <tr><td>Server Admin</td><td><?php echo $_SERVER['SERVER_ADMIN']; ?></td></tr>
  <tr><td></td></tr>
  <tr><td>Host IP Address</td><td><?php echo $_SERVER['REMOTE_ADDR']; ?></td></tr>
  <tr><td>Host Web Browser</td><td><?php echo $_SERVER['HTTP_USER_AGENT']; ?></td></tr>
  </table>
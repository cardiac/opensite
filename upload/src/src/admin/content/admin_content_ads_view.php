<?php
	// displays the currently selection ad

	db_connect();

	$id = db_secure($id);

	$db_result = db_query("SELECT * FROM content_ads WHERE id='$id'");
	$db_result = db_fetch_array($db_result);

	db_close();
?>
  <strong><img src="src/images/icons/content.gif" alt="&nbsp;" title="Content" /> Viewing <span color="navy"><?php echo $db_result['site']; ?></span></strong><br />
  <table border="0 cellpadding="0" cellspacing="0">
  <tr><td width="120"><span class="type2">Site Name</span></td><td width="500"><?php echo $db_result['site']; ?></td></tr>
  <tr><td><span class="type2">Site URL</span></td><td><a href="<?php echo $db_result['url']; ?>" title="<?php echo $db_result['site']; ?>"><?php echo $db_result['url']; ?></a></td></tr>
  <tr><td><span class="type2">Site Category</span></td><td><?php echo $db_result['category']; ?></td></tr>
  <tr><td><span class="type2">Site Hits</span></td><td><?php echo $db_result['hits']; ?></td></tr>
  <tr><td><span class="type2">Alternate Text</span></td><td><?php echo $db_result['alt']; ?></td></tr>
  <tr><td><span class="type2">Image</span></td><td><img src="<?php echo $db_result['image']; ?>" alt="<?php echo $db_result['alt']; ?>" title="<?php echo $db_result['site']; ?>" border="0" /></td></tr>
  </table>
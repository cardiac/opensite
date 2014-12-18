<?php
	// displays the current site layout for modification

	if ( $name == 'default' ) {
		$layout = htmlentities(implode('', file("src/data/layouts/$id/main.php")));
		$url = '&amp;name=default';
	} elseif ( $name == '404' ) {
		$layout = htmlentities(implode('', file("src/data/layouts/$id/404.php")));
		$url = '&amp;name=404';
	} else {
		$layout = htmlentities(implode('', file("src/data/layouts/$id/$id.php")));
	}
?>
  <strong><img src="src/images/icons/content.gif" alt="&nbsp;" title="Content" /> Modifying Layout <span class="type2"><?php echo $id; ?></span></strong> <?php if ( $name == 'default' ) { ?>default page<?php } elseif ( $name == '404' ) { ?>404 page<?php } ?><br />
  <form method="post" action="index.php?action=content&amp;content=layout3<?php echo $url; ?>&amp;id=<?php echo $id; ?>">
    <textarea name="layout" class="layout" wrap="off" style="width: 736px;"><?php echo $layout; ?></textarea><br />
    <input type="submit" name="Save Layout" value="Save Layout" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Reset Layout" value="Reset Layout" class="button" style="width: 100px;">
  </form><p />
  <strong><span class="type2">Layout Key</span></strong><br />
  &nbsp;&nbsp;{title} - prints the title of the page that you are currently accessing<br />
  &nbsp;&nbsp;{linkbar} - prints your site's linkbar (horizontal, quick menu)<br />
  &nbsp;&nbsp;{sidebar} - prints your site's sidebar (vertical, full list)<br />
  &nbsp;&nbsp;{affiliates} - displays your affiliates with your site<br />
  &nbsp;&nbsp;{advertisement} - displays an adbanner rotation<br />
  &nbsp;&nbsp;{content} - displays your site's content<br />
  &nbsp;&nbsp;{style}<em>stylesheet</em>{/style} - includes your css stylesheet<br />
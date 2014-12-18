<?php
	// displays the currently selected stylesheet for deletion

	$layout = htmlentities(implode('', file("src/data/layouts/stylesheets/$id.css")));
?>
  <strong><img src="src/images/icons/content.gif" alt="&nbsp;" title="Content" /> Modifying Stylsheet <span class="type2"><?php echo $id; ?></span></strong><br />
  <form method="post" action="index.php?action=content&amp;content=layout_style3&id=<?php echo $id; ?>">
    <textarea name="layout" class="layout" wrap="off" style="width: 736px;"><?php echo $layout; ?></textarea><br>
    <input type="submit" name="Save Style" value="Save Style" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Reset Style" value="Reset Style" class="button" style="width: 100px;">
  </form>
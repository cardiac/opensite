<?php
	// displays a form to modify the standard news layout

	if ( $_COOKIE['rights'] == 2 ) {
		error('Moderators do not have the rights needed to modify news layouts.');
	}

	$layout = $_GET['layout'];

	$content = implode('', file("src/data/layouts/$layout/news.php"));
	format_content();
?>
  <strong><img src="src/images/icons/news.gif"> Standard News Layout for <span class="type2"><?php echo $layout; ?></span></strong><br />
  <form method="post" action="index.php?action=news&amp;news=layout_news2&amp;layout=<?php echo $layout; ?>">
    <textarea name="layout" class="layout" wrap="off" style="width: 736px;"><?php echo $content; ?></textarea><br />
    <input type="submit" name="Save Layout" value="Save Layout" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Reset Layout" value="Reset Layout" class="button" style="width: 100px;">
  </form>
  <p />
  <strong><font class="type2">Layout Key</font></strong><br />
  &nbsp;&nbsp;{avatar} - displays each user's avatar with their username as alternate text (given the css class of "avatar")<br />
  &nbsp;&nbsp;{subject} - prints the subject/title of each news item<br />
  &nbsp;&nbsp;{category} - displays the news category of the post<br />
  &nbsp;&nbsp;{date} - displays the date of the news post using the format specified using the date format variable from the settings page<br />
  &nbsp;&nbsp;{author} - prints the author's name with a link to a profile page<br />
  &nbsp;&nbsp;{title} - prints the author's title<br />
  &nbsp;&nbsp;{content} - displays the actual news post's content<br />
  &nbsp;&nbsp;{comments}<em>text</em>{/comments} - creates a link to a page where users may post comments<br />
  &nbsp;&nbsp;{noc} - number of comments already posted for news post<br />
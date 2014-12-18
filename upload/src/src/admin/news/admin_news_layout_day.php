<?php
	// displays a form to modify day based news

	if ( $_COOKIE['rights'] == 2 ) {
		error('Moderators do not have the rights needed to modify news layouts.');
	}

	$layout = $_GET['layout'];

	$content = implode('', file("src/data/layouts/$layout/news_day_header.php"));
	format_content();
	$layout_header = $content;
	$content = implode('', file("src/data/layouts/$layout/news_day.php"));
	format_content();
	include('src/data/templates/news_day_settings.php');
?>
  <strong><img src="src/images/icons/news.gif" alt="&nbsp;" title="News System" /> Day Based News Layout</strong><br />
  <form method="post" action="index.php?action=news&amp;news=layout_day2&amp;layout=<?php echo $layout; ?>">
    <strong><span class="type2">Day Header</span></strong><br />
    <textarea name="layout_header" class="layout" wrap="off" style="width: 736px; height: 300px;"><?php echo $layout_header; ?></textarea><br /><br />
    <strong><span class="type2">Individual News Post</span></strong><br />
    <textarea name="layout" class="layout" wrap="off" style="width: 736px; height: 300px;"><?php echo $content; ?></textarea><br />
    <table border="0" cellpadding="2" cellspacing="0">
    <tr><td>date format</td><td><input type="text" name="date" size="20" maxlength="25" value="<?php echo $date_format; ?>"></td></tr>
    <tr><td>time format</td><td><input type="text" name="time" size="20" maxlength="25" value="<?php echo $time_format; ?>"></td></tr>
    </table>
    <input type="submit" name="Save Layout" value="Save Layout" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Reset Layout" value="Reset Layout" class="button" style="width: 100px;">
  </form><p>
  <strong><span class="type2">Layout Key</span></strong><br />
  &nbsp;&nbsp;{avatar} - displays each user's avatar with their username as alternate text (given the css class of "avatar")<br />
  &nbsp;&nbsp;{subject} - prints the subject/title of each news item<br />
  &nbsp;&nbsp;{author} - prints the author's name with a link to a profile page<br />
  &nbsp;&nbsp;{title} - prints the author's title<br />
  &nbsp;&nbsp;{content} - displays the actual news post's content<br />
  &nbsp;&nbsp;{comments}<em>text</em>{/comments} - creates a link to a page where users may post comments<br />
  &nbsp;&nbsp;{noc} - number of comments already posted for news post<p>
  <strong><span class="type2">Layout Key - Date Features</span></strong><br />
  &nbsp;&nbsp;{date} - displays the date of the news post using the format specified in the field above (only in header) DEFAULT: "F j, Y"<br />
  &nbsp;&nbsp;{time} - displays the time of the news post using the format specified in the field above (only in post) DEFAULT: "g:ia"<br />
  &nbsp;&nbsp;Click <a href="http://www.php.net/manual/en/function.date.php" target="_blank" title="PHP Date Manual">here</a> to for more information.
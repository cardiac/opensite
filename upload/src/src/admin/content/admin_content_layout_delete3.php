<?php
	// actually deletes the site layout as instructed by the user

	if ( $name == 'default' ) {
		error('You may not delete your default layout. This is the primary layout loaded when visitors first see your page. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	unlink("src/data/layouts/$name/$name.php");
	unlink("src/data/layouts/$name/404.php");
	unlink("src/data/layouts/$name/main.php");
	unlink("src/data/layouts/$name/news.php");
	unlink("src/data/layouts/$name/news_day.php");
	unlink("src/data/layouts/$name/news_day_header.php");
	unlink("src/data/layouts/$name/news_day_settings.php");
	unlink("src/data/layouts/$name/index.html");
	rmdir("src/data/layouts/$name/");
?>
  Layout successfully deleted. Click <a href="index.php?action=content&amp;content=layout" title="Layout">here</a> to return.
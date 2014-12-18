<?php
	// saves the input from the previous form as a new site layout

	if ( $handle = opendir('src/data/layouts/') ) {
		$layout_name = $_POST['layout_name'];
		$layout = str_replace( " &br;", "\n", $_POST['layout']);

		while ( false !== ($file = readdir($handle)) ) {
			if ( $file == $layout_name ) {
				error('That layout already exists. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
			}
		}

		closedir($handle);

	} else {
		error('Unable to read the site layout directory.');
	}

	mkdir("src/data/layouts/$layout_name", 0755);

	$file = fopen("src/data/layouts/$layout_name/$layout_name.php", 'wb');
	fwrite($file, $layout);
	fclose($file);

	$file = fclose(fopen("src/data/layouts/$layout_name/index.html", 'wb'));
	$file = fclose(fopen("src/data/layouts/$layout_name/404.php", 'wb'));
	$file = fclose(fopen("src/data/layouts/$layout_name/main.php", 'wb'));
	$file = fclose(fopen("src/data/layouts/$layout_name/news.php", 'wb'));
	$file = fclose(fopen("src/data/layouts/$layout_name/news_day.php", 'wb'));
	$file = fclose(fopen("src/data/layouts/$layout_name/news_day_header.php", 'wb'));
	$file = fclose(fopen("src/data/layouts/$layout_name/news_day_settings.php", 'wb'));
?>
  Layout successfully built. Click <a href="index.php?action=content&amp;content=layout" title="Layout">here</a> to return.
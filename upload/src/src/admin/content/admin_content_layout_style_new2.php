<?php
	// creates a new stylesheet using the previous form

	if ( $handle = opendir('src/data/layouts/stylesheets/') ) {
		$layout_name = $_POST['layout_name'];
		$layout = str_replace( " &br;", "\n", $_POST['layout']);

		while (false !== ($file = readdir($handle))) {
			if ($file != '.' & $file != '..') {
				$file = basename($file, '.css');
					
				if ( $file == $layout_name ) {
					error('That stylesheet already exists. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
				}
			}
		}

		closedir($handle);

	} else {
		error('Unable to read the site layout directory.');
	}

	$file = fopen("src/data/layouts/stylesheets/$layout_name.css", 'wb');
	fwrite($file, $_POST['layout']);
	fclose($file);
?>
  Stylesheet successfully built. Click <a href="index.php?action=content&amp;content=layout" title="Layout">here</a> to return.
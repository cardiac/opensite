<?php
	// modifies the standard news layout using the results of the previous form

	if ( $_COOKIE['rights'] == 2 ) {
		error('Moderators do not have the rights needed to modify news layouts.');
	}

	$var = $_GET['layout'];
	$layout = stripslashes($_POST['layout']);

	if ( is_writable("src/data/layouts/$var/news.php") ) {
		if ( !$handle = fopen("src/data/layouts/$var/news.php", 'wb') ) {
			error('openSite was unable to open the layout data file.');
		}

		if ( fwrite($handle, $layout) === false ) {
			error('openSite was unable to write the layout information to the file.');
		}	

		echo 'Your news layout was successfully saved. Click <a href="index.php?action=news" title="News Layout">here</a> to return.';

		fclose($handle);
	} else {
		error('openSite was unable to write the layout information to the file.');
	}
?>
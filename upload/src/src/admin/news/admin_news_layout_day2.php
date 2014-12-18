<?php
	// modifies the day based news layout using the results of the previous form

	if ( $_COOKIE['rights'] == 2 ) {
		error('Moderators do not have the rights needed to modify news layouts.');
	}

	$var = $_GET['layout'];
	$layout_header = stripslashes($_POST['layout_header']);
	$layout = stripslashes($_POST['layout']);
	$date = $_POST['date'];
	$time = $_POST['time'];
	$layout_settings = '<?php $date_format = \''.$date.'\'; $time_format = \''.$time.'\'; ?>';

	if ( is_writable("src/data/layouts/$var/news_day.php") ) {
		if ( !$handle = fopen("src/data/layouts/$var/news_day.php", 'wb') ) {
			error('openSite was unable to open the layout data file.');
		}

		if ( fwrite($handle, $layout) === false ) {
			error('openSite was unable to write the layout information to the file.');
		}	

		fclose($handle);

		if ( is_writable("src/data/layouts/$var/news_day_header.php") ) {
			if ( !$handle = fopen("src/data/layouts/$var/news_day_header.php", 'wb') ) {
				error('openSite was unable to open the layout data file.');
			}

			if ( fwrite($handle, $layout_header) === false ) {
				error('openSite was unable to write the layout information to the file.');
			}

			fclose($handle);

			if (is_writable("src/data/layouts/$var/news_day_settings.php")) {
				if ( !$handle = fopen("src/data/layouts/$var/news_day_settings.php", 'wb') ) {
					error('openSite was unable to open the layout data file.');
				}

				if ( fwrite($handle, $layout_settings) === false ) {
					error('openSite was unable to write the layout information to the file.');
				}

				fclose($handle);

				echo 'Your news layout was successfully saved. Click <a href="index.php?action=news" title="News">here</a> to return.';
			}
		}
	} else {
		error('openSite was unable to write the layout information to the file.');
	}
?>
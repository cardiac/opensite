<?php
	// saves the layout to the correct file from the previous form

	$layout = str_replace( " &br;", "\n", $_POST['layout']);

	if ( $name == 'default' ) {
		$id = "src/data/layouts/$id/main.php";
	} elseif ( $name == '404' ) {
		$id = "src/data/layouts/$id/404.php";
	} else {
		$id = "src/data/layouts/$id/$id.php";
	}

	if ( is_writable($id) ) {
		if ( !$handle = fopen($id, 'wb') ) {
			error('openSite was unable to open the layout data file.');
		}

		if ( fwrite($handle, $layout) === false ) {
			error('openSite was unable to write the layout information to the file.');
		}	
   
		echo 'Your site layout was successfully saved. Click <a href="index.php?action=content&amp;content=layout" title="Layout">here</a> to return.';
   
		fclose($handle);
	} else {
		error('openSite was unable to write the layout information to the file.');
	}
?>
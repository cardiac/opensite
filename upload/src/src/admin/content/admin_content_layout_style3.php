<?php
	// saves all of the user's changes to the stylesheet

	$layout = str_replace( " &br;", "\n", $_POST['layout']);

	if (is_writable("src/data/layouts/stylesheets/$id.css")) {
		if ( !$handle = fopen("src/data/layouts/stylesheets/$id.css", 'wb') ) {
			error('openSite was unable to open the layout data file.');
		}

		if ( fwrite($handle, $layout) === false ) {
			error('openSite was unable to write the layout information to the file.');
		}	
  
		echo 'Your stylesheet was successfully saved. Click <a href="index.php?action=content&amp;content=layout" title="Layout">here</a> to return.';
   
		fclose($handle);
	} else {
		error('openSite was unable to write the layout information to the file.');
	}
?>
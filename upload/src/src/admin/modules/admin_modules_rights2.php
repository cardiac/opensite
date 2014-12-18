<?php
	// modifies a module's rights using information from the previous form

	$module = $_POST['module'];

	include("src/modules/$module/mod_file.php");

	$mod_auth = $_POST['mod_auth'];

	$settings = '<?php $mod_title = \''.$mod_title.'\'; $mod_auth = \''.$mod_auth.'\'; ?>';

	if ( is_writable("src/modules/$module/mod_file.php") ) {

		if ( !$handle = fopen("src/modules/$module/mod_file.php", 'wb') ) {
			error('openSite was unable to open the module data file.');
		}

		if ( fwrite($handle, $settings) === FALSE ) {
			error('openSite was unable to write to the module data file.');
		}
   
		echo 'The module\'s rights have been changed successfully. Click <a href="index.php?action=modules" title="Modules">here</a> to return.';
   
		fclose($handle);
                   
	} else {
		error('<openSite was unable to write to the module data file.');
	}
?>
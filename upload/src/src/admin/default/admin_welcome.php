<?php
	// Administrator welcome message

	if ( file_exists('install/index.php') ) {
		echo '<span class="type3">The \'install\' directory still exists. Before you use openSite, you must delete this directory to prevent unauthorized changes.</span><br /><br />';
	}
?>
Welcome to <?php echo $title; ?>. This PHP/MySQL built program is designed to allow any user create a powerful and dynamic website in order to appeal to the masses. This program allows users to create wonderful sites and manage their content within a few simple clicks. All is just a few simple steps away... Well, enjoy! Don't forget to stay on top of newer security updates.
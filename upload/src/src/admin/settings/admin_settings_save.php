<?php
	// saves the settings from the previous form

	if ( $_POST['skin'] == '' ) {
		$_POST['skin'] = 'default';
	}

	$settings = '<?php $site = \''.$_POST['site'].'\'; $site_url = \''.$_POST['site_url'].'\'; $site_contenturl = \''.$_POST['site_contenturl'].'\'; $site_contentfolder = \''.$_POST['site_contentfolder'].'\'; $db_driver = \''.$_POST['db_driver'].'\'; $db_host = \''.$_POST['db_host'].'\'; $db_user = \''.$_POST['db_user'].'\'; $db_pass = \''.$_POST['db_pass'].'\'; $db_database = \''.$_POST['db_database'].'\'; $registration = \''.$_POST['registration'].'\'; $guest_avatar = \''.$_POST['guest_avatar'].'\'; $avatar_width = \''.$_POST['avatar_width'].'\'; $avatar_height = \''.$_POST['avatar_height'].'\'; $news_html = \''.$_POST['news_html'].'\'; $news_comments_html = \''.$_POST['news_comments_html'].'\'; $news_display = \''.$_POST['news_display'].'\'; $news_posts = \''.$_POST['news_posts'].'\'; $date_format = \''.$_POST['date_format'].'\'; $skin = \''.$_POST['skin'].'\'; $modules_startup = \''.$_POST['modules_startup'].'\';?>';

	if (is_writable('src/data/settings.php')) {

		if ( !$handle = fopen('src/data/settings.php', 'wb') ) {
			error('<b>Error 005</b> Settings Open Failure');
		}

		if ( fwrite($handle, $settings) === FALSE ) {
			error('<b>Error 004</b> Settings Write Failure');
		}
   
		echo 'Your settings were successfully saved. Click <a href="index.php?action=settings">here</a> to return.';
   
		fclose($handle);
                   
	} else {
		error('<b>Error 004</b> Settings Write Failure');
	}
?>
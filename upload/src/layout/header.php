<?php
	$default_skin = $skin;

	if ( !$_COOKIE['skin'] == '' ) {
		$skin = $_COOKIE['skin'];
	}

	$header = implode('', file("src/layout/skins/$skin/header.php"));
	$header = str_replace('{title}', $title, $header);

	if ( isset($help) ) {
		$linkbar = '<a href="index.php" class="bar">ContentOne</a> | <a href="help.php" class="bar">help</a>&nbsp;&nbsp;';
	} elseif ( $_COOKIE['rights'] == 3 ) {
			$header = str_replace('{menu_opensite}', '<a href="index.php" title="openSite" class="bar">openSite</a> -', $header);
			$header = str_replace('{menu_sitehome}', '<a href="'.$site_url.'" title="'.$site.'" class="bar">My Site</a> -', $header);
			$header = str_replace('{menu_settings}', '<a href="index.php?action=settings" title="Settings" class="bar">Settings</a> -', $header);
			$header = str_replace('{menu_cc}', '<a href="index.php?action=content" title="Content Center" class="bar">Content Center</a> -', $header);
			$header = str_replace('{menu_news}', '<a href="index.php?action=news" title="News System" class="bar">News System</a> -', $header);
			$header = str_replace('{menu_user}', '<a href="index.php?action=user" title="User Management" class="bar">User Management</a> -', $header);
			$header = str_replace('{menu_mods}', '<a href="index.php?action=modules" title="Modules" class="bar">Modules</a> -', $header);
			$header = str_replace('{menu_help}', '<a href="index.php?action=help" title="Help" class="bar">Help</a> -', $header);
			$header = str_replace('{menu_logout}', '<a href="index.php?action=logout" title="Logout" class="bar">Logout</a>', $header);
			$header = str_replace('{menu_profile}', '', $header);
	} elseif ( $_COOKIE['rights'] == 2 ) {
			$header = str_replace('{menu_opensite}', '<a href="index.php" title="openSite" class="bar">openSite</a> -', $header);
			$header = str_replace('{menu_sitehome}', '<a href="'.$site_url.'" title="'.$site.'" class="bar">Site Home</a> -', $header);
			$header = str_replace('{menu_settings}', '', $header);
			$header = str_replace('{menu_cc}', '', $header);
			$header = str_replace('{menu_profile}', '', $header);
			$header = str_replace('{menu_news}', '<a href="index.php?action=news" title="News System" class="bar">News System</a> -', $header);
			$header = str_replace('{menu_user}', '<a href="index.php?action=user" title="User Management" class="bar">User Management</a> -', $header);
			$header = str_replace('{menu_mods}', '<a href="index.php?action=modules" title="Modules" class="bar">Modules</a> -', $header);
			$header = str_replace('{menu_help}', '<a href="index.php?action=help" title="Help" class="bar">Help</a> -', $header);
			$header = str_replace('{menu_logout}', '<a href="index.php?action=logout" title="Logout" class="bar">Logout</a>', $header);
	} elseif ( $_COOKIE['rights'] == 1 ) {
			$header = str_replace('{menu_opensite}', '<a href="index.php" title="openSite" class="bar">openSite</a> -', $header);
			$header = str_replace('{menu_sitehome}', '<a href="'.$site_url.'" title="'.$site.'" class="bar">Site Home</a> -', $header);
			$header = str_replace('{menu_settings}', '', $header);
			$header = str_replace('{menu_profile}', '<a href="index.php?action=user" title="My Profile" class="bar">My Profile</a> -', $header);
			$header = str_replace('{menu_cc}', '', $header);
			$header = str_replace('{menu_news}', '', $header);
			$header = str_replace('{menu_user}', '', $header);
			$header = str_replace('{menu_mods}', '<a href="index.php?action=modules" title="Modules" class="bar">Modules</a> -', $header);
			$header = str_replace('{menu_help}', '<a href="index.php?action=help" title="Help" class="bar">Help</a> -', $header);
			$header = str_replace('{menu_logout}', '<a href="index.php?action=logout" title="Logout" class="bar">Logout</a>', $header);	
	} elseif ( $action == 'comments' ) {
		
	} else {
		
	}

	echo $header;
?>
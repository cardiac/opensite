<?php
	// core engine file v0.2.2 Beta

	require('secure.php');

	$action = $_GET['action'];
	$content = $_GET['content'];
	$news = $_GET['news'];
	$user = $_GET['user'];
	$module = $_GET['module'];
	$id = $_GET['id'];
	$newsid = $_GET['newsid'];
	$name = $_GET['name'];

	// SECTION LOGOUT |sl
	if ( $action == 'logout' ) {
		$ip = $_SERVER['REMOTE_ADDR'];
		$user = $_COOKIE['username'];
		$today = time();

		// fix later
		// db_connect();
		// db_query("UPDATE content_users SET loginip='$ip',logindate='$today' WHERE username=$user;");
		// db_close();

		logout();
		header('Location: index.php?auth=logout');
	}

	// SECTION BASIC |sb
	if ( $_COOKIE['rights'] == 1 ) {
		if ( $action != 'help' ) {
			include('src/layout/header.php');
		}

		if ( $action == 'help' ) {
		} elseif ( $action == 'user' ) {
			include('src/src/basic/basic_user.php');
		} elseif ( $action == 'modify' ) {
			include('src/src/basic/basic_modify.php');
		} elseif ( $action == 'download' ) {
			include('src/src/basic/basic_download.php');
		} elseif ( $action == 'modules' ) {
			if ( $module ) {
				include('src/modules/'.$module.'/mod_file.php');

				if ( $mod_auth == 1 ) {
					include('src/modules/'.$module.'/index.php');
				} else {
					include('src/src/basic/basic_modules.php');
				}
			} else {
				include('src/src/basic/basic_modules.php');
			}
		} else {
			if ( $modules_startup == '' ) {
				include('src/basic/basic_welcome.php');
			} else {
				include("src/modules/$modules_startup/mod_file.php");

				if ( $mod_auth == 1 ) {
					include("src/modules/$modules_startup/index.php");
				} else {
					include('src/basic/basic_welcome.php');
				}
			}
		}

		if ( $action != 'help' ) {
			include('src/layout/footer.php');
		}
	}

	// SECTION SETTINGS |ss
	if ( $action == 'settings' ) {
		include('src/layout/header.php');

		if ( $_COOKIE['rights'] == 2 ) {
			echo 'Moderators do not have rights to view this page.';
		} elseif ( $id == 'save' ) {
			include('src/src/admin/settings/admin_settings_save.php');
		} else {
			include('src/src/admin/settings/admin_settings.php');
		}

		include('src/layout/footer.php');

	// SECTION CONTENT |sc
	} elseif ( $action == 'content' ) {
		include('src/layout/header.php');

		if ( $_COOKIE['rights'] == 2 ) {
			echo 'Moderators do not have rights to view this page.';
		} elseif ( file_exists("src/src/admin/content/admin_content_$content.php") ) {
			include("src/src/admin/content/admin_content_$content.php");
		} else {
			include('src/src/admin/content/admin_content.php');
		}

		include('src/layout/footer.php');

	// SECTION NEWS |sn
	} elseif ( $action == 'news' ) {
		include('src/layout/header.php');

		if ( file_exists("src/src/admin/news/admin_news_$news.php") ) {
			include("src/src/admin/news/admin_news_$news.php");
		} else {
			include('src/src/admin/news/admin_news.php');
		}

		include('src/layout/footer.php');

	// SECTION USER |su
	} elseif ( $action == 'user' ) {
		include('src/layout/header.php');

		if ( file_exists("src/src/admin/user/admin_user_$user.php") ) {
			include("src/src/admin/user/admin_user_$user.php");
		} else {
			include('src/src/admin/user/admin_user.php');
		}

		include('src/layout/footer.php');

	// SECTION MODULES |sm
	} elseif ( $action == 'modules' ) {
		include('src/layout/header.php');

		if ( $module ) {
			include('src/modules/'.$module.'/index.php');
		} elseif ( file_exists("src/src/admin/modules/admin_modules_$id.php") ) {
			include("src/src/admin/modules/admin_modules_$id.php");
		} else {
			include('src/src/admin/modules/admin_modules.php');
		}

		include('src/layout/footer.php');

	// SECTION HELP |sh
	} elseif ( $action == 'help' ) {
		include('src/layout/header.php');

		if ( $id == 'update' ) {
			include('src/src/help/update.php');
		} elseif ( $id ) {
			include("docs/help/$id.html");
		} else {
			include('src/src/help/help.php');
		}

		include('src/layout/footer.php');

	// SECTION DEFAULT |sd
	} else {
		include('src/layout/header.php');

		if ( $modules_startup == '' ) {
			include('src/admin/default/admin_welcome.php');
		} else {
			include("src/modules/$modules_startup/mod_file.php");

			if ( $_COOKIE['rights'] >= $mod_auth | $_COOKIE['rights'] == 3 ) {
				include("src/modules/$modules_startup/index.php");
			} else {
				include('src/admin/default/admin_welcome.php');
			}
		}

		include('src/layout/footer.php');
	}
?>
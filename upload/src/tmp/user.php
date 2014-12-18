<?php
	$id = $_COOKIE['id'];
	$username = $_COOKIE['username'];
	$password = $_COOKIE['password'];
	$rights = $_COOKIE['rights'];
	$active = $_COOKIE['active'];
	$logout = 0;

	if ( $action == 'logout' ) {
		logout();
		$logout = 1;
	}

	if ( isset($username) & isset($password) & isset($rights) & isset($active) & $logout == 0 ) {
		$db_result = db_query("SELECT * FROM content_users WHERE id = '$id' AND username = '$username' AND password = '$password' AND rights = '$rights' AND active = '$active'");
		$db_num = db_num_rows($db_result);

		if ( $db_num != 1 ) {
			$user = 'Invalid user authentication results. Click <a href="os/index.php?auth=required">here</a> to revalidate.';
		} elseif ( $rights == 1 ) {
			$user = '<strong>Welcome</strong> You are currently logged in as <a href="os/index.php" title="'.$username.'">'.$username.'</a> » <a href="os/index.php?action=profile" title="My Profile">My Profile</a> | <a href="index.php?action=logout" title="Logout">Logout</a>';
		} elseif ( $rights == 2 ) {
			$user = '<strong>Welcome</strong> You are currently logged in as <a href="os/index.php?action=user&amp;user=modify&amp;id='.$id.'" title="'.$username.'">'.$username.'</a> » <a href="os/index.php?action=news" title="News System">News System</a> | <a href="os/index.php?action=user" title="Manage Users">Manage Users</a> | <a href="index.php?action=logout" title="Logout">Logout</a>';
		} elseif ( $rights == 3 ) {
			$user = '<strong>Welcome</strong> You are currently logged in as <a href="os/index.php?action=user&amp;user=modify&amp;id='.$id.'" title="'.$username.'">'.$username.'</a> » <a href="os/index.php?action=news" title="News System">News System</a> | <a href="os/index.php?action=content&amp;content=content" title="Modify Content">Modify Content</a> | <a href="os/index.php?action=user" title="Manage Users">Manage Users</a> | <a href="index.php?action=logout" title="Logout">Logout</a>';
		}
	} else {
		$user = '<strong>Welcome</strong> You are not currently logged in » <a href="os/index.php" title="Login">Login</a> | <a href="os/index.php?action=register" title="Register">Register</a>';
	}
?>
<?php
	function error($error = 'An error has occured.') {
		func_get_arg($error);
		global $skin;
		echo '<br /><br /><br /><center><table class="func_error" cellpadding="0" cellspacing="0"><tr><td class="func_error_title" colspan="2">openSite: An Error has occured.</td></tr><tr><td class="func_error_image"><img src="src/images/error.gif" title="Error" alt="Error"></td><td class="func_error_message">'.$error.'</td></tr></table></center>';
		include('src/layout/footer.php');
		exit;
	}

	function format_comments() {
		global $news_comments_html, $title, $content;
		if ( $news_comments_html != 1 ) {
			$title = strip_tags($title);
			$content = strip_tags($content);
		}
		$title = str_replace('[b]', '<strong>', $title);
		$title = str_replace('[/b]', '</strong>', $title);
		$title = str_replace('[u]', '<u>', $title);
		$title = str_replace('[/u]', '</u>', $title);
		$title = str_replace('[i]', '<em>', $title);
		$title = str_replace('[/i]', '</em>', $title);
		$content = str_replace('[b]', '<strong>', $content);
		$content = str_replace('[/b]', '</strong>', $content);
		$content = str_replace('[u]', '<u>', $content);
		$content = str_replace('[/u]', '</u>', $content);
		$content = str_replace('[i]', '<em>', $content);
		$content = str_replace('[/i]', '</em>', $content);
		$content = str_replace('[link', '<a"', $content);
		$content = str_replace('[/link]', '</a>', $content);
		$content = str_replace('[h', '<h', $content);
		$content = str_replace('[/h', '</h', $content);
		$content = str_replace('[center]', '<center>', $content);
		$content = str_replace('[/center]', '</center>', $content);
		$content = str_replace('[font', '<font', $content);
		$content = str_replace('[/font]', '</font>', $content);
		$content = str_replace('[p]', '<p>', $content);
		$content = str_replace('[/p]', '</p>', $content);
		$content = str_replace('[br]', '<br />', $content);
		$content = str_replace('[img]', '<img src="', $content);
		$content = str_replace('[/img]', '">', $content);
		$content = str_replace(']', '>', $content);
		$content = ereg_replace("\n", '<br />', $content);
	}

	function format_content() {
		global $content;
		$content = str_replace( "&nbsp;", "&amp;nbsp;", $content);
		$content = str_replace( "&quot;", "&amp;quot;", $content);
		$content = str_replace( "&#039;", "&amp;#039;", $content);
		$content = str_replace( "&gt;", "&amp;gt;", $content);
		$content = str_replace( "&lt;", "&amp;lt;", $content);
		$content = str_replace( "&raquo;", "&amp;raquo;", $content);
	}

	function format_news() {
		global $news_html, $title, $content;
		if ( $news_html != 1 ) {
			$title = strip_tags($title);
			$content = strip_tags($content);
		}
		$title = str_replace('[b]', '<strong>', $title);
		$title = str_replace('[/b]', '</strong>', $title);
		$title = str_replace('[u]', '<u>', $title);
		$title = str_replace('[/u]', '</u>', $title);
		$title = str_replace('[i]', '<em>', $title);
		$title = str_replace('[/i]', '</em>', $title);
		$content = str_replace('[b]', '<strong>', $content);
		$content = str_replace('[/b]', '</strong>', $content);
		$content = str_replace('[u]', '<u>', $content);
		$content = str_replace('[/u]', '</u>', $content);
		$content = str_replace('[i]', '<em>', $content);
		$content = str_replace('[/i]', '</em>', $content);
		$content = str_replace('[link', '<a', $content);
		$content = str_replace('[/link]', '</a>', $content);
		$content = str_replace('[h', '<h', $content);
		$content = str_replace('[/h', '</h', $content);
		$content = str_replace('[center]', '<center>', $content);
		$content = str_replace('[/center]', '</center>', $content);
		$content = str_replace('[font', '<font', $content);
		$content = str_replace('[/font]', '</font>', $content);
		$content = str_replace('[p]', '<p>', $content);
		$content = str_replace('[/p]', '</p>', $content);
		$content = str_replace('[br]', '<br />', $content);
		$content = str_replace('[img]', '<img src="', $content);
		$content = str_replace('[/img]', '">', $content);
		$content = str_replace(']', '>', $content);
		$content = ereg_replace("\n", '<br />', $content);
	}

	function login() {
		setcookie('id', $db_result['id'], time() + 31526000, "/");
		setcookie('username', $username, time() + 31526000, "/");
		setcookie('password', $password, time() + 31526000, "/");
		setcookie('email', $db_result['email'], time() + 31526000, "/");
		setcookie('im', $db_result['im'], time() + 31526000, "/");
		setcookie('title', $db_result['title'], time() + 31526000, "/");
		setcookie('avatar', $db_result['avatar'], time() + 31526000, "/");
		setcookie('sex', $db_result['sex'], time() + 31526000, "/");
		setcookie('site', $db_result['site'], time() + 31526000, "/");
		setcookie('siteurl', $db_result['siteurl'], time() + 31526000, "/");
		setcookie('posts', $db_result['posts'], time() + 31526000, "/");
		setcookie('comments', $db_result['comments'], time() + 31526000, "/");
		setcookie('team', $db_result['team'], time() + 31526000, "/");
		setcookie('skin', $db_result['skin'], time() + 31526000, "/");
		setcookie('rights', $db_result['rights'], time() + 31526000, "/");
		setcookie('active', $db_result['active'], time() + 31526000, "/");
	}

	function logout() {
		setcookie('id', '', time() - 31526000, "/");
		setcookie('username', '', time() - 31526000, "/");
		setcookie('password', '', time() - 31526000, "/");
		setcookie('email', '', time() - 31526000, "/");
		setcookie('im', '', time() - 31526000, "/");
		setcookie('title', '', time() - 31526000, "/");
		setcookie('avatar', '', time() - 31526000, "/");
		setcookie('sex', '', time() - 31526000, "/");
		setcookie('site', '', time() - 31526000, "/");
		setcookie('siteurl', '', time() - 31526000, "/");
		setcookie('posts', '', time() - 31526000, "/");
		setcookie('comments', '', time() - 31526000, "/");
		setcookie('team', '', time() - 31526000, "/");
		setcookie('skin', '', time() - 31526000, "/");
		setcookie('rights', '', time() - 31526000, "/");
		setcookie('active', '', time() - 31526000, "/");
	}
?>
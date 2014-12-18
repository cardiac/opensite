<?php
	function db_connect() {
		global $db_host, $db_user, $db_pass, $db_database;
		$mysql_link = mysql_connect($db_host,$db_user,$db_pass) or error('openSite was unable to connect to the database using the MySQL driver. Please doublecheck your database host, user, and password settings to make the necessary corrections:<br /><strong>'.mysql_error().'</strong>');
		mysql_select_db($db_database,$mysql_link) or error('openSite was unable to select the appropriate database using the MySQL driver. Please make sure that the database openSite is attempting to access exists:<br /><strong>'.mysql_error().'</strong>');
	}

	function db_secure($string) {
		func_get_arg($string);
		$string = mysql_real_escape_string($string);
		return $string;
	}

	function db_query($db_query) {
		func_get_arg($db_query);
		$db_result = mysql_query($db_query) or error('openSite was unable to execute the database changes that it needs to using the MySQL driver:<br /><strong>'.mysql_error().'</strong>');
		return $db_result;
	}

	function db_multi_query($db_query) {
		error('The multi query functionality is only available when using the MySQLi driver.');
	}

	function db_num_rows($db_result) {
		func_get_arg($db_result);
		$db_num = mysql_num_rows($db_result);
		return $db_num;
	}

	function db_fetch_array($db_result) {
		func_get_arg($db_result);
		$db_result = mysql_fetch_array($db_result);
		return $db_result;
	}

	function db_close() {
		global $mysql_link;
		mysql_close($mysql_link);
	}
?>
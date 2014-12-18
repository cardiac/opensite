<?php
	function db_connect() {
		global $db_host, $db_user, $db_pass, $db_database, $mysqli_link;
		$mysqli_link = mysqli_connect($db_host,$db_user,$db_pass) or error('openSite was unable to connect to the database using the MySQL driver. Please doublecheck your database host, user, and password settings to make the necessary corrections:<br /><strong>'.mysql_error().'</strong>');
		mysqli_select_db($mysqli_link,$db_database) or error('openSite was unable to select the appropriate database using the MySQLi driver. Please make sure that the database openSite is attempting to access exists:<br /><strong>'.mysql_error().'</strong>');
	}

	function db_secure($string) {
		func_get_arg($string);
		global $mysqli_link;
		$string = mysqli_real_escape_string($mysqli_link,$string);
		return $string;
	}

	function db_query($db_query) {
		func_get_arg($db_query);
		global $mysqli_link;
		$db_result = mysqli_query($mysqli_link,$db_query) or error('openSite was unable to execute the database changes that it needs to using the MySQLi driver:<br /><strong>'.mysql_error().'</strong>');
		return $db_result;
	}

	function db_multi_query($db_query) {
		func_get_arg($db_query);
		global $mysqli_link;
		$db_result = mysqli_multi_query($mysqli_link,$db_query) or error('openSite was unable to execute the database changes that it needs to using the MySQLi driver:<br /><strong>'.mysql_error().'</strong>');
		return $db_result;
	}

	function db_num_rows($db_result) {
		func_get_arg($db_result);
		$db_num = mysqli_num_rows($db_result);
		return $db_num;
	}

	function db_fetch_array($db_result) {
		func_get_arg($db_result);
		$db_result = mysqli_fetch_array($db_result,MYSQLI_BOTH);
		return $db_result;
	}

	function db_close() {
		global $mysqli_link;
		mysqli_close($mysqli_link);
	}
?>
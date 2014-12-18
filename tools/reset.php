<?php
	// Primal Fusion openSite
	// Administrative Password Reset Tool v1.0.1
	// Created by Anthony Hoivik
	// Compatible with openSite v0.1.0 and later
?>
<html>
<head>
  <title>Emergency Password Reset Tool</title>
  <link rel="stylesheet" href="http://opensite.primalfusion.net/update/src/main.css">
</head>
<body>
  <center>
<?php
	include('src/variables.php');
	include('src/functions.php');
	include('src/drivers/'.$db_driver.'.php');

	$action = $_GET['action'];

	if ( $action == 'submit' ) {
		$passwd = md5(db_secure($_POST['passwd']));
	
		db_connect();
		db_query("UPDATE content_users SET password='$passwd' WHERE id=1");
		db_close();
?>
    Password Reset Succesful. Delete This File Now.
<?php
	} else {
?>
  <center>
    <form action="reset.php?action=submit" method="post">
      <h2>Administrative Reset</h2>
      <span style="color: red;"><em>NOTE: Do not forget to delete this file immediatly after use.</em></span><br />
      <strong>New Password (clear text)</strong><br /><br />
      <input type="text" name="passwd" value="admin" /><br />
      <input type="submit" value=" Reset PWD " />
    </form>
<?php
	}
?>
  </center>
</body>
</html>
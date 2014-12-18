<?php
	// creates a new advertisement using information from the previous form

	db_connect();

	$site = db_secure($_POST['site']);
	$category = db_secure($_POST['category']);
	$url = db_secure($_POST['url']);
	$image = db_secure($_POST['image']);
	$alt = db_secure($_POST['alt']);

	if ( !$site | !$category | !$url | !$image | !$alt ) {
		error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Back">here</a> to return.');
	}

	db_query("INSERT INTO content_ads (site,category,url,image,alt,hits) VALUES ('$site','$category','$url','$image','$alt','0')");
	db_close();
?>
  The advertisement was successfully added to the database. Click <a href="index.php?action=content&content=ads" title="Advertisements">here</a> to return.
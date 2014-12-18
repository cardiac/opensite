<?php
	// modifies the advertisement with the information from the previous form

	db_connect();

	$site = db_secure($_POST['site']);
	$category = db_secure($_POST['category']);
	$url = db_secure($_POST['url']);
	$image = db_secure($_POST['image']);
	$alt = db_secure($_POST['alt']);

	if ( !$site | !$category | !$url | !$image | !$alt ) {
		error('You did not fill in a required field. Click <a href="index.php?action=content&amp;content=ads_modify">here</a> to return.');
	}

	db_query("UPDATE content_ads SET site='$site',category='$category',url='$url',image='$image',alt='$alt' WHERE id=$id");

	db_close();
?>
  Advertisement modified successfully. Click <a href="index.php?action=content&content=ads">here</a> to return.
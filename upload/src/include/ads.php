<?php
	$db_result = db_query('SELECT * FROM content_ads');

	srand(time());
	$db_count = db_num_rows($db_result);
	$db_count = rand(1,$db_count);

	$db_result = db_query("SELECT * FROM content_ads WHERE id = '$db_count'");
	$db_result = db_fetch_array($db_result);

	$alt = $db_result['alt'];
	$image = $db_result['image'];
	$site = $db_result['site'];
	$url = $db_result['url'];

	$final_ad = "<a href=\"$url\" title=\"$site\" target=\"_blank\"><img src=\"$image\" class=\"advertisement\" title=\"$site\" alt=\"$alt\" border=\"0\" /></a>";

	$layout = str_replace('{advertisement}', $final_ad, $layout);
?>
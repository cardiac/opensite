<?php
	session_start();
	header('Cache-control: private');
	header("Content-Type: image/jpeg");

	$rand = $_SESSION['rand'];

	$image = 'img.jpg';
	$im = imagecreatefromjpeg($image);
	$tc = imagecolorallocate($im, 0, 0, 0);
	imagestring($im, 60, 60, 40, $rand, $tc);
	imagejpeg($im,'',100);
	imagedestroy ($im);
?>
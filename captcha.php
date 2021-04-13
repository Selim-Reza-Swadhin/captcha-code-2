<?php
session_start();
//$str_rand = md5(rand());
$str_rand = strtoupper(sha1(md5(rand())));
$str = substr($str_rand, 0, 6);
//echo $str;
$_SESSION['captcha'] = $str;
$newImage = imagecreate(100, 30);
imagecolorallocate($newImage, 220, 160, 120);
$captcha_text_color = imagecolorallocate($newImage, 0, 0, 0);
imagestring($newImage, 5, 5, 5, $str, $captcha_text_color);
header('Content-Type:image/jpeg');
imagejpeg($newImage);
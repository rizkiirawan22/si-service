<?php
session_start();
$captcha = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 1);
$_SESSION['captcha'] = $captcha;

$gambar = imageCreate(80, 40);
$wk = imageColorAllocate($gambar, 128, 128, 128);
$wt = imageColorAllocate($gambar, 0, 0, 0);

imagestring($gambar, 64, 10, 10, $captcha, $wt);
imagejpeg($gambar);
?>
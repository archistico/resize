<?php
//header('Content-Type: image/jpeg');
$coverImage = ImageCreateFromJPEG('photo.jpg');
ImageAlphaBlending($coverImage, true);

$ombreImage = ImageCreateFromPNG('logo.png');
$logoW = ImageSX($ombreImage);
$logoH = ImageSY($ombreImage);

$coverX = imagesx($coverImage);
$coverY = imagesy($coverImage);

$ombreX = imagesx($ombreImage);
$ombreY = imagesy($ombreImage);

$w1 = max(min($ombreX, $coverX), $coverX);
$h1 = max(min($ombreY, $ombreY), $ombreY);

$w_using_h1 = round($h1 * $ombreX / $ombreY);
$h_using_w1 = round($w1 * $ombreY / $ombreX);


ImageCopy($coverImage, $ombreImage, 0, 0, 0, 0, $logoW, $logoH);
ImageJPEG($coverImage, 'final.jpg', 100); // output to browser

ImageDestroy($coverImage);
ImageDestroy($ombreImage);

// multiple upload
// https://www.formget.com/upload-multiple-images-using-php-and-jquery/
?>

<img src="final.jpg"/>
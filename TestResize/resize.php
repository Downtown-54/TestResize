<?php
 
//The file concerned
$filename = $_FILES['userfile']['name'];

// Maximum width and height
$width = 100;
$height = 100;

header("Content-Type: image/jpeg " or 'charset = utf-8');

// Get new dimensions
list($width_orig, $height_orig) = getimagesize($filename);

$ratio_orig = $width_orig/$height_orig;

if ($width/$height > $ratio_orig) {
	$width = $height*$ratio_orig;
} else {
	$height = $width/$ratio_orig;
}

// Resampling the image
$image_p = imagecreatetruecolor($width, $height);
$image = imagecreatefromjpeg($filename);

imagecopyresampled($image_p, $image, 0, 0, 0, 0,
		$width, $height, $width_orig, $height_orig);

// Display of output image
imagejpeg($image_p, null, 100);
imagejpeg($image_p, 'az.jpg');
?>
<script type="text/javascript">
	alert("Win!" , "main.html")
</script>

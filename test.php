<!DOCTYPE html>
<meta charset="utf-8">

<a href="component+test.html">Go to the pure HTML implementation...</a><hr>

<?php
function DOM($mode, $img_url)
{
	$ieh = ($mode == 'popup' ? " onmousemove='popup_zoom(event)'" : "");
	$feh = ($mode == 'popup' ? "" : " onmousemove='zoom(event)'");
	return ""
		. "<div class='zoomable $mode'>"
		. "<img class='thumb' src='$img_url'" . $ieh . ">"
		. "<figure class='zoom' style='background-image: url($img_url)'" . $feh . ">"
		.	"<img src='$img_url'>"
		. "</figure>"
		. "<div class='mag'></div>"
		. "</div>" // no '\n', as that would be rendered as visible spacing!
	;
}

function zoomable_img($img_url, $mode = 'popup')
{
	static $onceonly_stuff = false;
	if (!$onceonly_stuff) {
	     $onceonly_stuff = true;
	     print @file_get_contents("classic.html");
	}

	print DOM($mode, $img_url);
}


$img = "example.jpg";
zoomable_img($img, 'basic');
zoomable_img($img, 'inplace');
zoomable_img($img, 'popup');
echo "<hr>";
zoomable_img($img, 'basic');	echo " ";
zoomable_img($img, 'inplace');	echo " ";
zoomable_img($img, 'popup');	echo " ";
echo "<hr>";
zoomable_img($img, 'basic');	echo "<hr>";
zoomable_img($img, 'inplace');	echo "<hr>";
zoomable_img($img, 'popup');	echo "<hr>";

<?php

function zoomable_img($img_url, $mode = 'popup')
{
	static $onceonly_stuff = false;
	
	if (!$onceonly_stuff) {
	     $onceonly_stuff = true;
	     print @file_get_contents("zoomer.html");
	}

	switch ($mode)
	{
	case 'inplace':
		print ""
			. "<div class='zoomable $mode'>"
			// This invisible image is only needed for dimensioning the thumbnail:
			. "<img class='thumb' src='$img_url'>" //! overlapped by `FIGURE` while zooming/panning
			. "<figure class='zoom' style='background-image: url($img_url)' onmousemove='zoom(event)'>"
				// This img. guides the aspect-ratio when resizing `FIGURE`, and provides the idle view:
			.	"<img src='$img_url'>"
			. "<div class='mag'></div>"
			. "</figure>"
			. "</div>"
		;
		break;
	case 'popup':
		print ""
			. "<div class='zoomable $mode'>"
			. "<img class='thumb' src='$img_url' onmousemove='popup_zoom(event)'>"
			. "<figure class='zoom' style='background-image: url($img_url)'>"
				// This invisible img only exists to guide the aspect-ratio when resizing the FIGURE:
			.	"<img src='$img_url'>"
			. "</figure>"
			. "<div class='mag'></div>"
			. "</div>"
		;
		break;
	case 'basic':
		print ""
			. "<div class='zoomable $mode'>"
			. "<figure class='zoom' style='background-image: url($img_url)' onmousemove='zoom(event)'>"
			.	"<img src='$img_url'>"
			. "<div class='mag'></div>"
			. "</figure>"
			. "</div>"
		;
		break;
	}
}

$img = "example.jpg";
zoomable_img($img, 'inplace');
zoomable_img($img, 'popup');
zoomable_img($img, 'basic');
echo "<hr>";
zoomable_img($img, 'inplace');	echo " ";
zoomable_img($img, 'popup');	echo " ";
zoomable_img($img, 'basic');	echo " ";
echo "<hr>";
zoomable_img($img, 'inplace');	echo "<hr>";
zoomable_img($img, 'popup');	echo "<hr>";
zoomable_img($img, 'basic');	echo "<hr>";

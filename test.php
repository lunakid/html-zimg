<!DOCTYPE html>
<meta charset="utf-8">

<a href="test-oldstyle.php">Go to the old-style PHP-infested implementation...</a><hr>

<!--- TEST... ---------------------------------------------------------------->
<?php print file_get_contents('component.html'); //!!?? This still isn't solved with WHATWG's HTML?! ?>

<style> h4 { margin: 1ex 0; text-decoration: none; font-family: Arial Narrow, Arial; }

z-img.spaced { background: red; /*!!DEBUG!!*/

	margin: 2px 0.25ex;
}
z-img.block { background: yellow; /*!!DEBUG!!*/

	display: block;
	--thumb-w: 50px;
}
z-img.big {
	--thumb-w: 200px;
	/*--zoomv-w: 25%;*/
	--zoomv-w: 1000px;
}
z-img.framed {
	border: 2px solid pink;
	margin: 0;
	
	--zoomv-border-w: 2px;
	--zoomv-border-c: green;
	--zoomv-border-s: solid;
	--zoomv-border-r: 5px;
}
</style>

<h4> All defaults (thumb width likely 100px, zoom width ~500px), some explicit margin </h4>
        <z-img zoom="basic"   class="basic spaced"   src="img/example.jpg">BASIC in-place mode
</z-img><z-img zoom="inplace" class="inplace spaced" src="img/example.jpg">IN-PLACE mode
</z-img><z-img zoom="popup"   class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img><z-img zoom="basic"   class="basic spaced"   src="img/example.jpg">BASIC in-place mode
</z-img><z-img zoom="inplace" class="inplace spaced" src="img/example.jpg">IN-PLACE mode
</z-img><z-img zoom="popup"   class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img><z-img zoom="basic"   class="basic spaced"   src="img/example.jpg">BASIC in-place mode
</z-img><z-img zoom="basic"   class="popup spaced"   src="img/example.jpg">BASIC in-place mode
</z-img><z-img zoom="inplace" class="inplace spaced" src="img/example.jpg">in-place mode
</z-img><z-img zoom="inplace" class="inplace spaced" src="img/example.jpg">in-place mode
</z-img><z-img zoom="inplace" class="inplace spaced" src="img/example.jpg">in-place mode</z-img>
<br>    <z-img zoom="popup"   class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img><z-img zoom="popup"   class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img><z-img zoom="popup"   class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img><z-img zoom="popup"   class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img><z-img zoom="popup"   class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img><z-img zoom="popup"   class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img>
<hr>

<h4> Block mode, small thumbs (50px), no margin </h4>
        <z-img zoom="basic"   class="basic block"   src="img/example.jpg">BASIC in-place mode
</z-img><z-img zoom="inplace" class="inplace block" src="img/example.jpg">IN-PLACE mode
</z-img><z-img zoom="popup"   class="popup block"   src="img/example.jpg">POPUP mode</z-img>
<hr>

<h4> 200px thumb width, variable heights; 1000px zoom width </h4>
<p> EXPECTED: panning disabled for images < 1000px, full-size images stretched to fill the zoom view </p>
<z-img zoom="basic"   class="basic big"   src="img/martinet-gh.jpg">BASIC in-place mode</z-img>
<z-img zoom="popup"   class="inplace big" src="img/martinet-toad.jpg">IN-PLACE mode</z-img>
<z-img zoom="popup"   class="popup big"   src="img/martinet-wasp.jpg">POPUP mode</z-img>
<hr>

<h4> Default thumb width, h, 300px zoom width, NO explicit margin </h4>
<p> NOTE: Some mysterious margin used to be there, which suddenly disappeared by some change, only to reappear again...:-o </p>
        <z-img zoom="basic"   class="basic framed"   src="img/martinet-gh.jpg">BASIC in-place mode
</z-img><z-img zoom="inplace" class="inplace framed" src="img/martinet-toad.jpg">IN-PLACE mode</z-img>
<hr>
		<z-img zoom="popup"   class="popup framed"   src="img/martinet-wasp.jpg">POPUP mode</z-img>
<hr>

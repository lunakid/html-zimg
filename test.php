<!DOCTYPE html>
<meta charset="utf-8">

<!--a href="test-oldstyle.php">Go to the old-style PHP-infested implementation...</a><hr-->

<style>
h4 { margin: 1ex 0; text-decoration: none; font-family: Arial Narrow, Arial; }
p { margin: 1ex 0; }
ol { padding-left: 1em; }
</style>

<!--- TEST... ---------------------------------------------------------------->
<?php print file_get_contents('component.html'); //!!?? This still isn't solved with WHATWG's HTML?! ?>

<style>
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
<ol>

<li>
<h4> All defaults </h4>
<p> EXPECTED: popup mode,  thumb width ~100px, zoom width ~500px, 1px grey borders </p>
<z-img src="img/example.jpg">
<hr>

<li>
<h4> Explicitly set modes </h4>
<p> EXPECTED: basic, inplace, popup modes (in this order). And no space between them. </p>
		<z-img class="basic"   src="img/example.jpg">
</z-img><z-img class="inplace" src="img/example.jpg">
</z-img><z-img class="popup"   src="img/example.jpg"></z-img>

<li>
<h4> All defaults (but various modes), with some explicit margin (0.25ex) </h4>
<p> EXPECTED: thumb width ~100px, zoom width ~500px, 1px grey borders, even spacing </p>
        <z-img class="basic spaced"   src="img/example.jpg">BASIC in-place mode
</z-img><z-img class="inplace spaced" src="img/example.jpg">IN-PLACE mode
</z-img><z-img class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img><z-img class="basic spaced"   src="img/example.jpg">BASIC in-place mode
</z-img><z-img class="inplace spaced" src="img/example.jpg">IN-PLACE mode
</z-img><z-img class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img><z-img class="basic spaced"   src="img/example.jpg">BASIC in-place mode
</z-img><z-img class="popup spaced"   src="img/example.jpg">BASIC in-place mode
</z-img><z-img class="inplace spaced" src="img/example.jpg">in-place mode
</z-img><z-img class="inplace spaced" src="img/example.jpg">in-place mode
</z-img><z-img class="inplace spaced" src="img/example.jpg">in-place mode</z-img>
<br>    <z-img class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img><z-img class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img><z-img class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img><z-img class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img><z-img class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img><z-img class="popup spaced"   src="img/example.jpg">POPUP mode
</z-img>
<hr>

<li>
<h4> Block mode, small thumbs (50px), no margin </h4>
<p> EXPECTED: yellow full-width stripes (as box bgnd.), magnifier icon within the thumbnail rect. </p>
        <z-img class="basic block"   src="img/example.jpg">BASIC in-place mode
</z-img><z-img class="inplace block" src="img/example.jpg">IN-PLACE mode
</z-img><z-img class="popup block"   src="img/example.jpg">POPUP mode</z-img>
<hr>

<li>
<h4> 200px thumb width, variable heights; 1000px zoom width </h4>
<p> EXPECTED: panning disabled for images < 1000px, full-size images stretched to fill the zoom view </p>
<z-img class="basic big"   src="img/martinet-gh.jpg">BASIC in-place mode</z-img>
<z-img class="inplace big" src="img/martinet-toad.jpg">IN-PLACE mode</z-img>
<z-img class="popup big"   src="img/martinet-wasp.jpg">POPUP mode</z-img>
<hr>

<li>
<h4> Default thumb/zoom width, default zero margin, custom border, magnif. icon restyle </h4>
<p> EXPECTED: 2px pink border, neither horiz. nor vert. space between the images,
	mag. icon: green for the grassh., pink for the toad, yellow for the wasp,
	and the magnifier is darker grey for the latter two.
<br> Also: an ugly 2px green, rounded frame around the zoom view. </p>
<!--p> NOTE: Some mysterious margin used to be there, which suddenly disappeared by some change, only to reappear again...:-o
	But that was just the linefeeds between the tags!</p-->

		<z-img class="inplace framed" src="img/martinet-toad.jpg"
			style="--magicon-bg: pink; --magicon-c: black; --magicon-op: 0.5;">>IN-PLACE mode
</z-img><z-img class="basic framed"   src="img/martinet-gh.jpg"
			style="--magicon-bg: lightgreen; --magicon-c: black;">BASIC in-place mode
</z-img>
<br>	<z-img class="popup framed"   src="img/martinet-wasp.jpg"
			style="--magicon-bg: yellow; --magicon-c: black; --magicon-op: 0.5;">POPUP mode</z-img>
<hr>
</ol>
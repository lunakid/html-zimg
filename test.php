<!DOCTYPE html>
<meta charset="utf-8">

<a href="test-oldstyle.php">Go to the old-style PHP-infested implementation...</a><hr>

<!--- TEST... ---------------------------------------------------------------->
<?php print file_get_contents('component.html'); //!!?? This still isn't solved with WHATWG's HTML?! ?>

<style>
z-img {
	border: 4px solid pink;
	margin: 2px 0.5ex;
}
</style>

        <z-img zoom="basic"   class="basic"   src="img/example.jpg">BASIC in-place mode
</z-img><z-img zoom="inplace" class="inplace" src="img/example.jpg">IN-PLACE mode
</z-img><z-img zoom="popup"   class="popup"   src="img/example.jpg">POPUP mode</z-img>

<hr>

<z-img zoom="basic"   class="basic"   src="img/example.jpg">BASIC in-place mode</z-img>
<z-img zoom="inplace" class="inplace" src="img/example.jpg">IN-PLACE mode</z-img>
<z-img zoom="popup"   class="popup"   src="img/example.jpg">POPUP mode</z-img>
<hr>

<z-img zoom="basic"   class="basic"   src="img/martinet-gh.jpg">BASIC in-place mode</z-img>
<hr>
<z-img zoom="inplace" class="inplace" src="img/martinet-toad.jpg">IN-PLACE mode</z-img>
<hr>
<z-img zoom="popup"   class="popup"   src="img/martinet-wasp.jpg">POPUP mode</z-img>
<hr>

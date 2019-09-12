Web component (custom element) 'Z-IMG'
======================================

Simple image (thumbnail) element with autozoom + panning


Most importantly:
-----------------

The example images are [Édouard Martinet](http://www.edouardmartinet.fr/)'s amazing metallic animal sculptures.


Usage
-----

Get the component's HTML template (`component.htpl`) and the corresponding JS file
somehow loaded/merged into your page (by whatever means available in your setup;
see `test.html` for a crude example of how it can be done manually, in pure JS),
and then just do

    <z-img src="url"></z-img>

or, optionally:

    <z-img src="url" class="inplace"></z-img>

in the HTML, for stuff like this (cropped from the test page):

  ![screenshot](https://github.com/lunakid/html-zimg/blob/master/img/screenshot.gif)


How does it work + Supported modes
----------------------------------

The idea is auto-opening a magnifier view (an extra DOM element) for "zooming into"
the full-size image, when hovering over its thumbnail. If the image does not fit the
zoom view, it's also panned (as a background image, repositioned by `mousemove`
events).

(Note: "zooming" is a bit of a misnomer now, as there's just a fixed-size magnifier
yet...)

Since the HTML specs doesn't provide a nice way to set custom attributes of an
element (but the ridiculously lame `data-` prefix), let's use the `class` attr.
to select zoom/pan mode -- after all, the differences are mostly of appearance,
and they are implemented (mostly) via class-selected CSS rules anyway. (And, BTW,
element classes are not inherently CSS-only anyway, despite that being their main
practical role today.)

Basic in-place (`basic`):

	The simplest, and least useful mode, where the magnified image simply replaces
	the thumbnail view, and is part of the normal content flow, therefore it will
	also change the page layout on zooming, pushing content away to make room.

	(The's an unused, invisible, extra dummy thumbnail image in this mode, solely
	to support a uniform DOM structure, shared by all the different modes.)
	

In-place (`inplace`):

	Unlike the basic in-place mode, the magnified view that replaces the thumbnail
	on hover will *not* change the page layout (essentially acting like a popup overlay).

	The thumbnail img is only needed for sizing the widget (as the thumbnail),
	because the zoom overlay element is `absolute`-positioned, taking up no space.
	
	The thumbnail img. will be overlapped by the zoom view both while zooming/panning,
	and also when idle, to provide the (reset) thumbnail view.
	
	(A full-size img. in the zoom view element will also guide the aspect-ratio for
	resizing.)

Popup (`popup`, the default):

	The zoom view is a "popup" overlay, distinct from the thumbnail, where the
	the panning occurs. (So, the `mousemove` handler is attached to the thumbnail,
	not the zoom view.)

	(A full-size img. in the zoom view element will guide the aspect-ratio only
	for resizing, but it's always hidden.)


Compatiblity
------------

Tested and works OK on:
	Chrome
	FF (except for issues with closing the zoom view)
	Android 6-7 (except for no panning with touch).

No support in IE11. (Edge has not yet been tested.)
 
See the TODO section in CHANGES.txt for known issues.

<z-img> web component (v0.2)

Versatile image thumbnail element with pannable autozoom


Most importatntly...
--------------------

The example images are Édouard Martinet's amazing metallic animal sculptures.


Supported modes
---------------

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

	The extra thumbnail image in the DOM is a dummy, unused, invisible element,
	solely to support a uniform DOM structure.
	

In-place (`inplace`):

	Unlike the basic in-place mode, the magnified view that replaces the thumbnail
	on hover will *not* change the page layout (essentially acting like a popup overlay).

	The thumbnail img is only needed for sizing the widget (as the thumbnail),
	because the zoom overlay element is `absolute`-positioned, taking up no space.
	
	The thumbnail img. will be overlapped by the zoom view both while zooming/panning,
	and also when idle, providing the (reset) thumbnail view.
	
	The full-size img. in the `FIGURE` element will guide the aspect-ratio when
	resizing.

Popup (`popup`, the default):

	The zoom view is a "popup" overlay that is *distinct* from the thumbnaiil,
	where all the panning occurs. (So, the event handler is attached to the thumb,
	not the zoom view.)

	The full-size image embedded in the `FIGURE` element is always hidden:
	the background image will be used for zooming/panning instead.
	It only exists to guide the aspect-ratio when resizing the `FIGURE`.


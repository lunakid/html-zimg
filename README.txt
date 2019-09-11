The example images are Édouard Martinet's amazing metallic animal sculptures.


Supported modes
---------------

Basic in-place:

	The simplest, and least useful mode, where the magnified image simply replaces
	the thumbnail view, and is part of the normal content flow, therefore it will
	also change the page layout on zooming, pushing content away to make room.

	The extra thumbnail image in the DOM is a dummy, unused, invisible element,
	solely to support a uniform DOM structure.
	

In-place:

	Unlike the basic in-place mode, the magnified view that replaces the thumbnail
	on hover will *not* change the page layout (essentially acting like a popup overlay).

	The thumbnail img is only needed for sizing the widget (as the thumbnail),
	because the zoom overlay element is `absolute`-positioned, taking up no space.
	
	The thumbnail img. will be overlapped by the zoom view both while zooming/panning,
	and also when idle, providing the (reset) thumbnail view.
	
	The full-size img. in the `FIGURE` element will guide the aspect-ratio when
	resizing.

Popup:

	The zoom view is a "popup" overlay that is *distinct* from the thumbnaiil,
	where all the panning occurs. (So, the event handler is attached to the thumb,
	not the zoom view.)

	The full-size image embedded in the `FIGURE` element is always hidden:
	the background image will be used for zooming/panning instead.
	It only exists to guide the aspect-ratio when resizing the `FIGURE`.


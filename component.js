customElements.define('z-img', class extends HTMLElement {
	constructor() {
		super();

		// Attributes are generally not available in the ctor!
		//console.log("zimg ctor, this.classList=" + this.classList);

		this.tpl = document.getElementById('zoomable-img').content;  
		this.shdom = this.attachShadow({mode: 'open'});
		this.shdom.appendChild(this.tpl.cloneNode(true));

		//console.log("zimg ctor: " + this.shdom)
	}
	
	connectedCallback() {
		//console.log("zimg connect: this.classList=" + this.classList
		//	+ ", src=" + this.getAttribute('src'));

		// Make sure a known mode is set (falling back to a default):
		const cl = this.classList;
		if (! (cl.contains('basic') || cl.contains('inplace') || cl.contains('popup')) )
			cl.add('popup');

		const src = this.getAttribute('src');
		const thumb = this.shdom.getElementById('thumb');
		const large = this.shdom.getElementById('large');
		const zoomv = this.shdom.getElementById('zoomview');
		
		// Set the 'src' img URL where needed:
		thumb.setAttribute('src', src);
		large.setAttribute('src', src);
		zoomv.style = 'background-image: url(' + src + ')';
		
		// Setup the event handlers:
		if (cl.contains('popup')) {
			thumb.onmousemove = this.popup_zoom.bind(this);
		} else {
			zoomv.onmousemove = this.zoom.bind(this);
		}
	}

	zoom(e)       { this.zoompanner(e, e.currentTarget, e.currentTarget); }
	popup_zoom(e) { this.zoompanner(e, e.currentTarget, e.currentTarget.nextElementSibling); }

	zoompanner(e, zoompad, zoomview) {
		const img = zoomview.getElementsByTagName('img')[0];
		if (img.naturalHeight < img.height || img.naturalWidth < img.width) {
		    zoomview.style.backgroundSize = 'cover';
		    return;
		}
		let offsetX = e.offsetX !== null ? e.offsetX : e.touches[0].pageX;
		let offsetY = e.offsetY !== null ? e.offsetY : e.touches[0].pageY;
		//console.log("X=" + offsetX + ", Y=" + offsetY);
		let x = offsetX / zoompad.offsetWidth * 100
		let y = offsetY / zoompad.offsetHeight * 100
		// Yes, it did go to negative at the edges (depending on the cursor?), causing wraparound of the bg img...:
		if (x < 0) x = 0;
		if (y < 0) y = 0;
		//console.log(zoomview.style.backgroundPosition + " --> " + "zbX=" + x + ", zbY=" + y);
		zoomview.style.backgroundPosition = x + '% ' + y + '%';
	}
});

//function test() { alert("OK"); console.log("OK"); }

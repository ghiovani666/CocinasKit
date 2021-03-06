(function (c) {
	function b(e, d) {
		return (typeof e == "function") ? (e.call(d)) : e
	}
	function a(e, d) { this.$element = c(e); this.options = d; this.enabled = true; this.fixTitle() } a.prototype = {
		show: function () {
			var g = this.getTitle(); if (g && this.enabled) {
				var f = this.tip();
				f.find(".tipsy-inner")[this.options.html ? "html" : "text"](g);
				f[0].className = "tipsy"; f.remove().css({ top: 0, left: 0, visibility: "hidden", display: "block" }).prependTo(document.body);
				var j = c.extend({}, this.$element.offset(), { width: this.$element[0].offsetWidth, height: this.$element[0].offsetHeight });
				var d = f[0].offsetWidth, i = f[0].offsetHeight, h = b(this.options.gravity, this.$element[0]);
				var e; switch (h.charAt(0)) {
					case "n": e = {
						top: j.top + j.height + this.options.offset, left: j.left + j.width / 2 - d / 2
					};
						break; case "s": e = { top: j.top - i - this.options.offset, left: j.left + j.width / 2 - d / 2 };
						break; case "e": e = { top: j.top + j.height / 2 - i / 2, left: j.left - d - this.options.offset };
						break; case "w": e = { top: j.top + j.height / 2 - i / 2, left: j.left + j.width + this.options.offset };
						break
				}if (h.length == 2) {
					if (h.charAt(1) == "w") {
						e.left = j.left + j.width / 2 - 15
					} else { e.left = j.left + j.width / 2 - d + 15 }
				} f.css(e).addClass("tipsy-" + h); f.find(".tipsy-arrow")[0].className = "tipsy-arrow tipsy-arrow-" + h.charAt(0);
				if (this.options.className) { f.addClass(b(this.options.className, this.$element[0])) }
				if (this.options.fade) {
					f.stop().css({ opacity: 0, display: "block", visibility: "visible" }).animate({ opacity: this.options.opacity })
				} else { f.css({ visibility: "visible", opacity: this.options.opacity }) }
			}
		},
		hide: function () {
			if (this.options.fade) {
				this.tip().stop().fadeOut(function () { c(this).remove() })
			} else { this.tip().remove() }
		}, fixTitle: function () {
			var d = this.$element;
			if (d.attr("title") || typeof (d.attr("original-title")) != "string") { d.attr("original-title", d.attr("title") || "").removeAttr("title") }
		}, getTitle: function () {
			var f, d = this.$element, e = this.options;
			this.fixTitle(); var f, e = this.options; if (typeof e.title == "string") {
				f = d.attr(e.title == "title" ? "original-title" : e.title)
			} else { if (typeof e.title == "function") { f = e.title.call(d[0]) } } f = ("" + f).replace(/(^\s*|\s*$)/, "");
			return f || e.fallback
		}, tip: function () { if (!this.$tip) { this.$tip = c('<div class="tipsy"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"></div>') } return this.$tip }, validate: function () {
			if (!this.$element[0].parentNode) {
				this.hide();
				this.$element = null; this.options = null
			}
		}, enable: function () { this.enabled = true }, disable: function () { this.enabled = false }, toggleEnabled: function () { this.enabled = !this.enabled }
	}; 
	
	c.fn.tipsy = function (h) {
		if (h === true) { return this.data("tipsy") } else {
			if (typeof h == "string") { var j = this.data("tipsy"); if (j) { j[h]() } return this }
		} h = c.extend({}, c.fn.tipsy.defaults, h);
		function g(l) {
			var m = c.data(l, "tipsy"); if (!m) { m = new a(l, c.fn.tipsy.elementOptions(l, h)); c.data(l, "tipsy", m) }
			return m
		} function k() {
			var l = g(this); l.hoverState = "in"; if (h.delayIn == 0) {
				l.show()
			} else { l.fixTitle(); setTimeout(function () { if (l.hoverState == "in") { l.show() } }, h.delayIn) }
		}
		function f() {
			var l = g(this); l.hoverState = "out"; if (h.delayOut == 0) { l.hide() } else {
				setTimeout(function () {
					if (l.hoverState == "out") { l.hide() }
				}, h.delayOut)
			}
		} if (!h.live) { this.each(function () { g(this) }) }
		if (h.trigger != "manual") { var d = h.live ? "live" : "bind", i = h.trigger == "hover" ? "mouseenter" : "focus", e = h.trigger == "hover" ? "mouseleave" : "blur"; this[d](i, k)[d](e, f) } return this
	};
	c.fn.tipsy.defaults = { className: null, delayIn: 0, delayOut: 0, fade: false, fallback: "", gravity: "n", html: false, live: false, offset: 0, opacity: 0.8, title: "title", trigger: "hover" }; c.fn.tipsy.elementOptions = function (e, d) {
		return c.metadata ? c.extend({}, d, c(e).metadata()) : d
	}; c.fn.tipsy.autoNS = function () { return c(this).offset().top > (c(document).scrollTop() + c(window).height() / 2) ? "s" : "n" }; c.fn.tipsy.autoWE = function () {
		return c(this).offset().left > (c(document).scrollLeft() + c(window).width() / 2) ? "e" : "w"
	}; c.fn.tipsy.autoBounds = function (e, d) {
		return function () {
			var f = { ns: d[0], ew: (d.length > 1 ? d[1] : false) }, i = c(document).scrollTop() + e, g = c(document).scrollLeft() + e, h = c(this); if (h.offset().top < i) { f.ns = "n" }
			if (h.offset().left < g) { f.ew = "w" } if (c(window).width() + c(document).scrollLeft() - h.offset().left < e) { f.ew = "e" } if (c(window).height() + c(document).scrollTop() - h.offset().top < e) { f.ns = "s" } return f.ns + (f.ew ? f.ew : "")
		}
	}
})(jQuery); 

var ckoInitialCommonInfo = JSON.parse(cko_cookie_info);
var cko_colorInteriorMueble = ckoInitialCommonInfo.cko_colorInteriorMueble;
var cko_colorAcabadoPuerta = ckoInitialCommonInfo.cko_colorAcabadoPuerta; 
var cko_canto = ckoInitialCommonInfo.cko_canto;
var cko_modeloTirador = ckoInitialCommonInfo.cko_modeloTirador; var timer; $(document).ready(function () {

	$(".attribute_list li a").tipsy({ gravity: 'sw', fade: true, delayIn: 300, live: true, offset: 0 });

	$(".cocinakit_help_icon").tipsy({
		gravity: 'w', fade: true, html: true, opacity: 1, trigger: 'manual', title: function () {
			return $(this).parent().parent().find('p.cocinakit_help_text').html();
		}
	});

	$('.tipsy').live('mouseover', function (e) { clearTimeout(timer); }); 
	$('.tipsy').live('mouseout', function (e) { timer = setTimeout("$('.tipsy').hide();", 500); }); 
	$('.cocinakit_help_icon').bind('mouseover', function (e) { clearTimeout(timer); $(this).tipsy('show'); });
	$('.cocinakit_help_icon').bind('mouseout', function (e) { timer = setTimeout("$('.tipsy').hide();", 500); });
	 $(".color_pick").on('dblclick', function (e) {
		var img_src = $(this).find('img').attr('src'); var img_ext = img_src.split('.').pop(); img_src = img_src.replace(/\.[^/.]+$/, "")
		var img_alert_url = img_src + "_ayuda_lang" + id_lang + "." + img_ext; $.fancybox({ 'href': img_alert_url });
	});
	// $("#ver_3D_full").fancybox({ 'scrolling': 'no', 'titleShow': false, 'beforeLoad': function () { cocinakit_visor3D_full_show(); }, 'afterClose': function () { cocinakit_visor3D_full_close(); } }); 
	$('#color_interior_mueble' + cko_colorInteriorMueble).parent().addClass('selected');
	$('#color_acabado_puerta' + cko_colorAcabadoPuerta).parent().addClass('selected');
	// material_puerta = cko_colorAcabadoPuerta; 
	$('#canto' + cko_canto).parent().addClass('selected');
	$('#modelo_tirador' + cko_modeloTirador).parent().addClass('selected');
	$('#cocinakit_composicion_mueble').on('change', function (e) { e.preventDefault(); location.href = $(this).val(); });
});





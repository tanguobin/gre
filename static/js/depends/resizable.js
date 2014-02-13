/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-2-17
 * Time: 下午2:11
 * Email: tanguobin@duokan.com
 * Description: resizable
 */

/**
 *  @require Jquery
 *
 *  @example
 *      $('#id').resizable(conf)
 *
 */

/**
 * 给指定的DOM元素添加resizable支持
 * @public
 * @param          {Object}        options               选项参数
 * @config         {Number}        maxHeight             DOM元素的最大高度
 * @config         {Number}        maxWidth              DOM元素的最大宽度
 * @config         {Number}        minHeight             DOM元素的最小高度
 * @config         {Number}        minWidth              DOM元素的最小高度
 * @config         {Function}      onStartResize         开始resize之前触发调用的方法
 * @config         {Function}      onResize              开始resize时触发调用的方法
 * @config         {Function}      onStopResize          停止resize时触发调用的方法
 */
;(function ($) {
	var Resizable = function (el, opts) {
		var $this = $(el);
		$.extend(this, {
			disabled : function (e) {
				$this.find(".resizable").remove();
			}
		});
		init();
		function init () {
			$this.css("position", "absolute");
			var place = $this.offset();
			var handle = opts.handles;
			for ( var i = 0; i < handle.length; i++) {
				var direction = $("<div></div>").appendTo($this);
				var cpos = {
					position : "absolute",
					display : "block",
					"-moz-user-select" : "none",
					"font-size" : "0.1px"
				};
				if (handle[i] == "e") {
					cpos.top = 0;
					cpos.right = -5;
					cpos.width = 7;
					cpos.height = "100%";
				} else if (handle[i] == "s") {
					cpos.bottom = -5;
					cpos.left = 0;
					cpos.width = "100%";
					cpos.height = 7;
				} else if (handle[i] == "se") {
					cpos.right = 1;
					cpos.bottom = 1;
					cpos.width = 7;
					cpos.height = 7;
					direction.css({
						"border-right" : "1px solid #888",
						"border-bottom" : "1px solid #888"
					});
				}
				cpos.cursor = handle[i] + "-resize";
				direction.attr("id", handle[i]);
				direction.attr("unselectable", "on");
				direction.css(cpos);
				direction.addClass("resizable");
				direction.bind("mousedown", {
					dir : handle[i]
				}, start);

			}
		}
		function start (e) {
            // start resize
			opts.onStartResize.call($this, e);
			var data = {
				target : $this,
				dir : e.data.dir,
				startLeft : getCss("left"),
				startTop : getCss("top"),
				left : getCss("left"),
				top : getCss("top"),
				startX : e.pageX,
				startY : e.pageY,
				startWidth : $this.outerWidth(),
				startHeight : $this.outerHeight(),
				width : $this.outerWidth(),
				height : $this.outerHeight(),
				deltaWidth : $this.outerWidth() - $this.width(),
				deltaHeight : $this.outerHeight() - $this.height()
			};
			$("body").css("cursor", data.dir + "-resize");
			if (opts.helper) {
				var ghost = $("<div></div>").appendTo($this);
				ghost.attr("id", "ghost");
				ghost.css({
					position : "absolute",
					"font-size" : 0.1,
					display : "none",
					"-moz-user-select" : "none",
					"border" : "1px solid red",
					width : $this.width(),
					height : $this.height(),
					left : -1,
					top : -1
				});
				ghost.css(opts.helperStyle);
				data.target = ghost;
			}
			$(document).bind("mousemove", data, resize);
			$(document).bind("mouseup", data, stop);
		}
		function resize (e) {
			var data = e.data;
			data.target.css("display", "block");
			if (data.dir.indexOf("e") != -1) {
				var w = data.startWidth + e.pageX - data.startX
						- data.deltaWidth;
				w = opts.maxWidth ? Math.min(Math.max(w, opts.minWidth), opts.maxWidth) : Math.max(w, opts.minWidth);
				data.width = w;
				data.target.css("width", w);
			}
			if (data.dir.indexOf("s") != -1) {
				var h = data.startHeight + e.pageY - data.startY
						- data.deltaHeight;
				h = opts.maxHeight ? Math.min(Math.max(h, opts.minHeight), opts.maxHeight) : Math.max(h, opts.minHeight);
				data.height = h;
				data.target.css("height", h);
			}
            // call on resize
			opts.onResize.call(data.target, e);
		}
		function stop (e) {
			$("body").css("cursor", "auto");
			if (opts.helper) {
				var ghost = $this.find("#ghost");
				$this.css({
					width : e.data.width - e.data.deltaWidth,
					height : e.data.height - e.data.deltaHeight
				});
				ghost.remove();
			}
			$(document).unbind('mousemove', resize).unbind('mouseup', stop);
			opts.onStopResize.call($this, e);
		}
		function getCss (key) {
			var v = parseInt($this.css(key));
			if (isNaN(v)) {
                return 0;
            }
			return v;
		}
	};
	$.fn.resizable = function (options) {
		var args = Array.prototype.slice.call(arguments, 0);
		var iopts = $.extend( {}, $.fn.resizable.defaults, options);
		var el = $.data(this[0], "resizable");
		if (el) {
			el[options].apply(el, args);
			return el;
		}
		return this.each(function () {
			var $this = $(this);
			var opts = $.meta ? $.extend( {}, iopts, this.data()) : iopts;
			el = new Resizable(this, opts);
			$.data(this, "resizable", el);
		});
	};

	$.fn.resizable.defaults = {
		handles : ['e', 's', 'se'],
		helper : false,
		helperStyle : {},
		maxHeight : null,
		maxWidth : null,
		minHeight : 80,
		minWidth : 100,
		onStartResize : function () {
		},
		onResize : function () {
		},
		onStopResize : function () {
		}
	};
})(jQuery);
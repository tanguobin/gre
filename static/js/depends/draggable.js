/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-2-17
 * Time: 下午2:11
 * Email: tanguobin@duokan.com
 * Description: draggable
 */

/**
 *  @require Jquery
 *
 *  @example
 *      $('#id').draggable(conf)
 *
 */

/**
 * 给指定的DOM元素添加draggable支持
 * @public
 * @param          {Object}        options               选项参数
 * @config         {Boolean}       disabled              是否允许拖动
 * @config         {String}        axis                  h, v, 允许拖动的方向，水平或垂直
 * @config         {Function}      onStartDrag           开始drag之前触发调用的方法
 * @config         {Function}      onDrag                开始drag时触发调用的方法
 * @config         {Function}      onStopDrag            停止drag时触发调用的方法
 */

;(function ($) {
	$.fn.draggable = function (options) {
		function doDown (e) {
			$.data(e.data.target, 'draggable').options.onStartDrag(e);
			return false;
		}
		
		function doMove (e) {
			var dragData = e.data;
			var left = dragData.startLeft + e.pageX - dragData.startX;
			var top = dragData.startTop + e.pageY - dragData.startY;
			
			var opts = $.data(e.data.target, 'draggable').options;
			if (opts.axis == 'h') {
				$(dragData.target).css('left', left);
			} else if (opts.axis == 'v') {
				$(dragData.target).css('top', top);
			} else {
				$(dragData.target).css({
					left: left,
					top: top
				});
			}
			$.data(e.data.target, 'draggable').options.onDrag(e);
			return false;
		}
		
		function doUp (e) {
			$(document).unbind('.draggable');
			$.data(e.data.target, 'draggable').options.onStopDrag(e);
			return false;
		}
		
		
		return this.each(function () {
			$(this).css('position','absolute');
			
			var opts;
			var state = $.data(this, 'draggable');
			if (state) {
				state.handle.unbind('.draggable');
				opts = $.extend(state.options, options);
			} else {
				opts = $.extend({}, $.fn.draggable.defaults, options || {});
			}
			
			if (opts.disabled == true) {
				// $(this).css('cursor', 'default');
				return;
			}
			
			var handle = null;
            if (typeof opts.handle == 'undefined' || opts.handle == null) {
                handle = $(this);
            } else {
                handle = (typeof opts.handle == 'string' ? $(opts.handle, this) : handle);
            }
			$.data(this, 'draggable', {
				options: opts,
				handle: handle
			});
			
			// bind mouse event using event namespace draggable
			handle.bind('mousedown.draggable', {target:this}, onMouseDown);
			handle.bind('mousemove.draggable', {target:this}, onMouseMove);
			
			function onMouseDown (e) {
				if (checkArea(e) == false) return;

				var position = $(e.data.target).position();
				var data = {
					startLeft: position.left + $(e.data.target).parent().scrollLeft(),
					startTop: position.top + $(e.data.target).parent().scrollTop(),
					startX: e.pageX,
					startY: e.pageY,
					target: e.data.target
				};
				$(document).bind('mousedown.draggable', data, doDown);
				$(document).bind('mousemove.draggable', data, doMove);
				$(document).bind('mouseup.draggable', data, doUp);
			}
			
			function onMouseMove (e) {
                /*
				if (checkArea(e)) {
					$(this).css('cursor', 'move');
				} else {
					$(this).css('cursor', 'default');
				}
				*/
			}
			
			// check if the handle can be dragged
			function checkArea (e) {
				var offset = $(handle).offset();
				var width = $(handle).outerWidth();
				var height = $(handle).outerHeight();
				var t = e.pageY - offset.top;
				var r = offset.left + width - e.pageX;
				var b = offset.top + height - e.pageY;
				var l = e.pageX - offset.left;
				
				return Math.min(t,r,b,l) > opts.edge;
			}
		});
	};
	
	$.fn.draggable.defaults = {
        handle: null,
        disabled: false,
        edge: 0,
        axis: null,	 // v or h
        onStartDrag: function () {},
        onDrag: function () {},
        onStopDrag: function () {}
	};
})(jQuery);
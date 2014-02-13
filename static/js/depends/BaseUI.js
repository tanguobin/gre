/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-2-15
 * Time: 下午2:44
 * Email: tanguobin@duokan.com
 */

/**
 *  UI组件开发规范:
 *      1、BaseUI是所有UI组件的基类，所有新创建的UI组件均需要继承自该基类;
 *      2、任何一个UI组件结构均如下:
 *          <div id="DK-UI__guid-main">
 *              <div id="DK-UI__guid-header"></div>
 *              <div id="DK-UI__guid-content"></div>
 *              <div id="DK-UI__guid-footer"></div>
 *          </div>
 *
 *  @require jquery
 *
 *  @example
 *      ;(function ($, ui) {
 *          ui.Tooltip = function (options) {
 *              var me = this;
 *              me.options = $.extend({
 *                  uiType : 'Tooltip'
 *              }, options);
 *              ui.BaseUI.call(this);
 *
 *              // add you code here
 *              var _getString = function () {
 *
 *              };
 *              me.render = function () {
 *
 *              };
 *              // add you code here
 *          };
 *          ui.inherits(ui.Tooltip, ui.BaseUI);
 *      })(jQuery, UI);
 *  @description 上面部分是一个UI组件的基础结构，在此基础上可以个性化定义自己的组件
 */

;(function ($) {
    // create $.UI closure
    window.UI = window.UI || {};
    $.extend(UI, {
        BaseUI : function () {
            var me = this,
                idPrefix = 'DK-UI-',    // idPrefix
                classPrefix = me.options.classPrefix ? me.options.classPrefix : me.options.uiType.toLowerCase(),
                guid = 0;               // guid
            UI.guid = ++ UI.guid || 0;  // UI guid, begin with 0, each time UI create, guid++
            guid = UI.guid;
            me.disposed = false;        // 组件是否被销毁
            me.isShowed = false;        // 组件是否显示

            /**
             * 获得当前控件的id
             * @private called by superClass
             * @param {string} optional key
             * @return {string} id
             */
            me._getId = function (key) {
                return idPrefix + me.options.uiType + '__' + guid + (key ? '-' + key : '');
            };

            /**
             * 获得class，支持skin
             * @private called by superClass
             * @param {string} optional key
             * @return {string} className
             */
            me._getClass = function (key) {
                return classPrefix + (key ? '-' + key : '');
            };

            /**
             * 查询当前组件是否处于显示状态
             * @public
             * @return {Boolean}  是否处于显示状态
             */
            me.isShown = function () {
                return me.isShowed;
            };

            /**
             * 获得组件对应的dom元素
             * @public
             * @return {HTMLElement} mainDiv
             */
            me.getMain = function () {
                var mainDiv = $('#' + me._getId() + '-main');
                if (mainDiv.length > 0) {
                    return mainDiv;
                }
                return null;
            };

            /**
             * 获得header对应的dom元素
             * @public
             * @return {HTMLElement} headerDiv
             */
            me.getHeader = function () {
                var headerDiv = $('#' + me._getId() + '-header');
                if (headerDiv.length > 0) {
                    return headerDiv;
                }
                return null;
            };

            /**
             * 获得content对应的dom元素
             * @public
             * @return {HTMLElement} contentDiv
             */
            me.getContent = function () {
                var contentDiv = $('#' + me._getId() + '-content');
                if (contentDiv.length > 0) {
                    return contentDiv;
                }
                return null;
            };

            /**
             * 获得footer对应的dom元素
             * @public
             * @return {HTMLElement} footerDiv
             */
            me.getFooter = function () {
                var footerDiv = $('#' + me._getId() + '-footer');
                if (footerDiv.length > 0) {
                    return footerDiv;
                }
                return null;
            };

            /**
             * 隐藏当前dialog
             * @public
             */
            me.hide = function () {
                $(me.getMain()).hide();
                me.isShowed = false;
            };

            /**
             * 显示当前dialog
             * @public
             */
            me.show = function () {
                $(me.getMain()).show();
                me.isShowed = true;
            };

            /**
             * 销毁UI实例
             * @example instance.dispose()
             */
            me.dispose = function () {
                me.disposed = true;
                // 清除dom节点
                me.getMain().remove();
                me = null;
            };

        },
        /**
         * 为类型构造器建立继承关系
         * @name inherits
         * @function
         * @grammar UI.inherits(subClass, superClass)
         * @param {Function} subClass 子类构造器
         * @param {Function} superClass 父类构造器
         * @remark
         *
         * 使subClass继承superClass的prototype，因此subClass的实例能够使用superClass的prototype中定义的所有属性和方法。<br>
         * 这个函数实际上是建立了subClass和superClass的原型链集成，并对subClass进行了constructor修正。<br>
         * <strong>注意：如果要继承构造函数，需要在subClass里面call一下</strong>
         */
        inherits : function (subClass, superClass) {
            var key, proto,
                selfProps = subClass.prototype,
                clazz = new Function();

            clazz.prototype = superClass.prototype;
            proto = subClass.prototype = new clazz();

            for (key in selfProps) {
                proto[key] = selfProps[key];
            }
            subClass.prototype.constructor = subClass;
            subClass.superClass = superClass.prototype;

            subClass.extend = function(json) {
                for (var i in json) proto[i] = json[i];
                return subClass;
            }

            return subClass;
        },
        /**
         * 对目标字符串进行格式化
         * @name stringFormat
         * @function
         * @grammar UI.stringFormat(source, opts)
         * @param {string} source 目标字符串
         * @param {Object|string...} opts 提供相应数据的对象或多个字符串
         * @remark
         *
         *   opts参数为“Object”时，替换目标字符串中的#{property name}部分。<br>
         *   opts为“string...”时，替换目标字符串中的#{0}、#{1}...部分。
         *
         * @returns {string} 格式化后的字符串
         */
        stringFormat : function (source, opts) {
            source = String(source);
            var data = Array.prototype.slice.call(arguments, 1), toString = Object.prototype.toString;
            if (data.length) {
                data = data.length == 1 ?
                    /* ie 下 Object.prototype.toString.call(null) == '[object Object]' */
                    (opts !== null && (/\[object Array\]|\[object Object\]/.test(toString.call(opts))) ? opts : data)
                    : data;
                return source.replace(/#\{(.+?)\}/g, function (match, key) {
                    var replacer = data[key];
                    if ('[object Function]' == toString.call(replacer)) {
                        replacer = replacer(key);
                    }
                    return ('undefined' == typeof replacer ? '' : replacer);
                });
            }
            return source;
        }
    });
})(jQuery);

/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 12-4-7
 * Time: 下午8:47
 * 创建GRE命名空间及基础方法
 */

(function (window) {
    var $ = window.jQuery;

    if (typeof GRE == "undefined" || !GRE)
        var GRE = {
            /**
             * @param name
             * @param content
             * 数据仓库
             */
            dataStorage : function (name, content) {
                GRE.dataStorage[name] = content;
            },
            /**
             * 判断source是否是整数
             * @param source
             */
            isNumber : function (source) {
                return "[object Number]" == Object.prototype.toString.call(parseInt(source)) && isFinite(parseInt(source));
            },
            /**
             * 生成dialog
             * @param conf
             */
            getDialog : function (conf) {
                var instance = new UI.Dialog({
                    titleText: conf.titleText ? conf.titleText : '提示',
                    contentText: conf.contentText,
                    width: conf.width ? conf.width : 200,
                    height: conf.height ? conf.height : 100,
                    modalColor: conf.modalColor ? conf.modalColor : '#fff',
                    closeButton: conf.closeButton ? conf.closeButton : true,
                    modal: conf.modal ? conf.modal : true
                });
                instance.render();
                instance.open();

                return instance;
            },
            /**
             * 存放上一个page的可显示的全部DOM节点
             */
            domStorage : [],
            /**
             * 对话框
             */
            dialog : null,
            /**
             * 生成 0~din 之间的随机数(组)
             */
            getRandom : function (din, length) {
                var arr = [], i,
                    genUnique = function (din, arr) {
                        var n = GRE.getRandom(din);
                        return ($.inArray(n, arr) < 0) ? n : genUnique(din, arr);
                    };
                if (length) {
                    for (i = 0; i < length; i++) {
                        arr[i] = genUnique(din,arr);
                    }
                    return arr;
                } else {
                    return Math.floor(Math.random()*din);
                }
            },
            /**
             * 对html进行转义
             * @param source
             */
            encodeHTML : function (source) {
                return String(source)
                    .replace(/&/g,'&amp;')
                    .replace(/</g,'&lt;')
                    .replace(/>/g,'&gt;')
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#39;");
            },
            /**
             * 转义json
             * @param source
             */
            encodeJSON : function (source) {
                return String(source)
                    .replace(/\t/g, '\\t')
                    .replace(/\n/g, '\\n')
                    .replace(/\r/g, '\\r')
                    .replace(/"/g, '\\"');
            },
            /**
             * 得到source的字节数
             * @param source
             */
            getByteLength : function (source) {
                return String(source).replace(/[^\x00-\xff]/g, "ci").length;
            },
            /**
             * 截首尾空白字符
             * source from: http://blog.stevenlevithan.com/archives/faster-trim-javascript
             */
            trim : function (str) {
                var	str = str.replace(/^\s\s*/, ''),
                    ws = /\s/,
                    i = str.length;
                while (ws.test(str.charAt(--i)));
                return str.slice(0, i + 1);
            },

            isOldIE : !+"\v1",  // ie 6-8

            /*
             * 并行加载 js
             * 执行 fn 内事件时需要注意依赖顺序
             * func 在全部 url 载入之后执行
             */
            load : function (urls, fn) {
                var head = document.getElementsByTagName( "head" )[0],
                    urlArr = urls.split(','),
                    _isCached = function (url) {
                        var srcs = $('head script[src]');
                        for (var i = 0, length = srcs.length; i < length; i++) {
                            if ($(srcs[i]).attr('src') === url) {
                                return true;
                            }
                        }
                        return false;
                    },
                    _loadScript = function (url, fn) {
                        if (_isCached(url)) {
                            setTimeout(fn, 0);
                            return;
                        }
                        var script = document.createElement('script');
                        script.async = true;
                        script.src = url;
                        script.type = 'text/javascript';
                        head.appendChild(script);
                        script.onloadDone = false;
                        script.onload = function () {
                            script.onloadDone = true;
                            if (fn) setTimeout(fn, 500);
                        }
                        if (GRE.isOldIE) {
                            script.onreadystatechange = function() {
                                if(('loaded' === script.readyState || 'complete' === script.readyState ) && !script.onloadDone ) {
                                    script.onloadDone = true;
                                    if (fn) setTimeout(fn, 500);
                                }
                            }
                        }
                    },
                    i = 0, leng = urlArr.length, _fn, _url;
                for (; i < leng; i++) {
                    _fn = (i == leng - 1 && fn) ? fn : null;
                    _url = GRE.trim(urlArr[i]);
                    _loadScript(_url, _fn);
                }
            },
            /**
             * 添加一个新属性给 GRE
             * arguments 可以为两种类型
             *      1. name, obj = {}
             *      2. 'name1, name2, name3', function(){
             *          GRE.name1 = {}
             *          GRE.name2 = {}
             *          GRE.name3 = {}
             *      }
             */
            add : function (name, o) {
                if (GRE[name]) {
                    alert('GRE.' + name + ' 已被破处, 换个名字吧');
                    return;
                }
                var nameArr = name.split(','),
                    _leng = nameArr.length;
                for (p in nameArr) {
                    var _name = GRE.trim(nameArr[p]);
                    try {
                        GRE[_name] = (_leng == 1) ? o : null;
                    } catch(e) {}
                }
                if (o && typeof(o) == 'function') {
                    try {
                        setTimeout(o, 0);
                    } catch(e) {}
                }
            },
            get: function (url, data, callback, type) {
                var undefined;
                if ( jQuery.isFunction( data ) ) {
                    type = type || callback;
                    callback = data;
                    data = undefined;
                }
                jQuery.get(url, data, function (r) {
                    var me = this,
                        json = jQuery.parseJSON(r);
                    if (json.status.code != 0) {
                        return;
                    }
                    callback.call(me,r);
                }, type);
            },
            post: function (url, data, callback, type) {
                var undefined;
                if ( jQuery.isFunction( data ) ) {
                    type = type || callback;
                    callback = data;
                    data = undefined;
                }
                jQuery.post(url, data, function (r) {
                    var me = this,
                        json = jQuery.parseJSON(r);
                    if( json.status.code != 0 ){
                        return;
                    }
                    if( callback ) {
                        callback.call(me, r);
                    }
                }, type);
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
            },
            /**
             * @param type             post或者get类型
             * @param action
             * @param inputOptions     input hidden的json，例如{title:"xxx", id:"yyy"}
             * @param target           可选参数，决定目标窗口
             */
            dynCreateForm: function(type, action, inputOptions, target) {
                var form = document.createElement("form");
                form.method = type;
                form.action = action;
                if (arguments[3]) {
                    form.target = target;
                }
                for (option in inputOptions) {
                    var input = document.createElement("input");
                    input.type = "hidden";
                    input.name = option;
                    input.value = inputOptions[option];
                    form.appendChild(input);
                }
                document.body.appendChild(form);
                return form;
            }
        };
        window.GRE = GRE;
})(window, document);


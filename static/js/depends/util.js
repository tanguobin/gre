/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 12-5-20
 * Time: 下午1:06
 * 实用包
 */

GRE.add('login', {
    defconf : {
        trigger : null,
        onlogin : function () {
            location.reload(true);
        }
    },
    login: function (options) {
        var self = this;
        self.options = $.extend({}, self.defconf, options);
        GRE.load('/static/js/depends/UI_Dialog.js', function () {
            GRE.get('/ajax/account/isLogin', {}, function (data) {
                data = jQuery.parseJSON(data);
                if (data.content.isLogin === true) {
                    self.options.onlogin();
                } else {
                    if (GRE.dialog) {
                        GRE.dialog.open();
                    } else {
                        GRE.dialog = GRE.getDialog({
                            titleText: '登录',
                            contentText: [
                                '<div class="login cf" id="J_dialog-login">',
                                '<div class="bd">',
                                '<ul class="registe-box">',
                                '<li><span class="red tip J_tip"></span></li>',
                                '<li><label for="J_user-name">账号：</label><input type="text" class="text J_user-name" placeholder="注册时使用的邮箱/昵称" /></li>',
                                '<li><label for="J_password">密码：</label><input type="password" class="text J_password" /></li>',
                                '<li class="mem_pass"><input type="checkbox" name="mem_pass" checked="checked" id="J_mem-pass" />记住我的登录状态</span></li>',
                                '<li class="last"><a class="login-btn J_login-btn" href="#">登录</a><!--<a href="/account/reset" class="reset">忘记密码？</a>--><a href="/account/apply" class="reset" target="_blank">注册</a></li>',
                                '</ul>',
                                /*'<ul class="registe-login-area">',
                                 '<li>用合作网站账号登录</li>',
                                 '<li><a href="" class="qq-btn">QQ</a></li>',
                                 '<li><a href="" class="sina-btn">新浪微博</a></li>',
                                 '</ul>',*/
                                '</div>',
                                '</div>'].join(''),
                            width: 450,
                            height: 280
                        });
                        // 监听事件
                        var login = '#J_dialog-login',
                            loginTip = '.J_tip',
                            loginBtn = '.J_login-btn',
                            loginUsername = '.J_user-name',
                            loginPassword = '.J_password';
                        $.each($(login + ' input.text'), function (index, ele) {
                            $(ele).hover(function (evt) {
                                $(this).addClass('active');
                            }, function (evt) {
                                $(this).removeClass('active');
                            }).blur(function (evt) {
                                    var me = this,
                                        value = $(me).val();
                                    if (value === '') {
                                        if ($(me).hasClass('J_user-name')) {
                                            $(login + ' ' + loginTip).html('请输入账号');
                                        } else {
                                            $(login + ' ' + loginTip).html('请输入密码');
                                        }
                                    }
                                });
                        });
                        $(login + ' ' + loginBtn).click(function (evt) {
                            var nikname = $(login + ' ' + loginUsername).val(),
                                password = $(login + ' ' + loginPassword).val(),
                                pass = ('checked' === $('#J_mem-pass').attr('checked'));
                            GRE.post('/ajax/account/login', {username: nikname, password: password, pass: pass}, function (data) {
                                data = jQuery.parseJSON(data);
                                if (data.content === true) {
                                    self.options.onlogin();
                                } else {
                                    $(login + ' ' + loginTip).html('账号或密码错误');
                                }
                            });
                            return false;
                        });
                    }
                }
            });
        });
    },
    init : function (options) {
        var self = this;
        self.options = $.extend({}, self.defconf, options);
        self.options.trigger.click(function () {
            self.login(options);
            return false;
        });
    }
});

GRE.add('favorite', {
    name : '爱GRE模考网(igrer.com)',
    init : function () {
        var self = this,
            name = self.name,
            loc = window.location,
            url = [loc.protocol, '//', loc.host, '/?fr=fav'].join('');
        $('#J_add-fav').click(function () {
            try {
                if (window.sidebar) { // Mozilla Firefox
                    window.sidebar.addPanel(name, url, "");
                } else if (window.external) { // IE
                    window.external.AddFavorite(url, name);
                } else {
                    alert("您的浏览器不支持自动添加! 请尝试手动 Ctrl+D");
                }
            } catch (e) {
                alert("您的浏览器不支持自动添加! 请尝试手动 Ctrl+D");
            }
            return false;
        });
    }
});

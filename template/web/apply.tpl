{extends file="lib/framework/base_fw.html"}

{block name="meta"}<meta name="robots" content="noindex, nofollow" />{/block}

{block name="title"}- 注册{/block}

{block name="body"}
<div class="divider"></div>
<div class="apply" id="J_apply">
    <div class="hd">请填写注册信息</div>
    <div class="bd cf">
        <ul class="registe-box">
            <li><label for="J_email">电子邮箱：</label><input type="text" id="J_email" class="text" autocomplete="off" /></li>
            <li><label for="J_nikname">昵称：</label><input type="text" id="J_nikname" class="text" autocomplete="off" /></li>
            <li><label for="J_password">密码：</label><input type="password" id="J_password" class="text" autocomplete="off" /></li>
            <li><label for="J_confirm">确定密码：</label><input type="password" id="J_confirm" class="text" autocomplete="off" /></li>
            <li><label for="J_code">验证码：</label><input type="text" id="J_code" class="text code" autocomplete="off" /><img src="/account/checkcode" id="J_code-img" /><a id="J_change" href="#" class="change">换一张</a></li>
            <li><input type="checkbox" id="J_agree" checked="checked" class="checkbox" autocomplete="off" /><span class="agree">我已阅读并接受<a target="_blank" href="/home/help#announce">爱GRE模考网协议</a></span></li>
            <li><a class="login-btn" id="J_register" href="#">立即注册</a></li>
        </ul>
        {$genInput}
        <ul class="registe-login-area">
            <li>已有爱GRE模考网账号，请直接登录</li>
            <li><a href="/" class="normal-btn" id="J_account-login">登录</a></li>
            <!--<li>用合作网站账号登录</li>
            <li><a class="qq-btn" href="">QQ</a></li>
            <li><a class="sina-btn" href="">新浪微博</a></li>-->
        </ul>
    </div>
</div>
{/block}

{block name="foot"}
{literal}
<script type="text/javascript">
$(document).ready(function () {
    GRE.login.init({ trigger: $('#J_account-login') });
    var msg = {
        'email' : {
            'normal' : '请输入常用邮箱，通过验证后可用于找回密码',
            'null' : '请填写邮箱',
            'format' : '邮箱格式不正确',
            'used' : '该邮箱已注册'
        },
        'nikname' : {
            'normal' : '不超过7个汉字，或14个字节，且不能是纯数字',
            'null' : '请填写用户名',
            'format' : '用户名仅可使用汉字、数字、字母和下划线',
            'used' : '此用户名已被注册，请另换一个'
        },
        'password' : {
            'normal' : '密码长度6~14位，字母区分大小写',
            'null' : '请填写密码',
            'format' : '密码最少6个字符，最长不得超过14个字符'
        },
        'confirm' : {
            'null' : '请输入确认密码',
            'format' : '密码与确认密码不一致'
        },
        'code' : {
            'normal' : '请输入图片验证码，不区分大小写',
            'null' : '请输入验证码',
            'format' : '验证码错误，请重新输入'
        }
    };
    var check = {
        isEmail : function (email) {
            var regExp = /^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,4}$/;
            return regExp.test(email);
        },
        isNickName : function (name) {
            if (!isNaN(name) || GRE.getByteLength(name) > 14 || /[^0-9a-zA-Z_\u4e00-\u9fa5]+/.test(name)) {
                return false;
            }
            return true;
        },
        isPassword : function (password) {
            if (GRE.getByteLength(password) < 6 || GRE.getByteLength(password) > 14) {
                return false;
            }
            return true;
        }
    };
    $.each($('#J_apply input.text'), function (index, ele) {
        $('<span class="pass-reg-des"></span><span class="pass-reg-err"></span><span class="pass-reg-i"></span>').appendTo($(ele).parent()).hide();
        var text = $(ele).attr('id').replace('J_', '');
        $(ele).hover(function (evt) {
            $(this).addClass('active');
        }, function (evt) {
            $(this).removeClass('active');
        }).focus(function (evt) {
            var me = this;
            if ($(me).siblings('span').eq(2).is(":visible") && $(me).attr('id') !== 'J_code') {
                return false;
            }
            $(me).siblings('span').hide();
            msg[text]['normal'] ? $(me).siblings('span').eq(0).html(msg[text]['normal']).show() : '';
        }).blur(function (evt) {
            var me = this;
            var value = $(me).val();
            $(me).siblings('span').hide();
            if (value === '') {
                $(me).siblings('span').eq(1).html(msg[text]['null']).show();
            } else {
                switch (text) {
                    case 'email':
                        if (check.isEmail(value)) {
                            $(me).siblings('span').eq(2).show();
                        } else {
                            $(me).siblings('span').eq(1).html(msg[text]['format']).show();
                        }
                        break;
                    case 'nikname':
                        if (check.isNickName(value)) {
                            GRE.get('/ajax/account/nameUsed', {name : value}, function (data) {
                                data = jQuery.parseJSON(data);
                                if (data.content === 1) {
                                    $(me).siblings('span').eq(1).html(msg[text]['used']).show();
                                } else {
                                    $(me).siblings('span').eq(2).show();
                                }
                            });
                        } else {
                            $(me).siblings('span').eq(1).html(msg[text]['format']).show();
                        }
                        break;
                    case 'password':
                        if (check.isPassword(value)) {
                            $(me).siblings('span').eq(2).show();
                        } else {
                            $(me).siblings('span').eq(1).html(msg[text]['format']).show();
                        }
                        break;
                    case 'confirm':
                        if (value === $('#J_password').val()) {
                            $(me).siblings('span').eq(2).show();
                        } else {
                            $(me).siblings('span').eq(1).html(msg[text]['format']).show();
                        }
                        break;
                    case 'code':
                        $(me).siblings('span').eq(2).show();
                        break;
                }
            }
        });
    });
    $('#J_change').click(function (evt) {
        $('#J_code-img').attr('src', '/account/checkcode?t=' + (new Date).getTime());
        return false;
    });
    $('#J_register').click(function (evt) {
        var ok = true;
        $.each($('#J_apply .pass-reg-i'), function (idx, ele) {
            if (!$(ele).is(":visible")) {
                $(ele).siblings('input').focus();
                ok = false;
                return false;
            }
        });
        if (ok === true) {
            var email = $('#J_email').val(),
                nikname = $('#J_nikname').val(),
                password = $('#J_password').val(),
                confirm = $('#J_confirm').val(),
                code = $('#J_code').val(),
                token = $('input[name="token"]').val();
            GRE.post('/ajax/account/register', {email: email, username: nikname, password: password, confirm: confirm, code: code, token: token}, function (data) {
                data = jQuery.parseJSON(data);
                if (data.content.email === 1 && data.content.userName === 1 && data.content.passsword === 1 && data.content.confirm === 1 && data.content.code === 1) {
                    GRE.load('/static/js/depends/UI_Dialog.js', function () {
                        GRE.getDialog({
                            titleText: '恭喜您',
                            contentText: '<div class="friend-tip"><p>注册成功！希望您能够在爱GRE模考网快乐学习，快乐生活！如果您有任何问题或是改进意见可以发邮件至gbtan1988@gmail.com, 我们将第一时间帮您解答。</p><a href="/">我知道了，回到首页</a></div>',
                            width: 300,
                            height: 170
                        });
                    });
                } else if (data.content.email === 0) {
                    $('#J_email').siblings('span').hide();
                    $('#J_email').siblings('span').eq(1).html(msg['email']['format']).show();
                } else if (data.content.userName === 0) {
                    $('#J_nikname').siblings('span').hide();
                    $('#J_nikname').siblings('span').eq(1).html(msg['nikname']['format']).show();
                } else if (data.content.password === 0) {
                    $('#J_password').siblings('span').hide();
                    $('#J_password').siblings('span').eq(1).html(msg['password']['format']).show();
                } else if (data.content.confirm === 0) {
                    $('#J_confirm').siblings('span').hide();
                    $('#J_confirm').siblings('span').eq(1).html(msg['confirm']['format']).show();
                } else if (data.content.code === 0) {
                    $('#J_code').siblings('span').hide();
                    $('#J_code').siblings('span').eq(1).html(msg['code']['format']).show();
                }
            });
        }
        return false;
    });
});
</script>
{/literal}
{/block}

{block name="nav"}{/block}

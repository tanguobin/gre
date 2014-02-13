/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-4-11
 * Time: 下午2:52
 * Email: tanguobin@duokan.com
 * Description: 计时器
 */

GRE.add('timer', {
    defconf : {
        time : 30 * 60,           // 默认的是 30 minutes
        id : '#J_timer',
        timebtn : '#J_time-btn',
        timeover : function () {}
    },
    /**
     * @param {Number}  time 秒数
     * @return {String} 格式化后的字符串，如00 : 29 : 48
     */
    _timeFormat : function (time) {
        var me = this,
            min = parseInt(time / 60),
            sec = time - min * 60,
            str = '00 : ';

        if (min === 4) {
            $(me.options.id).show().addClass('red');
            $(me.options.timebtn).hide();
        }

        if (min === 0 && sec === 0) {
            clearInterval(GRE.timer.interval);
            // 过期提醒
            GRE.load('/static/js/depends/UI_Dialog.js', function () {
                GRE.getDialog({
                    titleText: 'Time Expired',
                    contentText: '<div class="time-expire-tip"><p>Your time for answering this question has ended.</p><p>Your response has been saved.</p><p>Click <b>Continue</b> to go on.</p><a href="#" class="continue-btn" id="J_expire-continue"></a></div>',
                    width: 460,
                    height: 290
                });
                $('#J_expire-continue').click(function () {
                    me.options.timeover();
                    return false;
                });
            });
            return false;
        }

        if (min < 10) {
            str += '0' + min;
        } else {
            str += min;
        }

        str += ' : ';
        if (sec < 10) {
            str += '0' + sec;
        } else {
            str += sec;
        }

        return str;
    },
    /**
     * @return {Number} 返回当前时间，秒数
     */
    getCurrentTime : function () {
        var me = this;

        return me.options.time;
    },
    _timerStart : function () {
        var me = this,
            dtimer = $(me.options.id);

        GRE.timer.interval = setInterval(function () {
            dtimer.html(me._timeFormat(me.options.time--));
        }, 1000);
    },
    init : function (options) {
        var me = this;
        me.options = $.extend({}, me.defconf, options);

        me._timerStart();
    }
});

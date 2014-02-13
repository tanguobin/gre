/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-4-7
 * Time: 下午9:06
 * 操作区的js逻辑
 */

GRE.add('operation', {
    defconf : {
        operation : '#J_operation',
        continuebtn : '#J_continue',
        quitTestbtn : '#J_quit-test',
        exitSectionbtn : '#J_exit-section',
        helpbtn : '#J_help',
        backbtn : '#J_back',
        nextbtn : '#J_next',
        markbtn : '#J_mark',
        reviewbtn : '#J_review',
        returnbtn : '#J_return',
        gotobtn : '#J_goto',
        mainwrap : '#J_main-wrap',
        headerbd : '#J_header-bd',
        writingqd : '#J_writing-qd',
        writingsd : '#J_writing-sd',
        writingtt : '#J_writing-tt',
        writinghta : '#J_writing-hta',
        sectiongd : '#J_section-gd',
        verbalsd : '#J_verbal-sd',
        verbaltt : '#J_verbal-tt',
        quantitysd : '#J_quantity-sd',
        quantitytt : '#J_quantity-tt',
        quantitycal : '#J_quantity-cal',
        timetip : '#J_time-tip',
        questiontip : '#J_question-tip',
        reviewtip : '#J_review-tip',
        nexttip : '#J_next-tip',
        helptab : '#J_help-tab',
        editor : '#J_editor-ui',
        articleTitle : '#J_article-title',
        articleQuestion : '#J_article-question'
    },
    dataStorageInit : function () {
        var me = this;
        $.merge(GRE.domStorage, $(me.options.operation + ' a:visible'));
        $.merge(GRE.domStorage, $(me.options.mainwrap + ' > :visible'));
        $.merge(GRE.domStorage, $(me.options.headerbd + ' > :visible'));
    },
    continueHandler : function () {
        var me = this,
            continuebtn = $(me.options.continuebtn),
            nextbtn = $(me.options.nextbtn),
            markbtn = $(me.options.markbtn),
            reviewbtn = $(me.options.reviewbtn),
            href = continuebtn.attr('href'),
            type = /\/argument/.test(location.pathname) ? 'argument' : 'issue';

        // 提交文章
        var commitArticle = function () {
            // 清空window上面绑定的事件
            $(window).unbind('beforeunload');
            // 获取文章内容
            var id = $(me.options.articleTitle).attr('data-id'),
                val = $(me.options.editor).val(),
                title = $(me.options.articleTitle).text(),
                question = $(me.options.articleQuestion).text();
            window.name = [id, '____', title, '____', question, '____', val].join('');
            location.href = '/modeltest/' + type + '/result';
        };
        var _writingContinue = function () {
            if (typeof GRE.dataStorage['Content']['writingHtml'] == "undefined") {
                return;
            }
            // 隐藏J_main-wrap中的内容
            $(me.options.mainwrap + ' > :visible').hide();
            // 显示issue题目
            $(me.options.mainwrap).append(GRE.dataStorage['Content']['writingHtml']);
            // 显示Question和时间的tip
            $(me.options.headerbd).append(GRE.dataStorage['Content']['headTip']);
            // 启动计时器
            GRE.timer.init({
                timeover: function () {
                    commitArticle();
                }
            });
            // 操作区域显示控制
            continuebtn.hide();
            nextbtn.attr('href', '/ajax/section/nextTip').show();
            // 题目显示以后，不能返回上一个page了，此刻销毁所有的domStorage
            GRE.domStorage = [];
            me.dataStorageInit();
        };
        // 提交verbal
        var commitVerbal = function () {
            var verbal = null,
                actives = null,
                answer = '',
                explain = '',
                qid = '',
                own = '',
                question = '',
                str = '[';
            for (var key = 1; key < 21; key++) {
                if ($('#J_verbal-' + key).length === 0) {
                    str = str.substring(0, str.length - 1);
                    break;
                }
                question = $('#J_verbal-' + key + ' .J_question').html();
                if (key === 7) {
                    verbal = $('#J_verbal-7');
                    answer = $.data(verbal[0], 'question')['answer'];
                    explain = $.data(verbal[0], 'question')['explain'];
                } else if (key > 7 && key < 12) {
                    verbal = $('#J_verbal-8');
                    answer = $.data(verbal[0], 'question')['answer' + (key - 7)];
                    explain = $.data(verbal[0], 'question')['explain' + (key - 7)];
                } else if (key > 15 && key < 18) {
                    verbal = $('#J_verbal-16');
                    answer = $.data(verbal[0], 'question')['answer' + (key - 15)];
                    explain = $.data(verbal[0], 'question')['explain' + (key - 15)];
                } else if (key > 17 && key < 21) {
                    verbal = $('#J_verbal-18');
                    answer = $.data(verbal[0], 'question')['answer' + (key - 17)];
                    explain = $.data(verbal[0], 'question')['explain' + (key - 17)];
                } else {
                    verbal = $('#J_verbal-' + key);
                    answer = $.data(verbal[0], 'answer');
                    explain = $.data(verbal[0], 'explain');
                    qid = $.data(verbal[0], 'qid');
                }
                qid = $.data(verbal[0], 'qid');
                actives = verbal.find('.active');
                actives.length == 1 ? own = actives.index() : (function () {
                    for (var i = 0; i < actives.length; i++) {
                        own += $(actives[i]).index() + ',';
                    }
                }) ();
                str = [str, '{"qid": "', qid, '", "question": "', GRE.encodeJSON(question), '", "own": "', own, '", "answer": "', answer, '", "explain": "', GRE.encodeJSON(explain), '"}', key === 20 ? '' : ','].join('');
                own = '';
            }
            str += ']';
            window.name = str;
            // 清空window上面绑定的事件
            $(window).unbind('beforeunload');
            location.href = '/modeltest/verbal/result';
        };
        var _verbalSingleContinue = function () {
            if (typeof GRE.dataStorage['Content'] == "undefined") {
                return;
            }
            var verbals = GRE.dataStorage['Content'],
                questions = verbals.questions;
            $(me.options.mainwrap + ' > :visible').hide();
            // 显示第一道题
            $(me.options.mainwrap).append(questions[0]);
            // 显示Question和时间的tip
            $(me.options.headerbd).append(GRE.dataStorage['Content']['headTip']);
            GRE.timer.init({
                timeover: function () {
                    commitVerbal();
                }
            });
            // 操作区域显示控制
            continuebtn.hide();
            markbtn.show();
            reviewbtn.show();
            nextbtn.attr('href', '/verbal/2').show();
            GRE.domStorage = [];
            me.dataStorageInit();
        };
        // 提交quantity
        var commitQuantity = function () {
            var quantity = null,
                question = '',
                explain = '',
                answer = '',
                qid = '',
                own = '',
                actives = null,
                str = '[';
            for (var key = 1; key < 21; key++) {
                quantity = $('#J_quantity-' + key);
                if (quantity.length === 0) {
                    str = str.substring(0, str.length - 1);
                    break;
                }
                qid = $.data(quantity[0], 'qid');
                answer = $.data(quantity[0], 'answer');
                explain = $.data(quantity[0], 'explain');
                if (key > 0 && key < 17) {
                    question = quantity.find('.J_question').html();
                    actives = quantity.find('li.active');
                    own = actives.index();
                } else if (key > 8 && key < 17) {
                    question = quantity.find('.J_question').html();
                    actives = quantity.find('li.active');
                    for (var i = 0, length = actives.length; i < length; i++) {
                        own += $(actives[i]).index() + ',';
                    }
                } else {
                    question = quantity.html();
                    actives = quantity.find('input');
                    actives.length == 1 ? own = actives.val() : (function () {
                        var numerator = actives.eq(0).val();
                        var denominator = actives.eq(1).val();
                        own = numerator + '/' + denominator;
                    }) ();
                }
                str = [str, '{"qid": "', qid, '", "question": "', GRE.encodeJSON(question), '", "own": "', own, '", "answer": "', answer, '", "explain": "', GRE.encodeJSON(explain), '"}', key === 20 ? '' : ','].join('');
                own = '';
            }
            str += ']';
            window.name = str;
            // 清空window上面绑定的事件
            $(window).unbind('beforeunload');
            location.href = '/modeltest/quantity/result';
        };
        var _quantityCompareContinue = function () {
            var quantities = GRE.dataStorage['Content'],
                questions = quantities.questions;
            $(me.options.mainwrap + ' > :visible').hide();
            // 显示第一道题
            $(me.options.mainwrap).append(questions[0]);
            // 显示Question和时间的tip
            $(me.options.headerbd).append(GRE.dataStorage['Content']['headTip']);
            GRE.timer.init({
                time: 35 * 60,
                timeover: function () {
                    commitQuantity();
                }
            });
            // 操作区域显示控制
            continuebtn.hide();
            markbtn.show();
            reviewbtn.show();
            nextbtn.attr('href', '/quantity/2').show();
            GRE.domStorage = [];
            me.dataStorageInit();
        };

        // ajax异步加载后面的数据
        if (/^\/ajax/.test(href)) {
            GRE.get(href, {}, function (data) {
                data = jQuery.parseJSON(data);
                GRE.dataStorage('Content', data.content);
            });
        }

        continuebtn.click(function (evt) {
            href = continuebtn.attr('href');
            switch (href) {
                case '/ajax/writing/getIssue':
                case '/ajax/writing/getArgument':
                    _writingContinue();
                    break;
                case '/ajax/verbal/pt1':
                    _verbalSingleContinue();
                    break;
                case '/ajax/quantity/pt1':
                    _quantityCompareContinue();
                    break;
                case '/modeltest/issue/result':
                case '/modeltest/argument/result':
                    commitArticle();
                    break;
                case '/modeltest/verbal/result':
                    commitVerbal();
                    break;
                case '/modeltest/quantity/result':
                    commitQuantity();
                    break;
            };
            return false;
        });
    },
    quitTestHandler : function () {

    },
    exitSectionHandler : function () {

    },
    returnHandler : function () {
        var me = this;

        $(me.options.returnbtn).click(function (evt) {
            var self = this;
            if ($(self).is(":visible")) {
                $(me.options.headerbd + ' ul:visible').hide();
                $(me.options.operation + ' a:visible').hide();
                $(me.options.mainwrap + ' > :visible').hide();
                $(GRE.domStorage).show();
                return false;
            }
        });
    },
    backHandler : function () {
        var me = this,
            backbtn = $(me.options.backbtn),
            nextbtn = $(me.options.nextbtn),
            markbtn = $(me.options.markbtn);

        backbtn.click(function (evt) {
            var self = this,
                href = nextbtn.attr('href'),
                nextId = parseInt(/\/(verbal|quantity)\/([0-9]+)/.test(href) ? href.replace(/\/(verbal|quantity)\//, '') : 21),
                backId = nextId - 2,
                type = /\/quantity/.test(location.pathname) ? 'quantity' : 'verbal';
            if (backId === 1) {
                $(self).hide();
            }
            $(me.options.mainwrap + ' > :visible').hide();
            $(me.options.questiontip).text('Question ' + backId + ' of 20');
            // 重置mark按钮的样式
            markbtn.removeClass('mark-ck-btn').addClass('mark-btn');
            nextbtn.attr('href', '/' + type + '/' + (nextId - 1));
            $('#J_' + type + '-' + backId).show();
            // 决定是否添加mark标记
            if (1 === $.data($('#J_' + type + '-' + backId)[0], 'marked')) {
                markbtn.removeClass('mark-btn').addClass('mark-ck-btn');
            }
            GRE.domStorage = [];
            me.dataStorageInit();
            return false;
        });
    },
    nextHandler : function () {
        var me = this,
            nextbtn = $(me.options.nextbtn),
            continuebtn = $(me.options.continuebtn),
            markbtn = $(me.options.markbtn);

        // 点击section中的next按钮
        var _sectionNext = function (content) {
            var type = '';
            if (/\/argument/.test(location.pathname)) {
                type = 'argument';
            } else if (/\/issue/.test(location.pathname)) {
                type = 'issue';
            } else if (/\/verbal/.test(location.pathname)) {
                type = 'verbal';
            } else if (/\/quantity/.test(location.pathname)) {
                type = 'quantity';
            }
            $(me.options.mainwrap + ' > :visible').hide();
            $(me.options.nexttip).length == 0 ? $(me.options.mainwrap).append(content) : $(me.options.nexttip).show();
            // 只显示Return和Continue按钮
            $(me.options.operation + ' a:visible').hide();
            $(me.options.returnbtn).show();
            $(me.options.continuebtn).attr('href', '/modeltest/' + type + '/result').show();
        };
        // 点击quantity中的next按钮
        var _quantityNext = function (idx) {
            var questions = GRE.dataStorage['Content'].questions,
                question = '',
                obj = {},
                questionBeforeShow = function () {
                    // 把做过的题目隐藏
                    $(me.options.mainwrap + ' > :visible').hide();
                    // 显示back按钮
                    idx > 1 ? $(me.options.backbtn).show() : $(me.options.backbtn).hide();
                    // question idx of 20显示
                    $(me.options.questiontip).html('Question ' + idx + ' of 20');
                    idx === 20 ? nextbtn.attr('href', '/ajax/section/nextTip') : nextbtn.attr('href', '/quantity/' + (idx + 1)).show();
                };

            if ($('#J_quantity-' + idx).length === 1) {
                questionBeforeShow();
                $('#J_quantity-' + idx).show();
                // 检查该题被mark过
                if (1 === $.data($('#J_quantity-' + idx)[0], 'marked')) {
                    markbtn.removeClass('mark-btn').addClass('mark-ck-btn');
                }
                return false;
            }

            if (idx > 1 && idx < 9) {
                question = questions[idx - 1];
                if (idx === 8) {
                    GRE.get('/ajax/quantity/pt2', {type : GRE.dataStorage['Content']['type']}, function (data) {
                        data = jQuery.parseJSON(data);
                        GRE.dataStorage('Content', data.content);
                    });
                }
            } else if (idx > 8 && idx < 17) {
                question = questions[idx - 9];
                if (idx === 16) {
                    GRE.get('/ajax/quantity/pt3', {type : GRE.dataStorage['Content']['type']}, function (data) {
                        data = jQuery.parseJSON(data);
                        GRE.dataStorage('Content', data.content);
                    });
                }
            } else if (idx > 16 && idx < 21) {
                question = questions[idx - 17];
            }

            // 显示问题前的处理
            questionBeforeShow();
            // 显示第idx道题
            $(me.options.mainwrap).append(question);
            GRE.domStorage = [];
            me.dataStorageInit();
        };
        // 点击verbal中的next按钮
        var _verbalNext = function (idx) {
            var questions = GRE.dataStorage['Content'].questions,
                question = '',
                obj = {},
                questionBeforeShow = function () {
                    // 把做过的题目隐藏
                    $(me.options.mainwrap + ' > :visible').hide();
                    // 显示back按钮
                    idx > 1 ? $(me.options.backbtn).show() : $(me.options.backbtn).hide();
                    // question idx of 20显示
                    $(me.options.questiontip).html('Question ' + idx + ' of 20');
                    idx === 20 ? nextbtn.attr('href', '/ajax/section/nextTip') : nextbtn.attr('href', '/verbal/' + (idx + 1)).show();
                };

            if ($('#J_verbal-' + idx).length === 1) {
                questionBeforeShow();
                $('#J_verbal-' + idx).show();
                // 检查该题被mark过
                if (1 === $.data($('#J_verbal-' + idx)[0], 'marked')) {
                    markbtn.removeClass('mark-btn').addClass('mark-ck-btn');
                }
                return false;
            }

            /**
             * @param idx
             * @param offset
             * 多道题的阅读题
             */
            var readingHandler = function (idx, offset) {
                var preverbalId = '#J_verbal-' + (idx - 1),
                    verbalId = 'J_verbal-' + idx,
                    qcontent = $.data($('#J_verbal-' + (offset + 1))[0], 'question'),
                    qtype = qcontent['q' + (idx - offset) + 'type'],
                    choices = '',
                    choicesHtml = '';

                var question = $(preverbalId).clone().attr('id', verbalId);
                question.find('.col-sub .bd').html(qcontent['article']);
                choices = qcontent['choices' + (idx - offset)];
                if (choices[0]) {
                    choices[0].length > 0 ? choicesHtml = '<ul class="' + qtype + '">' : '';
                    for (var i = 0, length = choices[0].length; i < length; i++) {
                        choicesHtml += '<li>' + choices[0][i] + '</li>';
                    }
                    choices[0].length > 0 ? choicesHtml += '</ul>' : '';
                }
                question.find('.col-m .bd').html(choicesHtml);
                question.find('.col-m .hd').html(qcontent['question' + (idx - offset)]);

                return {
                    'question' : question,
                    'qtype' : qtype,
                    'id' : verbalId
                };
            };

            if (idx > 1 && idx < 7) {
                question = questions[idx - 1];
                if (idx === 6) {
                    GRE.get('/ajax/verbal/pt2', {type : GRE.dataStorage['Content']['type']}, function (data) {
                        data = jQuery.parseJSON(data);
                        GRE.dataStorage('Content', data.content);
                    });
                }
            } else if (idx === 7) {
                question = questions;
                GRE.get('/ajax/verbal/pt3', {type : GRE.dataStorage['Content']['type']}, function (data) {
                    data = jQuery.parseJSON(data);
                    GRE.dataStorage('Content', data.content);
                });
            } else if (idx === 8) {
                question = questions;
            } else if (idx > 8 && idx < 12) {
                obj = readingHandler(idx, 7);
                question = obj.question;
                if (idx === 11) {
                    GRE.get('/ajax/verbal/pt4', {type : GRE.dataStorage['Content']['type']}, function (data) {
                        data = jQuery.parseJSON(data);
                        GRE.dataStorage('Content', data.content);
                    });
                }
            } else if (idx >= 12 && idx < 16) {
                question = questions[idx - 12];
                if (idx === 15) {
                    GRE.get('/ajax/verbal/pt5', {type : GRE.dataStorage['Content']['type']}, function (data) {
                        data = jQuery.parseJSON(data);
                        GRE.dataStorage('Content', data.content);
                    });
                }
            } else if (idx === 16) {
                question = questions;
            } else if (idx === 17) {
                obj = readingHandler(idx, 15);
                question = obj.question;
                GRE.get('/ajax/verbal/pt6', {type : GRE.dataStorage['Content']['type']}, function (data) {
                    data = jQuery.parseJSON(data);
                    GRE.dataStorage('Content', data.content);
                });
            } else if (idx === 18) {
                question = questions;
            } else if (idx > 18 && idx < 21) {
                obj = readingHandler(idx, 17);
                question = obj.question;
            }

            // 显示问题前的处理
            questionBeforeShow();
            // 显示第idx道题
            $(me.options.mainwrap).append(question);
            GRE.domStorage = [];
            me.dataStorageInit();
            (idx > 8 && idx < 12) || idx === 17 || (idx > 18 && idx < 21) ? (function () {
                if (obj.qtype === 'select') {
                    $('#' + obj.id + ' .col-sub .bd ' + ' span').click(function (evt) {
                        var self = this;
                        if ($(self).hasClass('active')) {
                            return false;
                        }
                        $(self).addClass('active').siblings().removeClass('active');
                    });
                } else {
                    $('#' + obj.id + ' li').click(function (evt) {
                        var self = this;
                        if ($(self).hasClass('active')) {
                            return false;
                        }
                        if (obj.qtype === 'single') {
                            $(self).addClass('active').siblings().removeClass('active');
                        } else {
                            $(self).addClass('active');
                        }
                    });
                }
            })() : '';
        };

        var currentTime = 0,
            lastTime = 0;
        nextbtn.click(function (evt) {
            var self = this,
                href = $(self).attr('href');
            // 防止next按钮点击过快，至少相隔一秒钟
            currentTime = (new Date()).getTime();
            if (currentTime - lastTime < 1000) {
                return false;
            }
            // 重置mark按钮的样式
            markbtn.removeClass('mark-ck-btn').addClass('mark-btn');
            // 判断是否还有考试剩余时间
            GRE.timer.getCurrentTime() > 0 ? (function () {
                var reg = /\/(verbal|quantity)\/([0-9]+)/,
                    idx = '',
                    regs = [];
                if (reg.test(href)) {
                    regs = reg.exec(href);
                    idx = parseInt(regs[2]);
                    if (regs[1] === 'verbal') {
                        _verbalNext(idx);
                    } else {
                        _quantityNext(idx);
                    }
                } else {
                    switch (href) {
                        case '/ajax/section/nextTip':
                            if ($(me.options.nexttip).length == 0) {
                                GRE.get(href, {}, function (data) {
                                    data = jQuery.parseJSON(data);
                                    _sectionNext(data.content);
                                });
                            } else {
                                _sectionNext();
                            }
                            break;
                    }
                }
            }) () : '';
            lastTime = currentTime;
            return false;
        });
    },
    helpHandler : function () {
        var me = this;

        var _writingHelp = function (content) {
            // 隐藏J_header_bd下的子结点
            $(me.options.headerbd + ' > :visible').hide();
            // 显示help的tab
            $(me.options.helptab).length == 0 ? $(me.options.headerbd).append(content['tabHtml']) : $(me.options.helptab).show();
            // 显示第一个tab为current
            $(me.options.helptab  + ' a').removeClass('current');
            $(me.options.helptab + ' a:first').addClass('current');
            $(me.options.mainwrap + ' > :visible').hide();
            $(me.options.writingqd).show();
            // 绑定help的tab
            $(me.options.helptab + ' a').each(function (idx, ele) {
                $(ele).click(function (evt) {
                    var self = this;
                    if ($(self).hasClass('current')) {
                        return false;
                    }
                    $(me.options.helptab + ' a').removeClass('current');
                    $(self).addClass('current');
                    $(me.options.mainwrap + ' > :visible').hide();
                    switch (idx) {
                        case 0:
                            $(me.options.writingqd).show();
                            break;
                        case 1:
                            $(me.options.writingsd).length == 0 ? $(me.options.mainwrap).append(content['sdHtml']) : $(me.options.writingsd).show();
                            break;
                        case 2:
                            $(me.options.sectiongd).length == 0 ? $(me.options.mainwrap).append(content['gdHtml']) : $(me.options.sectiongd).show();
                            break;
                        case 3:
                            $(me.options.writingtt).length == 0 ? $(me.options.mainwrap).append(content['ttHtml']) : $(me.options.writingtt).show();
                            break;
                        case 4:
                            $(me.options.writinghta).length == 0 ? $(me.options.mainwrap).append(content['htaHtml']) : $(me.options.writinghta).show();
                            break;
                    }
                    return false;
                });
            });
            // operation区域更新，只显示return按钮，其余按钮全部关闭
            $(me.options.operation + ' a:visible').hide();
            $(me.options.returnbtn).show();
        };
        var _verbalHelp = function (content) {
            // 隐藏J_header_bd下的子结点
            $(me.options.headerbd + ' > :visible').hide();
            // 显示help的tab
            $(me.options.helptab).length == 0 ? $(me.options.headerbd).append(content['tabHtml']) : $(me.options.helptab).show();
            // 显示第一个tab为current
            $(me.options.helptab  + ' a').removeClass('current');
            $(me.options.helptab + ' a:first').addClass('current');
            $(me.options.mainwrap + ' > :visible').hide();
            $(me.options.verbalsd).show();
            // 绑定help的tab
            $(me.options.helptab + ' a').each(function (idx, ele) {
                $(ele).click(function (evt) {
                    var self = this;
                    if ($(self).hasClass('current')) {
                        return false;
                    }
                    $(me.options.helptab + ' a').removeClass('current');
                    $(self).addClass('current');
                    $(me.options.mainwrap + ' > :visible').hide();
                    switch (idx) {
                        case 0:
                            $(me.options.verbalsd).show();
                            break;
                        case 1:
                            $(me.options.sectiongd).length == 0 ? $(me.options.mainwrap).append(content['gdHtml']) : $(me.options.sectiongd).show();
                            break;
                        case 2:
                            $(me.options.verbaltt).length == 0 ? $(me.options.mainwrap).append(content['ttHtml']) : $(me.options.verbaltt).show();
                            break;
                    }
                    return false;
                });
            });
            // operation区域更新，只显示return按钮，其余按钮全部关闭
            $(me.options.operation + ' a:visible').hide();
            $(me.options.returnbtn).show();
        };
        var _quantityHelp = function (content) {
            // 隐藏J_header_bd下的子结点
            $(me.options.headerbd + ' > :visible').hide();
            // 显示help的tab
            $(me.options.helptab).length == 0 ? $(me.options.headerbd).append(content['tabHtml']) : $(me.options.helptab).show();
            // 显示第一个tab为current
            $(me.options.helptab  + ' a').removeClass('current');
            $(me.options.helptab + ' a:first').addClass('current');
            $(me.options.mainwrap + ' > :visible').hide();
            $(me.options.quantitysd).show();
            // 绑定help的tab
            $(me.options.helptab + ' a').each(function (idx, ele) {
                $(ele).click(function (evt) {
                    var self = this;
                    if ($(self).hasClass('current')) {
                        return false;
                    }
                    $(me.options.helptab + ' a').removeClass('current');
                    $(self).addClass('current');
                    $(me.options.mainwrap + ' > :visible').hide();
                    switch (idx) {
                        case 0:
                            $(me.options.quantitysd).show();
                            break;
                        case 1:
                            $(me.options.sectiongd).length == 0 ? $(me.options.mainwrap).append(content['gdHtml']) : $(me.options.sectiongd).show();
                            break;
                        case 2:
                            $(me.options.quantitytt).length == 0 ? $(me.options.mainwrap).append(content['ttHtml']) : $(me.options.quantitytt).show();
                            break;
                        case 3:
                            $(me.options.quantitycal).length == 0 ? $(me.options.mainwrap).append(content['calHtml']) : $(me.options.quantitycal).show();
                            break;
                    }
                    return false;
                });
            });
            // operation区域更新，只显示return按钮，其余按钮全部关闭
            $(me.options.operation + ' a:visible').hide();
            $(me.options.returnbtn).show();
        };

        // ajax异步加载后面的数据
        $(me.options.helpbtn).click(function (evt) {
            var self = this,
                href = $(self).attr('href'),
                helpTrack = function (callback) {
                    if ($(me.options.helptab).length === 0) {
                        GRE.get(href, {}, function (data) {
                            data = jQuery.parseJSON(data);
                            callback(data.content);
                        });
                    } else {
                        callback();
                    }
                };

            switch (href) {
                case '/ajax/writing/help':
                    helpTrack(_writingHelp);
                    break;
                case '/ajax/verbal/help':
                    helpTrack(_verbalHelp);
                    break;
                case '/ajax/quantity/help':
                    helpTrack(_quantityHelp);
                    break;
            };
            return false;
        });
    },
    markHandler : function () {
        var me = this,
            markbtn = $(me.options.markbtn),
            nextbtn = $(me.options.nextbtn);

        markbtn.click(function (evt) {
            var self = this,
                href = nextbtn.attr('href'),
                nextId = parseInt(/\/(verbal|quantity)\/([0-9]+)/.test(href) ? href.replace(/\/(verbal|quantity)\//, '') : 21),
                currentId = nextId - 1,
                type = 'verbal';
            if (/\/quantity/.test(location.pathname)) {
                type = 'quantity';
            }
            if ($(self).hasClass('mark-btn')) {
                $(self).removeClass('mark-btn').addClass('mark-ck-btn');
                jQuery.data($('#J_' + type + '-' + currentId)[0], 'marked', 1);
            } else {
                $(self).removeClass('mark-ck-btn').addClass('mark-btn');
                jQuery.data($('#J_' + type + '-' + currentId)[0], 'marked', 0);
            }
            return false;
        });
    },
    reviewHandler : function () {
        var me = this,
            reviewbtn = $(me.options.reviewbtn),
            type = /\/quantity/.test(location.pathname) ? 'quantity' : 'verbal',
            tplDOM = ['<section id="J_review-tip" class="review">',
                '<p>Below is the list of questions in the current section. The question you were on is highlighted. Questions you have seen are labeled <b>Answered</b>, <b>Incomplete</b>, or <b>Not Answered</b>. A question is labeled <b>Incomplete</b> if the question requires you to select a certain number of answer choices and you have selected more or fewer than that number. Questions you have marked are indicated with a <b>√</b>.</p>',
                '<p>To return to the question you were on, click <b>Return</b>.</p>',
                '<p>To go to a different question, click on that question to highlight it, then click <b>Go To Question</b>.</p>',
                '<div class="list">',
                '<table>',
                '<thead><tr><th class="col-1">Question Number</th><th>Status</th><th>Marked</th></tr></thead>',
                '<tbody>',
                '#{contentLeft}',
                '</tbody>',
                '</table>',
                '<table>',
                '<thead><tr><th class="col-1">Question Number</th><th>Status</th><th>Marked</th></tr></thead>',
                '<tbody>',
                '#{contentRight}',
                '</tbody>',
                '</table>',
                '</div>',
                '</section>'].join('');

        var getViewStatus = function (key) {
            if (type === 'verbal') {
                key = (key > 8 && key < 12) ? 8 : key;
                key = (key == 17) ? 16 : key;
                key = (key > 18 && key < 21) ? 18 : key;
            }
            var status = 'Not seen',
                marked = '',
                o = {},
                ele = $('#J_' + type + '-' + key);
            o.status = ele.length === 0 ? status : (function () {
                o.marked = (1 === jQuery.data(ele[0], 'marked')) ? '√' : '';
                var activecnt = 0,
                    answercnt = jQuery.data(ele[0], 'count'),
                    inputcnt;
                if (answercnt === -1 || typeof(answercnt) === "undefined") {
                    activecnt = ele.find('.active').length;
                    if (activecnt === 0) {
                        return 'Not Answered';
                    } else {
                        return 'Answered';
                    }
                } else {
                    activecnt = ele.find('li.active').length;
                    if (activecnt === 0) {
                        inputcnt = ele.find('input[value!=""]').length;
                        if (inputcnt === 0) {
                            return 'Not Answered';
                        } else if (inputcnt >= answercnt) {
                            return 'Answered';
                        } else {
                            return 'Incomplete';
                        }
                    } else if (activecnt >= answercnt) {
                        return 'Answered';
                    } else {
                        return 'Incomplete';
                    }
                }
            })();
            return o;
        }
        // 生成table中的html内容
        var tableBody = function (type) {
            var bodyHtml = '',
                key = 0,
                vs = {};
            if (type === 'left') {
                for (key = 1; key < 11; key++) {
                    vs = getViewStatus(key);
                    bodyHtml += ['<tr', vs.status === 'Not seen' ? ' class="disable"' : '', '><td class="col-1">', key, '</td>', '<td>', vs.status,
                        '</td><td>', vs.marked, '</td></tr>'].join('');
                }
            } else {
                for (key = 11; key < 21; key++) {
                    vs = getViewStatus(key);
                    bodyHtml += ['<tr', vs.status === 'Not seen' ? ' class="disable"' : '', '><td class="col-1">', key, '</td>', '<td>', vs.status,
                        '</td><td>', vs.marked, '</td></tr>'].join('');
                }
            }
            return bodyHtml;
        };
        // 点击review按钮的回调函数
        var verbalReview = function () {
            var reviewTip = $(me.options.reviewtip);
            $(me.options.mainwrap + ' > :visible').hide();
            if (reviewTip.length === 1) {
                reviewTip.remove();
            }
            $(me.options.mainwrap).append(GRE.stringFormat(tplDOM, {
                contentLeft : tableBody('left'),
                contentRight : tableBody('right')
            }));
            tableClick();
            // operation区域更新，只显示return按钮，其余按钮全部关闭
            $(me.options.operation + ' a:visible').hide();
            $(me.options.returnbtn).show();
            $(me.options.gotobtn).show();
        };
        // table的事件监听
        var tableClick = function () {
            var reviewTip = $(me.options.reviewtip),
                disabletrs = reviewTip.find('tbody tr[class!=disable]');
            disabletrs.last().addClass('enable');
            $.each(disabletrs, function (index, tr) {
                $(tr).click(function (evt) {
                    if ($(tr).hasClass('enable')) {
                        return false;
                    }
                    reviewTip.find('tbody tr.enable').removeClass('enable');
                    $(tr).addClass('enable');
                });
            });
        };
        reviewbtn.click(function (evt) {
            var self = this,
                href = $(self).attr('href');
            verbalReview();
            return false;
        });
    },
    gotoHandler : function () {
        var me = this,
            gotobtn = $(me.options.gotobtn),
            quittestbtn = $(me.options.quitTestbtn),
            exitsectionbtn = $(me.options.exitSectionbtn),
            markbtn = $(me.options.markbtn),
            reviewbtn = $(me.options.reviewbtn),
            helpbtn = $(me.options.helpbtn),
            backbtn = $(me.options.backbtn),
            nextbtn = $(me.options.nextbtn),
            type = /\/quantity/.test(location.pathname) ? 'quantity' : 'verbal';

        gotobtn.click(function (evt) {
            var key = $(me.options.reviewtip).find('tbody tr.enable').children().first().html(),
                showbtns = [quittestbtn[0], exitsectionbtn[0], markbtn[0], reviewbtn[0], helpbtn[0]];
            $(me.options.mainwrap + ' > :visible').hide();
            $(me.options.operation + ' a:visible').hide();
            $(me.options.questiontip).html('Question ' + key + ' of 20');
            // 检查该题被mark过
            if (1 === $.data($('#J_' + type + '-' + key)[0], 'marked')) {
                markbtn.removeClass('mark-btn').addClass('mark-ck-btn');
            }
            if (key == 1) {
                showbtns.push(nextbtn[0]);
            } else if (key > 1 && key < 21) {
                showbtns.push(backbtn[0]);
                showbtns.push(nextbtn[0]);
            }
            $(showbtns).show();
            $('#J_' + type + '-' + key).show();
            return false;
        });
    },
    init : function (options) {
        var me = this;
        me.options = $.extend({}, me.defconf, options);
        me.dataStorageInit();
        // 初始化几个按钮的操作
        me.continueHandler();
        me.quitTestHandler();
        me.exitSectionHandler();
        me.helpHandler();
        me.backHandler();
        me.nextHandler();
        me.markHandler();
        me.reviewHandler();
        me.returnHandler();
        me.gotoHandler();
    }
});
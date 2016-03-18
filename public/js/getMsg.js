//$(function () {
//    //消息推送回调函数
//    get_msg(getMsgUrl);
//});

/**
 * 异步轮询函数
 */
function get_msg (url) {
    $.getJSON(url, function (data) {
        console.log(data);
        window.msgData = data; //global var
        if (data.status) {
            news({ //推送消息
                "total" : data.total,
                "type" : data.type
            });
        }
        setTimeout(function () {  //调用自身循环5秒一次
            get_msg(url);
        }, 5000);
    });
}

/**
 * 推送的新消息
 * @param  {[type]} json {total:新消息的条数,type:（1：评论，2：私信，3：@我）}
 * @return {[type]}      [description]
 */
function news (json) {

    var flags = true;
    var obj = $('#news');
    var icon = obj.find('span');
    var icon1;
    switch (json.type) {
        case 1:
//            $('#news ul .news_comment').show().find('a').html(json.total + '条新评论');
            icon1 = $('#comment').find('span');
                icon1.text(json.total);
//            console.log(json.total + '条新评论');
            break;
        case 2:
//            $('#news ul .news_letter').show().find('a').html(json.total + '条新私信');
//            console.log(json.total + '条新私信');
            icon1 = $('#letter').find('span');
                icon1.text(json.total);
            break;
        case 3:
//            $('#news ul .news_atme').show().find('a').html(json.total + '条@提到我');
//            console.log(json.total + '条@提到我');
            icon1 = $('#announcement').find('span');
                icon1.text(json.total);
            break;
    }
    if (flags) {
        flags = false;
            var result=0;
            var aa;
            aa = $('#comment').find('span').text();
            if(aa!=''){
                result +=parseInt(aa);
            }
        console.log('result:'+result);
            aa = $('#letter').find('span').text();
            if(aa!=''){
                result +=parseInt(aa);
            }
        console.log('result:'+result);
            aa = $('#announcement').find('span').text();
            if(aa!=''){
                result +=parseInt(aa);
            }
        console.log('result:'+result);
            icon.text(result);

        var timerArr = $.blinkTitle.show();
        setTimeout(function() {//此处是过一定时间后自动消失
            $.blinkTitle.clear(timerArr);
        }, 10000);
        //若人为操作消失，只需如此调用：$.blinkTitle.clear(timerArr);
    }
}
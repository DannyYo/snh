@extends('home')
@section('title', '动态')
@section('content')
<div id="validation-errors" style="display: none"></div>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">与{{ $to->name }}的聊天</h3>
    </div>
    <div class="panel-footer">
        <div class='form-group'>
            <label class='control-label'>Reply </label>
            <div class='input-group'>
    <span class='input-group-addon'>
      @include('common.emoji-picker')
    </span>
                {!! Form::open( [ 'url' => ['letter/send'], 'method' => 'POST', 'id' => 'send', 'files' => true ] ) !!}
                <input type='text' class='form-control' id="saytext" placeholder="说点什么吧~" name="content">
                <input type="hidden" name="from" value="{{Auth::user()->id}}">
                <input type="hidden" name="to" value="{{$to->id}}">
                {!! Form::close() !!}
    <span class='input-group-btn'>
    <button class='btn btn-default' type='button' id="btn">回复</button>
    </span>
            </div>
        </div>
    </div>
    <div class="panel-body" >
        <ul id="message">
            @foreach($letters as $letter)
            <li><blockquote @if($letter->fromUser->name == $to->name) class='blockquote-reverse' @endIf><p>{!! $client->shortnameToImage($letter->content) !!}</p><small>{{$letter->fromUser->name}}</small></blockquote></li>
            @endForeach
            {!! $letters->appends(array('to'=>$to->id))->render() !!}
        </ul>
    </div>

</div>
@endSection
@section('styles')
<style type="text/css">
    ul {
        padding-left: 0px;
    }
    li {
        text-decoration: none;
        display: block;
    }
</style>
@endSection
@section('scripts')
<script type="text/javascript" src="/js/jquery.form.js"></script>
<script type="text/javascript" src="/js/emojione.js"></script>
<script>
    function get_letter(){
//        console.log(window.msgData.type);
        if(window.msgData){
        if(window.msgData.status && window.msgData.type == 2){
            var oMessage = document.getElementById("message");
            var aLi = oMessage.getElementsByTagName("li");
            $.getJSON("{{url('user/getLetter')}}"+'?take='+window.msgData.total, function (data) {
                data = data.reverse();
                $.each(data, function(){
                    var oLi =document.createElement("li");/*创建li元素*/
                    oLi.innerHTML =  "<blockquote class='blockquote-reverse'>"+
                        "<p>"+emojione.shortnameToImage(this)+"</p>"+
                        "<small>{{ $to->name }}</small>"+
                        "</blockquote>";

                    if(aLi.length>0)
                    {
                        oMessage.insertBefore(oLi,oMessage.firstChild);
                    }
                    /*当前没有li时，追加li元素*/
                    else{
                        oMessage.appendChild(oLi);
                    }
                });
            });
        }
        }
        setTimeout(function () {  //调用自身循环6秒一次
            get_letter();
        }, 6000);
    }
</script>
<script>
    //轮询    有letter就差n条（取n条最新letter的API）
     $(document).ready(function() {
         get_letter();
        var options = {
//            beforeSubmit: showRequest,
            success:showResponse,
            dataType: 'json'
        };
        var oTxt = document.getElementById("saytext");
        var oBtn = document.getElementById("btn");
        var oMessage = document.getElementById("message");
        var aLi = oMessage.getElementsByTagName("li");
        /*点击“留言”按钮，留言*/
        oBtn.onclick = function()
        {
            if(oTxt.value === "")
            {
                alert("请输入留言内容！！！")
            }
            else{
            $('#send').ajaxForm(options).submit();
            }
            /*输入内容不能为空*/
        }
        function showResponse(response){
            if (response.success == true) {
                var oLi =document.createElement("li");/*创建li元素*/
                oLi.innerHTML =  "<blockquote>"+
                    "<p>"+emojione.shortnameToImage(oTxt.value)+"</p>"+
                    "<small>{{ Auth::user()->name }}</small>"+
                    "</blockquote>";

                if(aLi.length>0)
                {
                    oMessage.insertBefore(oLi,oMessage.firstChild);
                }
                /*当前没有li时，追加li元素*/
                else{
                    oMessage.appendChild(oLi);
                }
                oTxt.value = '';

            }else{
                $("#validation-errors").append('<div class="alert alert-dismissible alert-danger">' +
                    '<button type="button" class="close" data-dismiss="alert">X</button><strong>'
                    + response.message +'</strong><div>');
                $("#validation-errors").show('slow');
            }
        }
    });
</script>
@endSection
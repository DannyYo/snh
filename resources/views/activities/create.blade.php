@extends('home')
@section('title', '创建活动')
@section('content')
<link rel="/ckeditor/css/samples.css">
<h1>创建一个活动~</h1>
<hr/>
{!! Form::open(['url'=>'activity/store','files' => true, 'method' => 'POST']) !!}
<div class="col-md-2">
<div class="form-group">
    <label class="control-label">标题</label>
    <input type="text" value="" name="title" class="form-control">
    <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
</div>
<div class="form-group">
    <label class="control-label">地点:</label>
    <div id="r-result"><input type="text" class="form-control" name="loc" id="suggestId" size="20" value="广州" style="width:150px;" /></div>
    <div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>
</div>
<div class="form-group">
    <label class="control-label">开始时间</label>
    <input size="16" type="text" value="2012-06-15 14:45" readonly class="form_datetime datepicker form-control" name="start">
</div>
<div class="form-group">
    <label class="control-label">结束时间</label>
    <input size="16" type="text" value="2012-06-15 14:45" readonly class="form_datetime datepicker form-control" name="end">
</div>
</div>
<div class="col-lg-4 col-lg-offset-1">
<div class="container">
    <div id='l-map'></div>
</div>
</div>
<div class="form-group col-lg-12">
    {!! Form::label('content','活动介绍:') !!}
    <div class="adjoined-bottom">
        <div class="grid-container">
            <div class="grid-width-100">
                <textarea id="editor" name="content">
                </textarea>
            </div>
        </div>
    </div>
    <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
</div>
<div class="form-group">
    {!! Form::submit('发布动态',['class'=>'btn btn-success form-control']) !!}
</div>
{!! Form::close() !!}
@endSection
@section("styles")
<style type="text/css">
    body, html{width: 100%;height: 100%;margin:0;font-family:"微软雅黑";font-size:14px;}
    #l-map{height:300px;width:500px;}
    #r-result{width:100%;}
</style>
@endSection
@section("scripts")
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=6ece499857417bc1fe7db2a9bf8b8b48"></script>
<script type="text/javascript">
    // 百度地图API功能
    function G(id) {
        return document.getElementById(id);
    }

    var map = new BMap.Map("l-map");
    map.centerAndZoom("广州",12);                   // 初始化地图,设置城市和地图级别。

    var ac = new BMap.Autocomplete(    //建立一个自动完成的对象
        {"input" : "suggestId"
            ,"location" : map
        });

    ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
        var str = "";
        var _value = e.fromitem.value;
        var value = "";
        if (e.fromitem.index > -1) {
            value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        }
        str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;

        value = "";
        if (e.toitem.index > -1) {
            _value = e.toitem.value;
            value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        }
        str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
        G("searchResultPanel").innerHTML = str;
    });

    var myValue;
    ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
        var _value = e.item.value;
        myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;

        setPlace();
    });

    function setPlace(){
        map.clearOverlays();    //清除地图上所有覆盖物
        function myFun(){
            var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
            map.centerAndZoom(pp, 18);
            map.addOverlay(new BMap.Marker(pp));    //添加标注
        }
        var local = new BMap.LocalSearch(map, { //智能搜索
            onSearchComplete: myFun
        });
        local.search(myValue);
    }
</script>
<script src="/ckeditor/ckeditor.js"></script>
<script src="/ckeditor/js/sample.js"></script>
<script>
    initSample();
</script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript">
    $("document").ready(function() {
        $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
    });
</script>
@endSection
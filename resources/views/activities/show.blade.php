@extends('home')
@section('title', '活动详情')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>{{$activity->title}}
            <small>
                @if($activity->start <= Carbon\Carbon::now() && $activity->end > Carbon\Carbon::now())
                 活动中
                @endIf
                @if($activity->start >= Carbon\Carbon::now())
                报名中
                @endIf
                @if($activity->end <= Carbon\Carbon::now())
                  已结束
                @endIf
            </small>
        </h2>
        <p><a href="/profile/{{$activity->user->id}}">{{$activity->user->name}}</a>  {{ $activity->created_at->format('M d') }} </p>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="control-label">地点:</label>
            <a class="fa fa-map-marker" id="showMap">{{$activity->loc}}</a>
        </div>
        <div class="form-group">
            <label class="control-label">时间</label>
            {{ $activity->start }} -  {{ $activity->end }}
        </div>
        <p class="col-lg-12">
            {!! $activity->content !!}
        </p>
        <div class="details col-lg-12">
            <ul class="nav nav-pills status">
                <li class="num"><a href="#">活动成员<span class="badge">{{count($activity->attendees)}}</span></a></li>
                <li class="attendees">
                    @foreach($activity->attendees as $attendee)
                    <div class="attendee"><a href="/profile/{{$attendee->id}}">{{$attendee->name}} </a></div>
                    @endForeach
                </li>
            </ul>
            @if($activity->is_joined)
            <a href="{{$activity->id}}" class="btn btn-default join btn-success"
            @if($activity->start < Carbon\Carbon::now())
            disabled="true"
            @endIf >已参加</a>
            @else
            <a href="{{$activity->id}}" class="btn btn-default join" @if($activity->start < Carbon\Carbon::now())
            disabled="true"
            @endIf>参加</a>
            @endIf
        </div>

    </div>
</div>
<div class="modal" id="mapModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title">地图</h4>
            </div>
            <div class="modal-body">
                <div id="allmap"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<style type="text/css">
    a:hover{
        text-decoration: none;
        cursor: pointer;
    }
    #allmap{
        height:300px;width:100%;
    }
    .modal-dialog{
        width: 1000px;
    }
    .status {
        border-bottom: 1px solid #e1e8ed;
        border-top: 1px solid #e1e8ed;
    }
    .status .num{
        border-right: 1px solid #e1e8ed;
    }
    .join{
        margin-top: 20px;
    }
    .attendee{
        display: inline;
        float: left;
        margin-left: 10px;
    }
</style>
@endsection
@section('scripts')
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=6ece499857417bc1fe7db2a9bf8b8b48"></script>
<script>
    $("document").ready(function(){
        $('#showMap').click(function(){
            // 百度地图API功能
            var map = new BMap.Map("allmap");
            var point = new BMap.Point(116.331398,39.897445);
            map.centerAndZoom(point,12);
            // 创建地址解析器实例
            var myGeo = new BMap.Geocoder();
            // 将地址解析结果显示在地图上,并调整地图视野
            myGeo.getPoint("{{$activity->loc}}", function(point){
                if (point) {
                    map.centerAndZoom(point, 16);
                    map.addOverlay(new BMap.Marker(point));
                }else{
                    alert("活动地址太偏僻啦!");
                }
            }, "广州市");
            $("#mapModal").modal('show');
        });
    });
</script>
<script>
    $("document").ready(function(){
        var $join = $('.join');
        $join.on('click', function(e){
            e.preventDefault();
            var  $button = $(this);
            if($button.attr("disabled"))
            return;
            var id;
            if($button.hasClass('btn-success')){
                var r = confirm("取消参加？");
                if (r == true) {
                    id = $(this).attr("href");
//                console.log(id);
                    joinOrNot(id,false)
                    $button.removeClass('btn-success');
                    $button.removeClass('btn-warning');
                    $button.text('参加');
                } else {
                    return;
                }
            } else {
                id = $(this).attr("href");
//                console.log(id);
                joinOrNot(id,true);
//                    console.log('success');
                $button.addClass('btn-success');
                $button.text('已参加');
            }
        });
        $join.hover(function(){
            $button = $(this);
            if($button.attr("disabled"))
                return;
            if($button.hasClass('btn-success')){
                $button.addClass('btn-warning');
                $button.text('取消参加');
            }
        }, function(){
            if($button.hasClass('btn-success')){
                $button.removeClass('btn-warning');
                $button.text('已参加');
            }
        });
        function joinOrNot(id, type){ //type: true + false -
            $.ajax({
                type : 'GET',
                url : "{{ url('users/join')}}"+'?id='+id+'&type='+type,
                dataType : 'json',
                json : 'callback',
                success : function(msg) {
                    if(msg == 'success'){
                        if(type){
                            alert('已参加');
                        }else
                            alert('已取消参加');
                    }else{
                        alert('你已经参加该用户')
                    }
                },
                error : function() {
                    alert('信息读取失败提示!');
                }
            });
        }
    });
</script>
@endSection
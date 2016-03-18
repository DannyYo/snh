@extends('home')
@section('title', '个人信息')
@section('content')
<div class="list-group">
    @foreach($follows as $follow)
    <a href="/profile/{{$follow->id}}" class="list-group-item" style="overflow: auto">
        <p class="list-group-item-text col-lg-6"> <img src="{{asset($follow->profile->avatar)}}"  height="170" width="250">
        <div class="col-lg-6">
            <div  class="form-group">
                <label for="inputUsername" class="col-lg-2 control-label">昵称</label>
                <div class="col-lg-10">
                    <div class="form-control">{{ $follow->profile->username }}</div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">性别</label>
                <div class="col-lg-10">
                    <div class="form-control">@if($follow->profile->sex == 0) 男 @else 女 @endIf</div>
                </div>
            </div>

            <div class="form-group">
                <label for="select" class="col-lg-2 control-label">地方</label>
                <div class="col-lg-10">
                    <div class="form-control">{{ $follow->profile->location }}</div>
                </div>
            </div>

            <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">自我介绍</label>
                <div class="col-lg-10">
                    <div class="form-control">{{ $follow->profile->intro }}</div>
                </div>
            </div>
        </div>
    </a>

    @endForeach
</div>
@endSection
@section('styles')
<style>
    .letter{
        margin-top: 10px;
    }
</style>
@endSection
@section('scripts')
<script>
    $("document").ready(function(){
        var $follow = $('.follow');
        $follow.on('click', function(e){
//            alert('clock');
            e.preventDefault();
            var  $button = $(this);
            var id;
            if($button.hasClass('btn-success')){
                var r = confirm("取消关注？");
                if (r == true) {
                    id = $(this).attr("href");
//                console.log(id);
                    followOrNot(id,false)
                    $button.removeClass('btn-success');
                    $button.removeClass('btn-warning');
                    $button.text('关注');
                } else {
                    return;
                }
            } else {
                id = $(this).attr("href");
//                console.log(id);
                followOrNot(id,true);
//                    console.log('success');
                $button.addClass('btn-success');
                $button.text('已关注');
            }
        });
        $follow.hover(function(){
            $button = $(this);
            if($button.hasClass('btn-success')){
                $button.addClass('btn-warning');
                $button.text('取消关注');
            }
        }, function(){
            if($button.hasClass('btn-success')){
                $button.removeClass('btn-warning');
                $button.text('已关注');
            }
        });
        function followOrNot(id, type){ //type: true + false -
            $.ajax({
                type : 'GET',
                url : "{{ url('users/follow')}}"+'?id='+id+'&type='+type,
                dataType : 'json',
                json : 'callback',
                success : function(msg) {
                    if(msg == 'success'){
                        if(type){
                            alert('已关注');
                        }else
                            alert('已取消关注');
                    }else{
                        alert('你已经关注该用户')
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



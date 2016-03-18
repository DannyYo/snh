@extends('home')
@section('title', '个人信息')
@section('content')
@if($profile)
<div class="well bs-component">
    <div class="col-lg-4 col-md-5 col-sm-6">
        <div>
                <img src="{{asset( $profile->avatar)}}"  height="170" width="250">
        </div>
        @if($profile->user_id == Auth::user()->id)
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <a href="{{ url('avatar/upload')  }}">编辑头像</a>
                <a href="{{ url('profile/'.$profile->id.'/edit')  }}">编辑资料</a>
            </div>
        </div>
        @else
            @if($profile->follow)
            <a href="{{$profile->user_id}}" class="btn btn-default follow btn-success">已关注</a>
            @else
            <a href="{{$profile->user_id}}" class="btn btn-default follow">关注</a>
            @endIf
        <a href="/letter?to={{$profile->user_id}}"><button class="btn btn-default letter" >私信</button></a>
        @endIf
    </div>
    <form method="POST" action="/profile/update/{{$profile->id}}" class="form-horizontal">
        <fieldset>
            {!! csrf_field() !!}
            <div  class="form-group">
                <label for="inputUsername" class="col-lg-2 control-label">昵称</label>
                <div class="col-lg-10">
                    <div class="form-control">{{ $profile->username }}</div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">性别</label>
                <div class="col-lg-10">
                    <div class="form-control">@if($profile->sex == 0) 男 @else 女 @endIf</div>
                </div>
            </div>

            <div class="form-group">
                <label for="select" class="col-lg-2 control-label">地方</label>
                <div class="col-lg-10">
                    <div class="form-control">{{ $profile->location }}</div>
                </div>
            </div>

            <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">自我介绍</label>
                <div class="col-lg-10">
                    <div class="form-control">{{ $profile->intro }}</div>
                </div>
            </div>
        </fieldset>
    </form>
</div>
            </div>
        </section>
    </div>
@endIf
@endSection
@section('styles')
<style>
    .follow{
        margin-top: 20px;
    }
    .letter{
        margin-top: 20px;
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



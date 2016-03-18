@extends('home')
@section('title', '动态')
@section('content')
<div class="form-group">
    <label class="control-label">Input addons</label>
    <div class="input-group ">
        <span class="input-group-addon"><img src="{{asset(Auth::user()->profile->avatar)}}" height="15px" width="15px"></span>
        <!-- <div type="text" class="form-control" row="5" id="moment-input"></div> -->
        <textarea class="form-control moment-input-1" id="moment-input"></textarea>
    </div>
    <div id="moment-input-footer" class="moment-input-footer">
        <a href="#upload"><i class="fa fa-picture-o">上传图片</i></a>
        <a href="#upload"><i class="fa fa-location-arrow">定位</i></a>
        <button class="btn btn-default" type="button" id="abutton"style="float: right;">发布</button>
        <div class="clearfix"></div>
    </div>
</div>


@foreach($moments as $moment)
<div class="panel panel-default">
    <div class="panel-heading">
        <p><a href="/profile/{{$moment->user->id}}">{{$moment->user->name}}</a>  {{ $moment->created_at->format('M d') }} </p>
    </div>
    <div class="panel-body">
        <p>
            {!! App\Helper::toHTML(mb_substr($client->shortnameToImage($moment->content),0,300)) !!}
            <a href="/moment/{{ $moment->id }}" class="fa fa-ellipsis-h"></a>
        </p>
    </div>
    <div class="panel-footer">
        <div class="details">
            @if(isset($moment->picture))
            <img src="{{ asset($moment->picture->pic) }}" class="m_img" />
            @endIf
            <ul class="nav nav-pills status">
                <li ><a href="#">Keep<span class="badge">{{ $moment->keep }}</span></a></li>
                <li ><a href="#">Like<span class="badge">{{ $moment->like }}</span></a></li>
            </ul>
            {{$moment->created_at->format('H:i - d M Y') }}· <a href="/moment/{{ $moment->id }}">Details <i class="fa fa-ellipsis-v"></i></a>

            @if(isset($moment->comments))
            @foreach($moment->comments as $comment)
            <div class='input-group single_comment'>
            <span class='input-group-addon'>
                {{ $comment->user->name}}
            </span>
                <div class='form-control'>{{ $comment->content}}</div>
            </div>
            @endForeach
            @endIF
        </div>
        <a name="reply" class="fa fa-reply">回复</a>
        <a href="{{ $moment->id }}" class="fa fa-thumbs-o-up like">赞</a>
        <a href="{{ $moment->id }}" class="fa fa-star keep">收藏</a>
    </div>

    <div class='panel-footer comment'>
        <label class='control-label'>Reply </label>
        {!! Form::open(['url'=>'comment/store']) !!}
        <div class='input-group'>
            <span class='input-group-addon'>
                <img src="{{asset(Auth::user()->profile->avatar)}}" height='15px' width='15px'>
            </span>
            <input type="hidden" value="{{$moment->id}}" name="moment_id">
            <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
            <input type='text' class='form-control' name="content">
            <span class='input-group-btn'>{!! Form::submit('回复',['class'=>'btn btn-default']) !!}</span>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endforeach
{!! $moments->render() !!}
@endsection
@section('styles')
<link rel="stylesheet" href="/css/emojione.css">
<style type="text/css">
    .input-group .moment-input-1 {
        height: 40px;resize:none;
    }
    .input-group .moment-input-2 {
        height: 40px;resize:none;
    }
    .moment-input-footer {
        display: none;
        margin-top:10px;
    }
    a:hover{
        text-decoration: none;
        cursor: pointer;
    }
    /* for 480px or less */
    @media screen and (max-width: 480px) {
        .status {
            border-right:none !important;
        }
    }
    .status {
        border-bottom: 1px solid #e1e8ed;
        border-top: 1px solid #e1e8ed;
        border-right: 1px solid #e1e8ed;
    }
    .details{
        display: none;
    }
    .comment{
        display: none;
    }
    .single_comment{
        margin: 20px 0;
    }
    .m_img{
        width:100px;
    }
    .aaa-success {
        color: #36a01d;
    }
</style>
@endsection
@section('scripts')
<script src="/js/popImg.js"></script>
<script>
    $(function(){
        $(".m_img").popImg();
    })
</script>
<script type="text/javascript">
    $(document).ready(function(e) {
        var $like = $('.like');
        var $keep = $('.keep');
        $like.on('click', function(e){
//            alert('clock');
            e.preventDefault();
            var  $button = $(this);
            var id;
            if($button.hasClass('aaa-success')){
                var r = confirm("取消？");
                if (r == true) {
                    id = $(this).attr("href");
//                console.log(id);
                    likeOrNot(id,false)
                        $button.removeClass('aaa-success');
                        $button.removeClass('aaa-warning');
                        $button.text('赞');
                } else {
                    return;
                }
            } else {
                 id = $(this).attr("href");
//                console.log(id);
                likeOrNot(id,true);
//                    console.log('success');
                    $button.addClass('aaa-success');
                    $button.text('已赞');
            }

        });
        $like.hover(function(){
            $button = $(this);
            if($button.hasClass('aaa-success')){
                $button.addClass('aaa-warning');
                $button.text('取消赞');
            }
        }, function(){
            if($button.hasClass('aaa-success')){
                $button.removeClass('aaa-warning');
                $button.text('已赞');
            }
        });
        function likeOrNot(id, type){ //type: true + false -
                $.ajax({
                    type : 'GET',
                    url : "{{ url('users/likeOrNot')}}"+'?id='+id+'&type='+type,
                    dataType : 'json',
                    json : 'callback',
                    success : function(msg) {
                        if(msg == 'success'){
                            if(type){
                                alert('已赞');
                            }else
                                alert('已取消赞');
                        }else{
                            alert('你已经赞过了')
                        }
                    },
                    error : function() {
                        alert('信息读取失败提示!');
                    }
                });
        }

        $keep.on('click', function(e){
//            alert('clock');
            e.preventDefault();
            var  $button = $(this);
            var id;
            if($button.hasClass('aaa-success')){
                var r = confirm("取消？");
                if (r == true) {
                    id = $(this).attr("href");
//                console.log(id);
                    keepOrNot(id,false)
                    $button.removeClass('aaa-success');
                    $button.removeClass('aaa-warning');
                    $button.text('收藏');
                } else {
                    return;
                }
            } else {
                id = $(this).attr("href");
//                console.log(id);
                keepOrNot(id,true);
//                    console.log('success');
                $button.addClass('aaa-success');
                $button.text('已收藏');
            }
        });
        $keep.hover(function(){
            $button = $(this);
            if($button.hasClass('aaa-success')){
                $button.addClass('aaa-warning');
                $button.text('取消收藏');
            }
        }, function(){
            if($button.hasClass('aaa-success')){
                $button.removeClass('aaa-warning');
                $button.text('已收藏');
            }
        });
        function keepOrNot(id, type){ //type: true + false -
            $.ajax({
                type : 'GET',
                url : "{{ url('users/keepOrNot')}}"+'?id='+id+'&type='+type,
                dataType : 'json',
                json : 'callback',
                success : function(msg) {
                    if(msg == 'success'){
                        if(type){
                            alert('已收藏');
                        }else
                            alert('已取消收藏');
                    }else{
                        alert('你已经收藏过了')
                    }
                },
                error : function() {
                    alert('信息读取失败提示!');
                }
            });
        }

        $(".panel-body").on("click",function(e) {
            $(this).parent().find(".details").toggle('slow');
        });

        $('#moment-input').bind({
            focus:function(){
                // alert('focus');
                $(this).animate({height:100},500 );
                $('#moment-input-footer').show();
                $(this).removeClass('moment-input-1');
                $(this).addClass('moment-input-2');
            },
            blur:function(){
                // alert('blur');
                $(this).animate({height:40},500 );
                $('#moment-input-footer').hide();
                $(this).removeClass('moment-input-2');
                $(this).addClass('moment-input-1');
            }
        });
    });
    $("a[name= 'reply']").one('click', function() {
        $(this).parent().parent().find('.comment').show('slow');
    })
</script>
@endsection
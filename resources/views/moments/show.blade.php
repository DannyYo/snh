@extends('home')
@section('title', '个人动态')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <p>DannyYo ‏@dannyyo_yo  Jan 25 </p>
    </div>
    <div class="panel-body">
        <p>
            {!! App\Helper::toHTML($client->shortnameToImage($moment->content)) !!}
        </p>
    </div>
    <div class="panel-footer">
        <p>
        <div class="details">
            @if(isset($moment->picture))
            <img src="{{ asset($moment->picture->pic) }}" class="m_img" />
            @endIf
            <ul class="nav nav-pills status">
                <li ><a href="#">Keep<span class="badge">{{ $moment->keep }}</span></a></li>
                <li ><a href="#">Like<span class="badge">{{ $moment->like }}</span></a></li>
            </ul>
            {{$moment->created_at->format('H:i - d M Y') }}  <br>
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
</div>
@endsection
@section('styles')
<link rel="stylesheet" href="/css/emojione.css">
<style type="text/css">

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
    .single_comment{
        margin: 20px 0;
    }

</style>
@endsection
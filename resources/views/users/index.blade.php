@extends('app')
@section('content')
@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
@foreach($users as $user)
<article class="format-image group" xmlns="http://www.w3.org/1999/html">
    <h2 class="post-title pad">
        <a href="/users/{{ $user->id }}"> {{ $user->account }}</a>
    </h2>
    <ul class="post-meta pad group">
        <li><i class="fa fa-clock-o"></i>{{ $user->registime->diffForHumans() }}</li>
        @if($user->types)
        @foreach($user->types as $tag)
        <li><i class="fa fa-tag"></i>{{ $tag->name }}</li>
        @endforeach
        @endif
    </ul>
    <div class="post-inner">
        <div class="post-deco">
            <div class="hex hex-small">
                <div class="hex-inner"><i class="fa"></i></div>
                <div class="corner-1"></div>
                <div class="corner-2"></div>
            </div>
        </div>
        <div class="post-content pad">
            <div class="entry custome">
                {{ $user->password }}
            </div>
            <a class="more-link-custom" href="/users/{{ $user->id }}"><span><i>更多</i></span></a>
        </div>
    </div>
</article>
@endforeach
<a class="more-link-custom" href="/users/create"><span><i>添加用户</i></span></a>
@endsection
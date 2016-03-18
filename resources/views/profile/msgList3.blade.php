@extends('home')
@section('title', '新公告列表')
@section('content')
<div class="list-group">
@foreach($msgs as $msg)
        <a href="/moment/{{$msg->id}}" class="list-group-item">
            <h4 class="list-group-item-heading">{!! mb_substr($client->shortnameToImage($msg->content),0,100) !!}</h4>
            <p class="list-group-item-text">{{$msg->user->name}} <small>{{ $msg->created_at}}</small></p>
        </a>
@endForeach
    {!! $msgs->render() !!}
</div>
@endSection
@section('styles')
<style>
</style>
@endSection
@section('scripts')
<script>
</script>
@endSection



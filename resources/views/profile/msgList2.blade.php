@extends('home')
@section('title', '新私信列表')
@section('content')
<div class="list-group">
@foreach($msgs as $msg)
        <a href="/letter?to={{$msg->fromUser->id}}" class="list-group-item">
            <h4 class="list-group-item-heading">{!! $client->shortnameToImage($msg->content) !!}</h4>
            <p class="list-group-item-text">{{$msg->fromUser->name}} <small>{{$msg->created_at}}</small></p>
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



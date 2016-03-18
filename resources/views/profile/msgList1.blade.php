@extends('home')
@section('title', '新评论列表')
@section('content')
<div class="list-group">
@foreach($msgs as $msg)
        <a href="/moment/{{$msg->moment_id}}" class="list-group-item">
            <h4 class="list-group-item-heading">{{$msg->content}}</h4>
            <p class="list-group-item-text">{{$msg->user->name}}</p>
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



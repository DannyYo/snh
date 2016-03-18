@extends('home')
@section('title', '活动列表')
@section('content')
@foreach($activities as $activity)
<div class="panel panel-default">
    <div class="panel-heading">
        <h2><a href="/activity/{{$activity->id}}">{{$activity->title}}</a>
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
        <p>
            {!! mb_substr($activity->content,0,20) !!}
            <a href="/activity/{{ $activity->id }}" class="fa fa-ellipsis-h"></a>
        </p>
    </div>
</div>
@endforeach
{!! $activities->render() !!}
@endsection
@section('styles')
<style type="text/css">
    a:hover{
        text-decoration: none;
        cursor: pointer;
    }
</style>
@endsection
@section('scripts')
@endsection
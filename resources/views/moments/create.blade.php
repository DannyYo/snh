@extends('home')
@section('title', '发布动态')
@section('content')
<h1>发布一下最近动态吧~</h1>
<hr/>
{!! Form::open(['url'=>'moment/store','files' => true, 'method' => 'POST']) !!}
<div class="form-group">
    {!! Form::label('content','正文:') !!}
    {!! Form::textarea('content',null,['class'=>'form-control', 'id'=>'saytext']) !!}
    @include('common.emoji-picker')
    <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
</div>
<div class="form-group">
<i class="fa fa-picture-o">上传图片</i>
    <input name="image" id="image" type="file">
</div>

<div class="form-group">
    {!! Form::submit('发布动态',['class'=>'btn btn-success form-control']) !!}
</div>
{!! Form::close() !!}
@endSection

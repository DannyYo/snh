@extends('app')
@section('content')
<h1>新用户</h1>
<hr/>
<a class="ds-like-thread-button" href="/"><span><i>返回</i></span></a>
<br/>
{!! Form::open(['url'=>'users/store']) !!}
<div class="form-group">
    {!! Form::label('account','用户名:') !!}
    {!! Form::text('account',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password','密码:') !!}
    {!! Form::text('password',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content','正文:') !!}
    {!! Form::textarea('content',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('添加用户',['class'=>'btn btn-success form-control']) !!}
</div>
{!! Form::close() !!}

@endsection
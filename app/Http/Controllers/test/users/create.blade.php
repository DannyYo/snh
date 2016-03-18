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
    {!! Form::input('password','password',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation','再输入一次:') !!}
    {!! Form::text('password_confirmation',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email','邮箱:') !!}
    {!! Form::text('email',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content','正文:') !!}
    {!! Form::textarea('content',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('registime','注册日期') !!}
    {!! Form::input('date','registime',date('Y-m-d'),['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('type_list','选择用户类型') !!}
    {!! Form::select('type_list[]',$types,null,['class'=>'form-control js-example-basic-multiple','multiple'=>'multiple']) !!}
</div>
@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
<div class="form-group">
    {!! Form::submit('添加用户',['class'=>'btn btn-success form-control']) !!}
</div>
{!! Form::close() !!}
<script type="text/javascript">
    $(function() {
        $(".js-example-basic-multiple").select2({
            placeholder: "添加标签"
        });
    });
</script>
@endsection
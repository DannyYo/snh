@extends('app')
@section('content')
<h1>修改用户:{{ $user->account }}</h1>
<hr/>
<a class="ds-like-thread-button" href="/"><span><i>返回</i></span></a>
<br/>
{!! Form::model($user,['url'=>'user/update']) !!}
{!! Form::hidden('id',$user->id) !!}
<div class="form-group">
    {!! Form::label('account','用户名:') !!}
    {!! Form::text('account',$user->account,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password','密码:') !!}
    {!! Form::input('password','password',$user->password,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation','再输入一次:') !!}
    {!! Form::text('password_confirmation',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email','邮箱:') !!}
    {!! Form::text('email',$user->email,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content','正文:') !!}
    {!! Form::textarea('content',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('registime','注册日期') !!}
    {!! Form::input('date','registime',$user->registime->format('Y-m-d'),['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('type_list','选择用户类型') !!}
    {!! Form::select('type_list[]',$types,null,['class'=>'form-control js-example-basic-multiple','multiple'=>'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::submit('修改用户',['class'=>'btn btn-success form-control']) !!}
</div>
@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

{!! Form::close() !!}
<script type="text/javascript">
    $(function() {
        $(".js-example-basic-multiple").select2({
            placeholder: "添加标签"
        });
    });
</script>
@endsection
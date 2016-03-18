@extends('home')
@section('title', '登录')
@section('content')
@include('common.login-form')
<div class="modal-footer">
<p>忘记密码了? 去 <a href="/auth/register">找回密码</a></p>
</div>
@endsection
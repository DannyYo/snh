@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="/password/reset">
    {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">

    <div>
        Email：<input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        新密码：<input type="password" name="password">
    </div>

    <div>
        确认密码：<input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">
            重置密码
        </button>
    </div>
</form>
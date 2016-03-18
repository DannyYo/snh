<div class="well bs-component">
    <form method="POST" action="/auth/register" class="form-horizontal">
        <fieldset>
            {!! csrf_field() !!}
            <!--    防止CSRF攻击-->
            <div  class="form-group">
                <label for="inputUsername" class="col-lg-2 control-label">用户名</label>
                <div class="col-lg-10">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="用户名">
                </div>
            </div>

            <div  class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">邮箱</label>
                <div class="col-lg-10">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="邮箱">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">密码</label>
                <div class="col-lg-10">
                    <input type="password" name="password" id="password" class="form-control" placeholder="密码至少6位">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">确认密码</label>
                <div class="col-lg-10">
                    <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="再次输入密码">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">重置</button>
                    <button type="submit" class="btn btn-primary">注册</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>
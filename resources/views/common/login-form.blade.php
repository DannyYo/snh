<div class="modal-body">
<div class="well bs-component">
    <form method="POST" action="/auth/login" class="form-horizontal">
        <fieldset>
            {!! csrf_field() !!}
            <div  class="form-group">
                <label for="inputAccount" class="col-lg-2 control-label">用户名</label>
                <div class="col-lg-10">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="用户名不是邮箱哦~">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">密码</label>
                <div class="col-lg-10">
                    <input type="password" name="password" id="password" class="form-control" placeholder="密码至少6位">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> 记住我
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">重置</button>
                    <button type="submit" class="btn btn-primary">登陆</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
</div>
<div class="modal-footer">
    <p>没有账号? 去 <a href="/auth/register">注册</a></p>
</div>
<div class="well bs-component">
    <form method="POST" action="/auth/register" class="form-horizontal">
        <fieldset>
            {!! csrf_field() !!}
            <!--    防止CSRF攻击-->
            <div  class="form-group">
                <label for="inputUsername" class="col-lg-2 control-label">Username</label>
                <div class="col-lg-10">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Username">
                </div>
            </div>

            <div  class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Username">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Password_Confirm</label>
                <div class="col-lg-10">
                    <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Password again">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">register</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>
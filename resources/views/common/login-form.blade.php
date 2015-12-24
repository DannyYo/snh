<div class="well bs-component">
    <form method="POST" action="/auth/login" class="form-horizontal">
        <fieldset>
            {!! csrf_field() !!}
            <div  class="form-group">
                <label for="inputAccount" class="col-lg-2 control-label">Account</label>
                <div class="col-lg-10">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Account">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
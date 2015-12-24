<script type='text/javascript' src='/js/city.js'/>
@if($profile)
<div class="well bs-component">
    <form method="POST" action="/profile/update" class="form-horizontal">
        <fieldset>
            {!! csrf_field() !!}
            <div  class="form-group">
                <label for="inputUsername" class="col-lg-2 control-label">Username</label>
                <div class="col-lg-10">
                    <input type="text" name="name" value="{{ $profile->username }}" class="form-control" placeholder="Username">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Sex</label>
                <div class="col-lg-10">
                    <div class="radio">
                        <label>
                            <input name="sex" id="Male" value="Male" checked="" type="radio">
                            Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input name="sex" id="Female" value="Female" type="radio">
                            Female
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="select" class="col-lg-2 control-label">Location</label>
                <div class="col-lg-10">
                    <select class="form-control" id="select1" name="province">
                        <option value="">please select</option>
                    </select>
                    <br>
                    <select class="form-control" id="select2" name="city">
                        <option value="">please select</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Introduction</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" id="textArea" name="introduction">{{ $profile->intro }}</textarea>
                    <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
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
@endIf
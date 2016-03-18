@extends('home')
@section('title', '修改个人信息')
@section('content')
<div class="well bs-component">
    {!! Form::open( array('url' => route('profile.update',$profile->id), 'method' => 'put', 'class' => 'form-horizontal') ) !!}
            <div  class="form-group">
                <label for="inputUsername" class="col-lg-2 control-label">昵称</label>
                <div class="col-lg-10">
                    <input type="text" name="username" value="{{ $profile->username }}" class="form-control" placeholder="昵称">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">性别</label>
                <div class="col-lg-10">
                    <div class="radio">
                        <label>
                            <input name="sex" id="Male" value="0" type="radio" @if($profile->sex == 0) checked="checked" @endIf >
                              男
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input name="sex" id="Female" value="1"  type="radio" @if($profile->sex == 1) checked="checked" @endIf>
                              女
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="select" class="col-lg-2 control-label">地方</label>
                <div class="col-lg-10">
                    <select class="form-control" id="select1" name="province">
                        <option value="{{$profile->province}}">{{ $profile->province or '请选择' }}</option>
                    </select>
                    <br>
                    <select class="form-control" id="select2" name="city">
                        <option value="{{$profile->city}}">{{ $profile->city or '请选择' }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">自我介绍</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" id="textArea" name="intro">{{ $profile->intro }}</textarea>
                    <span class="help-block">一个好的自我介绍可以帮你交到更多朋友哦~~</span>
                </div>
            </div>

            <div class="form-group" id="style">
                <label class="col-lg-2 control-label">网站风格</label>
                <div class="col-lg-10">
                    <div class="radio">
                        <label>
                            <input name="style" value="default" type="radio" @if($profile->style == 'default'|| empty($profile->style)) checked="checked" @endIf >
                            default
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input name="style" value="darkly"  type="radio" @if($profile->style == 'darkly') checked="checked" @endIf>
                            darkly
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input name="style" value="sandstone"  type="radio" @if($profile->style == 'sandstone') checked="checked" @endIf>
                            sandstone
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>
            </div>
        {!!Form::close()!!}
</div>
@endsection

@section('scripts')
<script>
    $('document').ready(function(){
        $(":radio[name='style']").click(function() {
            $("link[name='style']").attr("href",'/bootswatch/'+$(this).attr('value')+'/bootstrap.min.css');
        });
    });
</script>
<script type='text/javascript' src='/js/city.js'></script>
<script>
    $("document").ready(function () {
        //城市联动
        var province = '';

        $.each(city, function (i, k) {
            province += '<option value="' + k.name + '" index="' + i + '">' + k.name + '</option>';
        });
        $('select[name=province]').append(province).change(function () { //change事件
            var option = '';
            if ($(this).val() == '') {
                option += '<option value="">请选择</option>';
            } else {
                var index = $(':selected', this).attr('index');
                var data = city[index].child;
                for (var i = 0; i < data.length; i++) {
                    option += '<option value="' + data[i] + '">' + data[i] + '</option>';
                }
            }
            $('select[name=city]').html(option);
        });
    });
</script>
@endsection
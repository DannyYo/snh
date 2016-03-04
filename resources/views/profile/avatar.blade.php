@extends('home')
@section('title', '上传头像')
@section('content')
<div class="profile-header">
    <img id="user-avatar" >
    <div id="preview-pane">
        <div class="preview-container">
            <img src="{{asset(Auth::user()->profile->avatar)}}" class="jcrop-preview" alt="Preview" id ="preview"/>
        </div>
    </div>

    <div class="panel panel-default">
    <div id="validation-errors"></div>
    <div class="avatar-upload" id="avatar-upload">
    {!! Form::open( [ 'url' => ['/avatar/upload'], 'method' => 'POST', 'id' => 'upload', 'files' => true ] ) !!}
    <div href="#" class="btn button-change-profile-picture">
        <label for="upload-profile-picture">
            <span id="upload-avatar">更换新头像</span>
            <input name="image" id="image" type="file" class="manual-file-chooser js-manual-file-chooser js-avatar-field">
        </label>
    </div>
    {!! Form::close() !!}
    <div class="span5">
        <div id="output" style="display:none">
        </div>
    </div>

        <div style="display: inline-block">
        {!! Form::open( [ 'url' => ['/avatar/uploadCrop'], 'method' => 'POST', 'id' => 'uploadCrop',  'files' => true ] ) !!}
            <input type="hidden" id="x" name="x" />
            <input type="hidden" id="y" name="y" />
            <input type="hidden" id="w" name="w" />
            <input type="hidden" id="h" name="h" />
            <input type="hidden" id="src" name="src" />
            <input type="hidden" id="tarW" name="tarW" />
            <input type="hidden" id="tarH" name="tarH" />
        {!! Form::close() !!}
            <button class="btn btn-primary" id="submitU">确认上传</button>
        </div>
</div>
</div>
@endSection
@section('scripts')
<script type="text/javascript" src="/js/jcrop/jquery.min.js"></script>
<script type="text/javascript" src="/js/jcrop/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>
<script>
    $(document).ready(function() {
        var options = {
            beforeSubmit: showRequest,
            success:showResponse,
            dataType: 'json'
        };
        $('#image').on('change', function(){
            $('#upload-avatar').html('正在上传...');
            $('#upload').ajaxForm(options).submit();
        });

    function showRequest() {
        //TODO    重新上传图片当前图片不改变
        //  $('#user-avatar').attr('src',"");
        $("#validation-errors").hide().empty();
        $("#output").css('display','none');
        return true;
    }

    // Create variables (in this scope) to hold the API and image size
    var jCropApi,
        boundX,
        boundY,
        xSize, ySize;

    // Grab some information about the preview pane
    var $preview = $('#preview-pane');
    var $pcnt = $('#preview-pane .preview-container');
    //var $pimg = $('#preview-pane .preview-container img');

    xSize = $pcnt.width();
    ySize = $pcnt.height();

    function showResponse(response)  {
        if(response.success == false)
        {
            $("#validation-errors").append('<div class="alert alert-dismissible alert-danger">' +
                '<button type="button" class="close" data-dismiss="alert">X</button><strong>'
                + response.message +'</strong><div>');
            $("#validation-errors").show('slow');
        } else {
//            TODO    图片尺寸过大时处理（移动端处理）
             $('#upload-avatar').html('请裁剪出合适大小...');
            var $u = $('#user-avatar');
            $u.attr('src',response.avatar);
            var $pImg = $('#preview');
            $pImg.attr('src',response.avatar);

            //剪裁参数
            $('#src').val(response.avatar);
            $('#tarW').val(xSize);
            $('#tarH').val(ySize);

            $u.Jcrop({
                aspectRatio: xSize / ySize,
                onSelect: updatePreview,
                setSelect: updatePreview
            },function(){
                // Use the API to get the real image size
                var bounds = this.getBounds();
                boundX = bounds[0];
                boundY = bounds[1];
                // Store the API in the jCropApi variable
                jCropApi = this;

                // Move the preview into the jCrop container for css positioning
                $preview.appendTo(jCropApi.ui.holder);
            });
        }
    }

    function updatePreview(c)
    {
        if (parseInt(c.w) > 0)
        {
            var rx = xSize / c.w;
            var ry = ySize / c.h;

            $('#preview').css({
                width: Math.round(rx * boundX) + 'px',
                height: Math.round(ry * boundY) + 'px',
                marginLeft: '-' + Math.round(rx * c.x) + 'px',
                marginTop: '-' + Math.round(ry * c.y) + 'px'
            });

            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        }
    }
    var options2 = {
        success:showResponse2,
        dataType: 'json'
    };
    $('#submitU').on('click', function(){
        $('#uploadCrop').ajaxForm(options2).submit();
    });
    function showResponse2(){
        alert('修改头像成功');
        setTimeout("location.href='/profile'",1000);
    }
    });
</script>
@endSection
@section('styles')
    <link rel="stylesheet" href="/css/jcrop/jquery.Jcrop.css" type="text/css" />
    <style type="text/css">

        /* Apply these styles only when #preview-pane has
           been placed within the Jcrop widget */
        .jcrop-holder #preview-pane {
            display: block;
            position: absolute;
            z-index: 2000;
            top: 10px;
            right: -280px;
            padding: 6px;
            border: 1px rgba(0,0,0,.4) solid;
            background-color: white;

            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            border-radius: 6px;

            -webkit-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
            box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
        }

        /* The Javascript code will set the aspect ratio of the crop
           area based on the size of the thumbnail preview,
           specified here */
        #preview-pane .preview-container {
            width: 250px;
            height: 170px;
            overflow: hidden;
        }

    </style>
@endSection
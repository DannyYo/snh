<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <!-- Bootstrap darkly-->
    @if(Auth::user() && Auth::user()->profile->style)
    <link name="style" href="/bootswatch/{{Auth::user()->profile->style}}/bootstrap.min.css" rel="stylesheet">
    @else
    <link name="style" href="/bootswatch/default/bootstrap.min.css" rel="stylesheet">
    @endif

    <link href="/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.min.js" charset="UTF-8"></script>
    <script src="/js/bootstrap.min.js" charset="UTF-8"></script>

    <!--[if lt IE 9]>
    <script src="/js/respond-1.1.0.min.js"></script>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/html5element.js"></script>
    <![endif]-->

<title>SNH|@yield('title')</title>


<!--    <link rel='stylesheet' href="/css/bootstrap.min.css" type='text/css' media='all'/>-->
<!--    <link rel='stylesheet' href="/css/all.css" type='text/css' media='all'/>-->
<!--    <script type='text/javascript' src="/js/all.js"></script>-->
<link rel='stylesheet' href="/css/select2.css" type='text/css' media='all'/>
<link rel="stylesheet" href="/css/font-awesome.min.css">
<script src="/js/select2.full.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/jquery.inview.js" charset="UTF-8"></script>
<script type="text/javascript" src="/js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/js/my.js"></script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
@yield('styles')
</head>
<body>
<!--   navbar   -->
@include('common.navbar')
@include('common.likenshare')
<!--contain-->
<div id="top"></div>
<div class="container">
    <section class="content">
        <div class="pad group">

            @if(is_object($errors))
            @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<!--                <p><i class="icon fa fa-ban"></i>填写表单出错了哦！</p>-->
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @else
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<!--                <p><i class="icon fa fa-ban"></i>  出错了哦！</p>-->
                <ul>
                    <li>{{ $errors }}</li>
                </ul>
            </div>
            @endif

            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><i class="icon fa fa-check"></i>  {{Session::get('message')}}</p>

            </div>
            @endif

            @yield('content')
        </div>
    </section>
</div>

<!--login form-->
<div class="modal fade" id="login-form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title">登陆</h4>
            </div>
                @include('common.login-form')
        </div>
    </div>
</div>

<script>
    $('document').ready(function(){
        $('#lor').bind('click', function(){
           $('#login-form').modal('show');
        });
        $('#navbar').scrollToFixed(); //固定在顶部
        $('.main-nav li a').bind('click',function(event){
            var $anchor = $(this);

            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 102
            }, 1500,'easeInOutExpo');
            /*
             if you don't want to use the easing effects:
             $('html, body').stop().animate({
             scrollTop: $($anchor.attr('href')).offset().top
             }, 1000);
             */
            event.preventDefault();
        });
    });
</script>

@yield('scripts')
@include('common.footer')
</body>
</html>
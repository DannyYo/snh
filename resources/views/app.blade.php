<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>SNH|运动分享网站</title>

    <!-- Bootstrap darkly-->
    <link href="/darkly/css/bootstrap.min.css" rel="stylesheet">


      <link href="/css/bootstrap-datetimepicker.css" rel="stylesheet">
      <link rel="stylesheet" href="/darkly/assets/css/custom.min.css">

<!--[if lt IE 9]>
    <script src="/darkly/js/respond-1.1.0.min.js"></script>
    <script src="/darkly/js/html5shiv.js"></script>
    <script src="/darkly/js/html5element.js"></script>
<![endif]-->


<!--    <link rel='stylesheet' href="/css/bootstrap.min.css" type='text/css' media='all'/>-->
<!--    <link rel='stylesheet' href="/css/all.css" type='text/css' media='all'/>-->
<!--    <script type='text/javascript' src="/js/all.js"></script>-->
    <link rel='stylesheet' href="/css/select2.css" type='text/css' media='all'/>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.min.js" charset="UTF-8"></script>
    <script src="/js/select2.full.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/darkly/js/bootstrap.min.js" charset="UTF-8"></script>
    <script src="/js/jquery.inview.js" charset="UTF-8"></script>
    <script type="text/javascript" src="/js/jquery-scrolltofixed.js"></script>
    <script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="/js/my.js"></script>
    <script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
    <style>
        .go-top.show {
            opacity: 1;
            visibility: visible;
            bottom: 11px;
        }
        .go-top.show:hover {
            background-color: #FFFFFF;
            color:#D65050;
            text-decoration: none;
        }
        .go-top {
            background-color: #D65050;
            position: fixed !important;
            right: 20px;
            bottom: -45px;
            color: #FFF;
            display: block;
            font-size: 22px;
            line-height: 35px;
            text-align: center;
            width: 40px;
            height: 40px;
            visibility: hidden;
            opacity: 0;
            z-index: 9999;
            cursor: pointer;
            border-radius: 2px;
        }
    </style>
</head>
<body>
<!--login-errors-->
@if (count($errors) > 0)
<script type="text/javascript">
    $("document").ready(function(){
        $("#login-form").modal("show");
    });
</script>
@endif

<!--   navbar   -->
@include('common.navbar')

<!--contain-->
<div id="top"></div>
<div class="container">
    <section class="content">
        <div class="pad group">
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
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                @include('common.error-list')
                @include('common.login-form')
            </div>
            <div class="modal-footer">
                <p>No account? Go to <a href="/auth/register">register</a></p>
            </div>
        </div>
    </div>
</div>

<!-- go-top button -->
<a class="go-top" href="#top"  id="go-top"><i class="icon-angle-up"></i></a>

<script>
    $('document').ready(function(){
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
    window.onscroll = function () {
        if (document.documentElement.scrollTop + document.body.scrollTop > 1500) {
            $("#go-top").addClass('show');
        }
        else {
            $("#go-top").removeClass('show');
        }
    }
    $("#go-top").on("click",function(event){
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
</script>

</body>
</html>
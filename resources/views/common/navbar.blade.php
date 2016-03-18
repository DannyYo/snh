<div class="container">
    <div class="bs-component">
        <nav class="navbar navbar-inverse" id="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('home')  }}">SNH</a>
                </div>
                <div class="collapse navbar-collapse bs-js-navbar-scrollspy" id="bs-example-navbar-collapse-2">
                    <ul class="nav navbar-nav main-nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">社交 <i class="fa fa-users"> </i><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('moments/hot')}}" >热门动态</a></li>
                                <li><a href="{{ url('moments/relative')}}" >好友动态</a></li>
                                <li><a href="{{ url('activity')}}">活动</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">健康 <i class="fa fa-heartbeat"> </i><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('users/chart')}}">记录体重</a></li>
                                <li><a href="{{ url('users/report')}}">身体报告</a></li>
                                <li><a href="{{ url('users/hc')}}">健康计算器</a></li>
                            </ul>
                        </li>
                        @if(Request::is('/','home'))
                        <li><a href="#function">功能</a></li>
                        <li><a href="#platform">平台</a></li>
                        <li><a href="#concept">理念</a></li>
                        <li><a href="#attention">注意</a></li>
                        @endIf
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::check())
                        <li class="nav-login">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">发布<i class="fa fa-plus"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('activity/create')}}" ><i class="fa fa-plus-square"></i> 创建活动</a></li>
                                <li><a href="{{ url('moment/create')}}" ><i class="fa fa-pencil-square-o"></i> 发布动态</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id="news">消息 <i class="fa fa-envelope"> <span class="badge"></span></i></a>
                            <ul class="dropdown-menu list-group">
                                <li class="list-group-item"><a href="{{ url('user/msgList1')}}" id="comment"><i class="fa fa-comments"></i>评论<span class="badge"></span></a></li>
                                <li class="list-group-item"><a href="{{ url('user/msgList2')}}" id="letter"><i class="fa fa-paper-plane"></i>私信 <span class="badge"></span></a></li>
                                <li class="list-group-item"><a href="{{ url('user/msgList3')}}" id="announcement"><i class="fa fa-bullhorn"></i>公告 <span class="badge"></span></a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('profile')}}" ><img src="{{asset(Auth::user()->profile->avatar)}}" class="avatar avatar-16" height="170" width="250"></a></li>
                                <li><a href="{{ url('profile')  }}">个人资料</a></li>
                                <li><a href="{{ url('moment')}}" >个人动态</a></li>
                                <li class="divider"></li>
                                <li><a href="{{url('activity/attendedActivities')}}">我的活动 </a> </li>
                                <li><a href="{{url('profile/friendList')}}">我的好友 </a> </li>
                                <li class="divider"></li>
                                <li><a href="{{ url('auth/logout') }}">退出</a></li>
                            </ul>
                        </li>
                        @else
                            <li><a data-toggle="modal" data-target="" id="lor">登录or注册</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<style>
    .nav > li:hover .dropdown-menu {display: block;}
</style>
<script type="text/javascript">
    (function($) {
        $.extend({
            /**
             * 调用方法： var timerArr = $.blinkTitle.show();
             *     $.blinkTitle.clear(timerArr);
             */
            blinkTitle : {
                show : function() { //有新消息时在title处闪烁提示
                    var step=0, _title = document.title;
                    var timer = setInterval(function() {
                        step++;
                        if (step==3) {step=1};
                        if (step==1) {document.title='【　　　】'+_title};
                        if (step==2) {document.title='【新消息】'+_title};
                    }, 500);
                    return [timer, _title];
                },
                /**
                 * @param timerArr[0], timer标记
                 * @param timerArr[1], 初始的title文本内容
                 */
                clear : function(timerArr) {
                    //去除闪烁提示，恢复初始title文本
                    if(timerArr) {
                        clearInterval(timerArr[0]);
                        document.title = timerArr[1];
                    };
                }
            }
        });
    })(jQuery);
</script>
<script src="/js/getMsg.js"></script>
<script>
    $(function () {
        //消息推送回调函数
        get_msg("{{url('user/getMsg')}}");
    });
</script>


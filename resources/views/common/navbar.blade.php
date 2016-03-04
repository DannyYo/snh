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
                        <li class="{{ Request::is('moments/hot') ? 'active' : '' }}"><a href="{{ url('moments/hot')}}" >热门动态</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">健康 <span class="caret"></span></a>
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
                        <li class="{{ Request::is('moments/relative') ? 'active' : '' }}"><a href="{{ url('moments/relative')}}" >好友动态</a></li>
                        @if(Auth::check())
                        <li class="nav-login">
                        <li class="{{ Request::is('moment/create', 'moment/create/*') ? 'active' : '' }}"><a href="{{ url('moment/create')}}" >发布动态</a></li>
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
{{--  获取数据库数据  --}}
<?php $data = Illuminate\Support\Facades\DB::table('navbar')->where('is_show', '=', 1)->get();
$meta_name = Illuminate\Support\Facades\DB::table('meta')->where('is_show', '=', 1)->get();
$meta_http = Illuminate\Support\Facades\DB::table('meta')->where('is_show', '=', 2)->get();

?>

<html>
<head>
    <title>应用程序名称 - @yield('title')</title>
</head>
<body>
@section('sidebar')

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>企业站</title>
    ﻿<meta charset="UTF-8">
    @foreach($meta_name as $key => $val)
        <meta name="{{$val->meta_name}}" content="{{$val->content}}">
    @endforeach

    @foreach($meta_http as $key => $val)
        <meta name="{{$val->http_equiv}}" content="{{$val->content}}">
    @endforeach
<link rel="stylesheet" href="{{URL::asset('css/default.min.css?t=227')}}" />
<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/jquery.min.jsjs/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/modernizr.js')}}"></script>
<script src="{{URL::asset('js/amazeui.ie8polyfill.min.js')}}"></script>
<![endif]-->
<script type="text/javascript" src="{{URL::asset('js/main.min.js?t=1')}}"></script>
</head>

<body>
    <header class="header">
    <div class="header-container">
        <div class="header-div pull-left">
                <a class="header-logo">
                    <img src="{{ URL::asset('img/logo.png') }}" />
                </a>
            <button class="am-show-sm-only am-collapsed font f-btn" data-am-collapse="{target: '.header-nav'}">&#xe68b;</button>
        </div>


        <nav>
            <ul class="header-nav am-collapse">
                <li class="on"><a href="{{URL::asset('/')}}">{{ trans('welcome.home') }}</a></li>
                @foreach($data as $key => $val)
                    <li><a href="{{$val->catalog}}">{{$val->navbar_name}}</a></li>
                @endforeach
                <li><a href="{{ trans('welcome.lianjie') }}">{{ trans('welcome.zh_cn') }}</a></li>
                @if(Session::get('home_uid'))
                <li><a href="{{URL::asset('logout_out')}}">{{ trans('welcome.logout') }}</a></li>
                @else
                <li><a href="{{URL::asset('home_login')}}">{{ trans('welcome.login') }}</a></li>
                @endif
            </ul>

        </nav>


    </div>
</header>

    <div  class="am-cf"></div>
    <div class="am-slider am-slider-default" data-am-flexslider="{playAfterPaused: 8000}">
        <ul class="am-slides">
            <li><img src="{{URL::asset('img/index_banner.jpg')}}" /></li>
            <li><img src="{{URL::asset('img/index_banner.jpg')}}" /></li>
            <li><img src="{{URL::asset('img/index_banner.jpg')}}" /></li>
        </ul>
    </div>

    @show
    @yield('content')


    ﻿<footer>
    <div class="cms-g">
        <div class="footer">
            <ul>
                <li><span>{{ trans('welcome.map') }}</span></li>
                <li><span>{{ trans('welcome.url') }}</span></li>
                <li><span>{{ trans('welcome.parent') }}</span></li>
                <li><span>{{ trans('welcome.statement_of_law') }}</span></li>
            </ul>
            <span style="color:#fff;"><a href="http://www.haothemes.com/" target="_blank" title="好主题">{{ trans('welcome.Good_topic_delivery') }}</a>提供 - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">{{ trans('welcome.The_home_of_the_template') }}</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">{{ trans('welcome.Page_template') }}</a></span>
        </div>

    </div>
</footer>
</body>
</html>
<?php
$uid = Session::get('uid');
if(empty($uid))
{
    return Redirect::to('login')->send();
}

$data = Illuminate\Support\Facades\DB::table('admin_role')->where('admin_id', '=', $uid)->get();
$data_arr = Illuminate\Support\Facades\DB::table('role_authz')->where('role_id', '=', $data[0]->role_id)->get();
$arr = array();
$arr =explode(',', $data_arr[0]->authz_id);


$result = Illuminate\Support\Facades\DB::table('authz')->whereIn('id', $arr)->get();


/*  无限极分类  */
$res = array();
foreach ($result as $key => $val){
    if($val->parent_id == 0) {
        $res[$val->id] = $val;
    }else{
        $res[$val->parent_id]->clide[] = $val;
    }
}

?>


<html>
<head>
    <title>应用程序名称 - @yield('title')</title>
</head>
<body>
@section('sidebar')
    这是主要的侧边栏。
<!DOCTYPE html>
<html lang="en">
<!-- container-fluid -->
<head>
    <title>很简洁漂亮的Bootstrap响应式后台管理系统模板UniAdmin - JS代码网</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
    {{--<link rel="stylesheet" href="css/bootstrap.min.css" />--}}
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-responsive.min.css') }}" />
    {{--<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />--}}
    {{--<link rel="stylesheet" href="css/fullcalendar.css" />--}}
    <link rel="stylesheet" href="{{ URL::asset('css/fullcalendar.css') }}" />
    {{--<link rel="stylesheet" href="css/unicorn.main.css" />--}}
    <link rel="stylesheet" href="{{ URL::asset('css/unicorn.main.css') }}" />
    {{--<link rel="stylesheet" href="css/unicorn.grey.css" class="skin-color" />--}}
    <link rel="stylesheet" href="{{ URL::asset('css/unicorn.grey.css') }}" class="skin-color" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

<div id="header">
    <h1><a href="./dashboard.html">UniAdmin</a></h1>
</div>

<div id="search">
    <input type="text" placeholder="请输入搜索内容..." /><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav btn-group">
        <li class="btn btn-inverse"><a title="" href="http://192.168.1.45/laravel/laravel_/public/personal_data"><i class="icon icon-user"></i> <span class="text">个人资料</span></a></li>
        <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">消息</span> <span class="label label-important">5</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#">新消息</a></li>
                <li><a class="sInbox" title="" href="#">收件箱</a></li>
                <li><a class="sOutbox" title="" href="#">发件箱</a></li>
                <li><a class="sTrash" title="" href="#">发送</a></li>
            </ul>
        </li>
        <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">设置</span></a></li>
        <li class="btn btn-inverse"><a title="" href="logout"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
    </ul>
</div>

<div id="sidebar">12
    {{--<a href="{{ url('index') }}" class="visible-phone"><i class="icon icon-home"></i> 首页</a>--}}
    <ul>
        <li class="active"><a href="{{URL::asset('back')}}"><i class="icon icon-home"></i> <span>首页</span></a></li>
        <li class="submenu">
        <li class="submenu">
            <a href="#"><i class="icon icon-th-list"></i> <span>企业操作</span> <span class="label">2</span></a>
            <ul>
                <li><a href="classify">企业分类添加</a></li>
                <li><a href="classify_show">企业分类展示</a></li>
            </ul>
        </li>
        @foreach($res as $key => $val)
            <li class="submenu">
                <a href="#"><i class="icon icon-th-list"></i> <span>{{$val->authz_name}}</span> <span class="label">2</span></a>
                <ul>
                    @foreach($val->clide as $key => $v)
                    <li><a href="http://www.home.com/{{$v->controller}}">{{$v->authz_name}}</a></li>
                    @endforeach
                    {{--<li><a href="classify_show">企业分类展示</a></li>--}}
                </ul>
            </li>
        @endforeach

        {{--<li class="submenu">--}}
            {{--<a href="#"><i class="icon icon-th-list"></i> <span>导航栏管理</span> <span class="label">2</span></a>--}}
            {{--<ul>--}}
                {{--<li><a href="navbar">栏目添加</a></li>--}}
                {{--<li><a href="navbar_show">栏目管理</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="submenu">--}}
            {{--<a href="#"><i class="icon icon-file"></i> <span>管理员管理</span> <span class="label">3</span></a>--}}
            {{--<ul>--}}
                {{--<li><a href="admin">管理员添加</a></li>--}}
                {{--<li><a href="admin_show">管理员展示</a></li>--}}
                {{--<li><a href="admin_show">管理员角色添加</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="submenu">--}}
            {{--<a href="#"><i class="icon icon-file"></i> <span>权限管理</span> <span class="label">2</span></a>--}}
            {{--<ul>--}}
                {{--<li><a href="authz">权限添加</a></li>--}}
                {{--<li><a href="authz_show">权限展示</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="submenu">--}}
            {{--<a href="#"><i class="icon icon-file"></i> <span>角色添加</span> <span class="label">2</span></a>--}}
            {{--<ul>--}}
                {{--<li><a href="role">角色添加</a></li>--}}
                {{--<li><a href="role_show">角色展示</a></li>--}}
                {{--<li><a href="role_authz">角色权限添加</a></li>--}}
            {{--</ul>--}}

        {{--<li class="submenu">--}}
            {{--<a href="#"><i class="icon icon-file"></i> <span>公司</span> <span class="label">2</span></a>--}}
            {{--<ul>--}}
                {{--<li><a href="job">公司添加</a></li>--}}
                {{--<li><a href="job_show">公司管理</a></li>--}}
                {{--<li><a href="role_authz">角色权限添加</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="submenu">--}}
            {{--<a href="#"><i class="icon icon-file"></i> <span>其他信息</span> <span class="label">1</span></a>--}}
            {{--<ul>--}}
                {{--<li><a href="personal_data">当前系统信息</a></li>--}}
                {{--<li><a href="press">新闻信息添加</a></li>--}}
                {{--<li><a href="press_show">新闻信息展示</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
    </ul>

</div>


@show
<div class="container">
    @yield('content')

</div>
        <script src="{{ URL::asset('js/excanvas.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.ui.custom.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.flot.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.flot.resize.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.peity.min.js') }}"></script>
        <script src="{{ URL::asset('js/fullcalendar.min.js') }}"></script>
        <script src="{{ URL::asset('js/unicorn.js') }}"></script>
        <script src="{{ URL::asset('js/unicorn.dashboard.js') }}"></script>
</body>
</html>
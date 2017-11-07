
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> 相册后台控制 </title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/fullcalendar.css" />   
        <link rel="stylesheet" href="css/unicorn.main.css" />
        <link rel="stylesheet" href="css/unicorn.grey.css" class="skin-color" />

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="css/ssi-uploader.css"/>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        
        @section('style')
        <div id="header">
            <h1><a href="./dashboard.html">UniAdmin</a></h1>        
        </div>
        
<!--        <div id="search">
            <input type="text" placeholder="请输入搜索内容..." /><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
        </div> -->
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-user"></i> <span class="text">个人资料</span></a></li>
                <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">消息</span> <span class="label label-important">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#">新消息</a></li>
                        <li><a class="sInbox" title="" href="#">收件箱</a></li>
                        <li><a class="sOutbox" title="" href="#">发件箱</a></li>
                        <li><a class="sTrash" title="" href="#">发送</a></li>
                    </ul>
                </li>
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">设置</span></a></li>
                <li class="btn btn-inverse"><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
            </ul>
        </div>
            
        <div id="sidebar">
            <a href="index" class="visible-phone"><i class="icon icon-home"></i> 首页</a>
            <ul>
                <li class="active"><a href="index"><i class="icon icon-home"></i> <span>首页</span></a></li>
                <li class="submenu">
                    <a href="#"><i class="icon icon-th-list"></i> <span>相册分类</span> <span class="label">3</span></a>
                    <ul>
                        <li><a href="classify">分类添加</a></li>
                        <li><a href="classify_show">分类展示</a></li>
                    </ul>
                </li>
                <li><a href="buttons.html"><i class="icon icon-tint"></i> <span>按钮 &amp; 图标</span></a></li>
                <li class="submenu">
                    <a href="#"><i class="icon icon-file"></i> <span>其他页面</span> <span class="label">4</span></a>
                    <ul>
                        <li><a href="invoice.html">清单</a></li>
                        <li><a href="chat.html">聊天</a></li>
                        <li><a href="calendar.html">日历</a></li>
                        <li><a href="gallery.html">相册</a></li>
                    </ul>
                </li>
                <li>
                    <a href="widgets.html"><i class="icon icon-inbox"></i> <span>插件</span></a>
                </li>
            </ul>
        
        </div>
        
       <div class="container">  
        <div class="row">  
            <div class="col-md-8 col-md-offset-2">  
                <div class="panel panel-default">  
                    <div class="panel-heading">文件上传</div>  
                    <div class="panel-body">  
                        <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">  
                            {{ csrf_field() }}  
  
  
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">  
                                <label for="file" class="col-md-4 control-label">请选择文件</label>  
  
                                <div class="col-md-6">  
                                    <input id="file" type="file" class="form-control" name="source">  
  
                                    @if ($errors->has('password'))  
                                        <span class="help-block">  
                                        <strong>{{ $errors->first('password') }}</strong>  
                                    </span>  
                                    @endif  
                                </div>  
                            </div>  
  
                            <div class="form-group">  
                                <div class="col-md-6 col-md-offset-4">  
                                    <button type="submit" class="btn btn-primary">  
                                        <i class="fa fa-btn fa-sign-in"></i> 确认上传  
                                    </button>  
  
  
                                </div>  
                            </div>  
                        </form>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  


    </body>
</html>

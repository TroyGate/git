@extends('layouts.app')

@section('content')

		<div id="style-switcher">
			<i class="icon-arrow-left icon-white"></i>
			<span>Style:</span>
			<a href="#grey" style="background-color: #555555;border-color: #aaaaaa;"></a>
			<a href="#blue" style="background-color: #2D2F57;"></a>
			<a href="#red" style="background-color: #673232;"></a>
		</div>
		
		<div id="content">
			<div id="content-header">
				<h1>Common Form Elements</h1>
				<div class="btn-group">
					<a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
					<a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
					<a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
					<a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
				</div>
			</div>
			<div id="breadcrumb">
				<a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="tip-bottom">Form elements</a>
				<a href="#" class="current">Common elements</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>									
								</span>
								<h5>Text inputs</h5>
							</div>
							<div class="widget-content nopadding">
								<form action="navbar_add" method="post" class="form-horizontal" enctype="multipart/form-data" />
									<div class="control-group">
										<label class="control-label">上级栏目</label>
										<div class="controls">
                                            <select name="pid" id="">
                                                <option value="0">作为一级栏目</option>
                                                @foreach($data as $key => $val)
                                                    <option value="{{$val->id}}">{{$val->navbar_name}}</option>
                                                @foreach($val->clide as $k => $v)
                                                        <option value="{{$v->id}}">{{$v->xian}}{{$v->navbar_name}}</option>
                                                    @if(isset($v))
                                                    @foreach($v->clide as $k => $value)
                                                        <option value="{{$value->id}}">{{$v->xian}}{{$value->navbar_name}}</option>
                                                    @endforeach
                                                    @endif
                                                @endforeach
                                                @endforeach
                                            </select>
										</div>
									</div>

                                    <div class="control-group">
                                        <label class="control-label">栏目名称</label>
                                        <div class="controls">
                                            <input type="text" name="navbar_name"/>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">英文目录路由</label>
                                        <div class="controls">
                                            <input type="text" name="catalog"/>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">栏目图片</label>
                                        <div class="controls">
                                            <input type="file" name="navbar_img"/>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">是否在导航栏展示</label>
                                        <div class="controls">
                                            <input type="radio" name="is_show" value="1"/> 是
                                            <input type="radio" name="is_show" value="0"/> 否
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">栏目描述</label>
                                        <div class="controls">
                                            {{--<textarea name="press_content" id="" cols="30" rows="10"></textarea>--}}
                                            <textarea name="content" class="common-textarea" id="textarea" cols="30" style="width: 98%;" rows="10"></textarea>
                                        </div>
                                    </div>

									<div class="form-actions">
										<button type="submit" class="btn btn-primary">Button</button>
									</div>
								</form>
							</div>
						</div>						
					</div>
				</div>


				<div class="row-fluid">
					<div id="footer" class="span12">
						2012 &copy; UniAdmin.</div>
				</div>
			</div>
		</div>
		

	</body>
</html>

        <!-- 配置文件 -->
        <script type="text/javascript" src="utf8-php/ueditor.config.js"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="utf8-php/ueditor.all.js"></script>
        <script type="text/javascript" src="utf8-php/lang/zh-cn/zh-cn.js"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            var ue = UE.getEditor('press_content');

            UE.getEditor('textarea',{  //intro_detail为要编辑的textarea的id
                initialFrameWidth: 900,  //初始化宽度
                initialFrameHeight: 100,  //初始化高度
            });

@stop
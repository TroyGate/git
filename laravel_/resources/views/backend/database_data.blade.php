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
                    &nbsp&nbsp&nbsp<a href="{{URL::asset('meta/1')}}">name关键字</a>
                    &nbsp&nbsp&nbsp<a href="{{URL::asset('meta/2')}}">http-equiv关键字</a>
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>									
								</span>
								<h5>Text inputs</h5>
							</div>
							<div class="widget-content nopadding">
								<form action="{{URL::asset('database_backups')}}" method="post" class="form-horizontal" enctype="multipart/form-data" />

                                    <div class="control-group">
                                        <label class="control-label">请选择需要备份的数据库</label>
                                        <div class="controls">
                                            <select name="databases" id="">
                                                <option value="">请选择数据库</option>
                                                @foreach($data as $key => $val)
                                                <option value="{{$val->Database}}">{{$val->Database}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">选择需要生成的目录</label>
                                        <div class="controls">
                                            <input type="text" name="path" />
                                        </div>
                                    </div>

                                    {{--<div class="control-group">--}}
                                        {{--<label class="control-label">数据库的描述</label>--}}
                                        {{--<div class="controls">--}}
                                            {{--<textarea name="content" id="" cols="30" rows="10"></textarea>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

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
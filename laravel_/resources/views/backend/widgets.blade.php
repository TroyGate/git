{{--继承那个布局文件--}}

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
				<h1>Widgets</h1>
				<div class="btn-group">
					<a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
					<a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
					<a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
					<a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
				</div>
			</div>
			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Widgets</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span6">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-file"></i>
								</span>
								<h5>我的个人信息</h5>
							</div>
							<div class="widget-content nopadding">
								<ul class="recent-posts">
                                    @foreach($data as $key => $sort)
                                        <li>您好：<font color="red">{{ $sort -> user }}</font></li>
                                        <li></li>
                                        <li>上次登录时间:{{ date('Y-m-d H:i:s', $sort -> add_time) }}</li>
                                        <li>上次登录ip:{{ $sort -> ip }}</li>
                                    @endforeach
								</ul>
							</div>
						</div>


                        <div class="widget-box">
                            <div class="widget-title">
								<span class="icon">
									<i class="icon-file"></i>
								</span>
                                <h5>开发团队信息</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <ul class="recent-posts">
                                    @foreach($data as $key => $sort)
                                        <li>团队成员：<font color="red">{{ $sort -> user }}</font></li>
                                        <li>php开发：{{ $sort -> user }}</li>
                                        <li>qq讨论群:680686628</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


						<div class="accordion" id="collapse-group">
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                            <span class="icon"><i class="icon-magnet"></i></span><h5>Accordion, opened by default</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGOne">
                                    <div class="widget-content">
                                        This is opened by default
                                    </div>
                                </div>
                            </div>
                            {{--<div class="accordion-group widget-box">--}}
                                {{--<div class="accordion-heading">--}}
                                    {{--<div class="widget-title">--}}
                                        {{--<a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse">--}}
                                            {{--<span class="icon"><i class="icon-magnet"></i></span><h5>Accordion, closed</h5>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="collapse accordion-body" id="collapseGTwo">--}}
                                    {{--<div class="widget-content">--}}
                                        {{--Another is open--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="accordion-group widget-box">--}}
                                {{--<div class="accordion-heading">--}}
                                    {{--<div class="widget-title">--}}
                                        {{--<a data-parent="#collapse-group" href="#collapseGThree" data-toggle="collapse">--}}
                                            {{--<span class="icon"><i class="icon-magnet"></i></span><h5>Accordion, closed</h5>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="collapse accordion-body" id="collapseGThree">--}}
                                    {{--<div class="widget-content">--}}
                                        {{--Another is open--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>

                        <div class="widget-box collapsible">
                            <div class="widget-title">
                                <a href="#collapseOne" data-toggle="collapse">
    								<span class="icon"><i class="icon-arrow-right"></i></span>
                                    <h5>Collapsible, opened by default</h5>
                                </a>
                            </div>
                            <div class="collapse in" id="collapseOne">
                            <div class="widget-content">
                                This box is opened by default
                            </div>
                            </div>
						</div>
						<div class="widget-box collapsible">
                            <div class="widget-title">
                                <a href="#collapseTwo" data-toggle="collapse">
    								<span class="icon"><i class="icon-remove"></i></span>
                                    <h5>Collapsible, closed by default</h5>
                                </a>
                            </div>
                            <div class="collapse" id="collapseTwo">
                                <div class="widget-content">
                                    This box is now open
                                </div>
                            </div>
						</div>
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-refresh"></i>
								</span>
								<h5>Latest updates</h5>
							</div>

							<div class="widget-content nopadding updates">
								<div class="new-update clearfix">
									<i class="icon-ok-sign"></i>
									<div class="update-done">
										<a title="" href="#"><strong>A new server is on the board!</strong></a>
										<span>We've just set up a new server. Our gurus ...</span>
									</div>
									<div class="update-date"><span class="update-day">08</span>feb</div>

								</div>



								{{--<div class="new-update clearfix">--}}
									{{--<i class="icon-ok-sign"></i>--}}
									{{--<span class="update-done">--}}
										{{--<a title="" href="#"><strong>The goal was reached!</strong></a>--}}
										{{--<span>We just passed 1000 sales! Congrats to all</span>--}}
									{{--</span>--}}
									{{--<span class="update-date"><span class="update-day">07</span>feb</span>--}}
								{{--</div>--}}

								{{--<div class="new-update clearfix">--}}
									{{--<i class="icon-question-sign"></i>--}}
									{{--<span class="update-notice">--}}
										{{--<a title="" href="#"><strong>Meat a new team member - Don Corleone</strong></a>--}}
										{{--<span>Very dyplomatic and flexible sales manager</span>--}}
									{{--</span>--}}
									{{--<span class="update-date"><span class="update-day">06</span>feb</span>--}}
								{{--</div>--}}

							</div>
						</div>
					</div>


                    <div class="span6">
                        <div class="widget-box">
                            <div class="widget-title">
								<span class="icon">
									<i class="icon-comment"></i>
								</span>
                                <h5>安全信息</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <ul class="recent-comments">
                                    <li><font color="red"">※ 建议您将phpcms目录设置为755（linux）或只读（windows）</font>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


					<div class="span6">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-comment"></i>
								</span>
								<h5>我的系统信息</h5>
							</div>
							<div class="widget-content nopadding">
								<ul class="recent-comments">
                                    @foreach($data as $key => $sort)
                                        <li>PHP程序版本:{{$sort -> php}}</li>
                                        <li>Mysql版本:{{$sort -> mysql}}</li>
                                        <li>操作系统:{{$sort -> system}}</li>
                                        <li>上传文件:{{$sort -> file_size}}M</li>
                                    @endforeach
								</ul>
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
		
		
            
            {{--<script src="js/jquery.min.js"></script>--}}
            {{--<script src="js/jquery.ui.custom.js"></script>--}}
            {{--<script src="js/bootstrap.min.js"></script>--}}
            {{--<script src="js/unicorn.js"></script>--}}
	</body>
</html>
@stop
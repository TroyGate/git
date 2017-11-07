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
				<h1>Classify Add</h1>
				<div class="btn-group">
					<a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
					<a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
					<a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
					<a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
				</div>
			</div>
			<div id="breadcrumb">
				<a href="index" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#">Classify Add</a>
				<!-- <a href="#" class="current">Form wizard</a> -->
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
							<h5><a href="{{URL::asset('advertisement')}}/1">图片广告位</a></h5>
							<h5><a href="{{URL::asset('advertisement')}}/2">视图广告位</a></h5>
								<span class="icon">
									<i class="icon-pencil"></i>
								</span>
							</div>

							<div class="widget-content nopadding">
								<form id="form-wizard" class="form-horizontal" action="{{URL::asset('advertisement_add')}}" method="post" enctype="multipart/form-data"  />
									<div id="form-wizard-1" class="step">
										<div class="control-group">
											<div class="control-group">
												<label class="control-label">广告位名称</label>
												<div class="controls">
													<input id="username" type="text" name="name"  />
												</div>
											</div>

									
											<div class="control-group">
												<label class="control-label">广告位页面</label>
												<div class="controls">
													<input id="username" type="text" name="page"  />
												</div>
											</div>


											<div class="control-group">
												<label class="control-label">广告位位置</label>
												<div class="controls">
													<input id="username" type="text" name="place"  />
												</div>
											</div>
											
											@if($id == 1)
                                            <div class="control-group">
		                                        <label class="control-label">图片</label>
		                                        <div class="controls">
		                                            <input type="file" name="myfile"/>
		                                        </div>
		                                    </div>
											@else
											<div class="control-group">
		                                        <label class="control-label">视频展示</label>
		                                        <div class="controls">
		                                            <input type="file" name="video"/>
		                                        </div>
		                                    </div>
											@endif
                                            <div class="control-group">
												<label class="control-label">开始时间</label>
												<div class="controls">
													<input id="username" type="text" name="show_time"  />
												</div>
											</div>
											

											<div class="control-group">
												<label class="control-label">结束时间</label>
												<div class="controls">
													<input id="username" type="text" name="show_time"  />
												</div>
											</div>


											<div class="control-group">
                                            <label class="control-label">是否展示</label>
                                            <div class="controls">
                                                <input type="radio" name="is_show" value="1"/> 是
                                                 <input type="radio" name="is_show" value="0"/> 否
                                            </div>
											
											<div class="control-group">
												<label class="control-label">页面占用大小</label>
												<div class="controls">
													<input id="username" type="text" name="size"  />
												</div>
											</div>

										</div>
										
									</div>
									<div class="form-actions">
											<input id="back" class="btn btn-primary" type="reset" value="Back" />
											<input id="next" class="btn btn-primary" type="submit" value="提交" />
											<div id="status"></div>
									</div>
									<div id="submitted"></div>
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
@stop

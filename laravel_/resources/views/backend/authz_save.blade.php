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
								<span class="icon">
									<i class="icon-pencil"></i>
								</span>
								<h5>Form wizard with validation</h5>
							</div>
							<div class="widget-content nopadding">
								<form id="form-wizard" class="form-horizontal" action="{{URL::asset('authz_saves')}}" method="post" />
									<div id="form-wizard-1" class="step">
										<div class="control-group">

											<label class="control-label">权限名称</label>
											<div class="controls">
												<input id="username" type="text" name="authz_name" value="{{$result['authz_name']}}" />
											</div>

                                            <input type="hidden" name="id" value="{{$result['id']}}"/>
                                            <label class="control-label">级别：</label>
                                            <div class="controls">
                                                <select name="parent_id" id="">
                                                    <option value="">请选择</option>

                                                @foreach($data as $key => $sort)
                                                        <option value="{{ $sort -> id }}"
                                                        @if($result['parent_id'] == $sort -> id)
                                                         selected = "selected"
                                                         
                                                        @endif
                                                        >
                                                            {{ $sort -> authz_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <label class="control-label">控制器</label>
                                            <div class="controls">
                                                <input id="username" type="text" name="controller" value="{{$data[0]->controller}}" />
                                            </div>

                                            <label class="control-label">方法</label>
                                            <div class="controls">
                                                <input id="username" type="text" name="action" value="{{$data[0]->action}}" />
                                            </div>

                                            <label class="control-label">是否展示</label>
                                            <div class="controls">
                                                <input type="radio" name="is_show" value="1" @if($result['is_show'] == 1) checked="checked" @endif /> 是
                                                 <input type="radio" name="is_show" value="0" @if($result['is_show'] == 0) checked="checked" @endif  /> 否
                                            </div>
										</div>
										
									</div>
									<div class="form-actions">
                                            {{--<input type="hidden" name="path" value="{{$data[0]->path}}"/>--}}
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

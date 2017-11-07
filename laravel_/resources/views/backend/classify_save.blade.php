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
								<form id="form-wizard" class="form-horizontal" action="{{URL::asset('classify_saves')}}" method="post" />
									<div id="form-wizard-1" class="step">
										<div class="control-group">

											<label class="control-label">企业类别</label>
											<div class="controls">
												<input id="username" type="text" name="classify" value="<?php echo $all['classify'];?>"  />
											</div>
                                            <input type="hidden" name="id" value="<?php echo $all['id'];?>"/>
                                            <label class="control-label">选择级别：</label>
                                            <div class="controls">
                                                <select name="pid" id="">
                                                    <option value="">请选择</option>
                                                    <option value="0">一级列表</option>
                                                    @foreach($data as $key => $sort)

                                                        <option value="{{ $sort -> id }}"
                                                        @if($all['pid'] == $sort -> id)
                                                                selected="selected"
                                                        @endif
                                                                >
                                                            {{ $sort -> classify }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <label class="control-label">是否展示</label>
                                            <div class="controls">
                                                @if($all['is_show'] == 1)
                                                    <input type="radio" name="is_show" checked="checked"  value="1"/> 是
                                                    <input type="radio" name="is_show" value="0"/> 否
                                                @else
                                                    <input type="radio" name="is_show"  value="1"/> 是
                                                    <input type="radio" name="is_show" checked="checked" value="0"/> 否
                                                @endif
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

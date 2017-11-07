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
				<h1>Tables</h1>
				<div class="btn-group">
					<a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
					<a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
					<a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
					<a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
				</div>
			</div>
			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Tables</a>
			</div>
						
				<div class="widget-box">
					<div class="widget-title">
						<h5><a href="{{URL::asset('advertisement')}}/1">图片广告位</a></h5>
						<h5><a href="{{URL::asset('advertisement')}}/2">视图广告位</a></h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered data-table" align="center">
							<thead>
							<tr>
							<th>id</th>
							<th>广告名称</th>
                            <th>图片名称</th>
							<th>视频名称</th>
                            <th>广告页面</th>
                            <th>页面位置</th>
                            <th>是否展示</th>
                            <th>开始时间</th>
                            <th>结束时间</th>
                            <th>页面占用的大小</th>
							<th>handly</th>
							</tr>
							</thead>
							<tbody>
							@foreach($data as $key => $sort)
							<tr class="gradeX">
								<td>{{ $sort -> id }}</td>
								<td>{{ $sort -> name }}</td>
                                <td>{{ $sort -> img }}</td>
                                <td>{{ $sort -> video }}</td>
                                <td>{{ $sort -> page }}</td>
                                <td>{{ $sort -> place }}</td>
                                 @if( $sort -> is_show == 1)
                                    <td><span >是</span> <input class="is_show"  type="text" style="display:none" value=""/></td>
                                @else
                                    <td><span>否</span> <input class="is_show" type="text" style="display:none" value=""/></td>
                                @endif
								<td>{{  $sort -> add_time }}</td>
								<td>{{  $sort -> end_time }}</td>
                                <td>{{  $sort -> size }}</td>
								<td>
								<a class="btn btn-danger" href="{{ URL('press_save/'.$sort->id.'') }}" role="button">Save</a>
								<a class="btn btn-warning" href="{{ URL('press_del/'.$sort->id.'') }}" role="button">Delete</a>
								</td>
							</tr>
							@endforeach

							</tbody>
						</table> 
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
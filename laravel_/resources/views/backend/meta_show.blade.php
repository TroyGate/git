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
                    &nbsp&nbsp&nbsp<a href="{{URL::asset('meta/1')}}">name关键字</a>
                    &nbsp&nbsp&nbsp<a href="{{URL::asset('meta/2')}}">http-equiv关键字</a>
                    <div class="widget-title">
						<h5>classify table</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered data-table" align="center">
							<thead>
							<tr>
							<th>id</th>
							<th>属性 name</th>
							<th>属性 http-equiv</th>
                                <th>内容</th>
							<th>handly</th>
							</tr>
							</thead>
							<tbody>
							@foreach($data as $key => $sort)
							<tr class="gradeX">
								<td>{{ $sort -> id }}</td>
								<td>{{ $sort -> meta_name }}</td>
                                <td>{{ $sort -> http_equiv }}</td>
                                <td>{{ $sort -> content }}</td>
								<td>
								<a class="btn btn-danger" href="meta_save/{{ $sort -> id }}" role="button">Save</a>
								<a class="btn btn-warning" href="meta_del/{{ $sort -> id }}" role="button">Delete</a>
								</td>/
							</tr>
							@endforeach
							</tbody>
						</table> 
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
        <script src="js/jquery.min.js"></script>
        <script>
            $('span').click(function(){
                var val = $(this).html();
                $(this).hide();
                $(this).next().show().focus().val($(this).text());
            })


            $('.is_show').blur(function(){
                var zhi = $(this).val();
                var num = $(this).attr('ids');  /* 当前的 状态值 */
                var ids =  $(this).attr('idss');  /* 主键id */

                $(this).prev().html(zhi);

                /*  目前不知道怎么传 所以 写的绝对路径 */
                $.ajax({
                    url:'http://localhost/laravel/laravel_/public/admin_gai/'+num+'/'+ids,
                    type:'get',
                    success:function(msg){
                        if(msg == 1){
                            $('span').show();
                            $('.is_show').hide();
                            alert('修改成功');
                        }else{
                            alert('修改失败!!');
                        }
                    }
                })

            })
        </script>
@stop
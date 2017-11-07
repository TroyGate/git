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
                        <a href="{{$route['add']}}">添加数据</a>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table" align="center">
                            <thead>
                            <tr>
                            @foreach($ziduan as $key => $val)
                            <th>{{$val}}</th>
                            @endforeach
                            <th>handly</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $sort)
                                <tr class="gradeX">   
                                    @foreach($ziduan as $key => $val)
                                    @if(count($ziduan) <= $size)
                                        <td>{{ $sort -> $val }}</td>
                                    @endif
                                    @endforeach
                                    <td>
                                    <a class="btn btn-warning" href="{{$route['save']}}/{{ $sort -> id }}" role="button">save</a>
                                    <a class="btn btn-warning" href="{{$route['del']}}/{{ $sort -> id }}" role="button">Delete</a>
                                    </td>
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
@stop
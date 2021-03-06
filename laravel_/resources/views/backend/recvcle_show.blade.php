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
            <div>
                <input type="text" name="search" id="sea" value=""/> <button>搜索</button>
            </div>
            <div class="widget-title">
                <h5>classify table</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table" align="center">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>管理员</th>
                        <th>企业</th>
                        <th>时间</th>
                        <th>handly</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $sort)
                        <tr class="gradeX">
                            <td>{{ $sort -> id }}</td>
                            <td>{{ $sort -> admin_name }}</td>
                            <td>{{ $sort -> classify }}</td>
                            <td>{{date('Y-m-d H:i:s' , $sort->add_time)}}</td>
                            <td>
                            <a class="btn btn-danger" href="recvcle_del/{{ $sort -> id }}/{{$sort->shop_id}}" role="button">Delete</a>
                            <a class="btn btn-danger" href="recvcle_restore/{{ $sort -> id }}/{{$sort->shop_id}}" role="button">Restore</a>
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

@stop
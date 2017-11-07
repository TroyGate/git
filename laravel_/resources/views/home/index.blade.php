@extends('layouts.home')

@section('content')

<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>
    <div class="index-nav">
        <div class="cms-g">
            <div class="am-u-sm-6 am-u-md-6 am-u-lg-3">
                <div class="index-nav-item">
                    <div class="index-nav-img">
                        <img src="{{ URL::asset('img/index_nav01.png') }}" />
                    </div>
                    <div class="index-nav-info">
                        <h1>芯片封装</h1>
                        <h2>优越品质 绿色环保</h2>
                        <em class="font"><a href="{{ URL::asset('shop_xq') }}">详细介绍&#xe72f;</a></em>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-6 am-u-md-6 am-u-lg-3">
                <div class="index-nav-item">
                    <div class="index-nav-img">
                        <img src="{{ URL::asset('img/index_nav02.png') }}" />
                    </div>
                    <div class="index-nav-info">
                        <h1>LED电源</h1>
                        <h2>专业技术 高效耐用</h2>
                        <em class="font"><a href="{{ URL::asset('shop_xq') }}">详细介绍&#xe72f;</a></em>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-6 am-u-md-6 am-u-lg-3">
                <div class="index-nav-item">
                    <div class="index-nav-img">
                        <img src="{{ URL::asset('img/index_nav03.png') }}" />
                    </div>
                    <div class="index-nav-info">
                        <h1>LED灯具</h1>
                        <h2>领先科技 节能高效</h2>
                        <em class="font"><a href="{{ URL::asset('shop_xq') }}">详细介绍&#xe72f;</a></em>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-6 am-u-md-6 am-u-lg-3">
                <div class="index-nav-item">
                    <div class="index-nav-img">
                        <img src="{{ URL::asset('img/index_nav04.png') }}" />
                    </div>
                    <div class="index-nav-info">
                        <h1>通讯模块</h1>
                        <h2>超强信号 优质体验</h2>
                        <em class="font"><a href="{{ URL::asset('shop_xq') }}">详细介绍&#xe72f;</a></em>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="index-content">
        <div class="cms-g">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
                <div class="index-content-left">
                        <h1>产品中心</h1>
                        <div class="am-slider am-slider-default" data-am-flexslider id="demo-slider-0">
                            <ul class="am-slides">
                                <li><img src="{{ URL::asset('img/index-content-left-01.jpg') }}" /></li>
                                <li><img src="{{ URL::asset('img/index-content-left-01.jpg') }}" /></li>
                                <li><img src="{{ URL::asset('img/index-content-left-01.jpg') }}" /></li>
                                <li><img src="{{ URL::asset('img/index-content-left-01.jpg') }}" /></li>
                                <li><img src="{{ URL::asset('img/index-content-left-01.jpg') }}" /></li>
                                <li><img src="{{ URL::asset('img/index-content-left-01.jpg') }}" /></li>
                            </ul>
                        </div>
                        <strong><a href="#">E27射灯是220V LED射灯的理想替代品。这款GU10 / E27射灯是高效的LED射灯产品，仅仅只消耗了5W的电压，真正意义降低的能源E27射灯是220V LED射灯的理想替代品。这款GU10 / E27射灯是高效的LED射灯产品，仅仅只消耗了5W的电压，真正意义降低的能源</a></strong>
                        <em><a href="#">详情介绍<i class="font">&#xe78d;</i></a></em>
                </div>
            </div>

            <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
                <div class="index-content-center">
                    <h1>新闻动态<a href="#">MORE<i class="font">&#xe78d;</i></a></h1>
                    <ul>
                        @foreach($press as $key=> $val)
                        <li>
                            <a href="job/{{$val->id}}"><span>{{$val->press_name}}</span><em>{{$val->press_time}}</em></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
                <div class="index-content-right">
                    <h1>知名公司<a href="#">MORE<i class="font">&#xe78d;</i></a></h1>
                    <img src="{{ URL::asset('img/index-content-right-01.jpg') }}"/>
                    <ul>
                        @foreach($job as $key=> $val)
                            <li>
                                <a href="job/{{$val->id}}"><span>{{$val->job_name}}</span></a>
                                <textarea name="content" id="text" cols="30" rows="10" style="width:200px;height:40px;"></textarea>
                                <button class="button" id="{{$val->id}}">点击留言</button>
                            </li>
                        @endforeach
                        <li><a href="#">惠州市重点路段LED路灯项目 ·惠州市重点路段LED路灯项</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script>

    $('.button').click(function(){

        $('#text').show();
        var text = $('#text').val();
        var id = $('.button').attr('id');

        $.ajax({
            url:'http://192.168.1.45/laravel/laravel_/public/job_message/'+text+'/'+id,
            type:'get',
            success:function(msg){
                alert(msg)
//                if(msg == 0){
//                    alert('您不能在此提交');
//                }
            }
        });

        $('.button').hide();

    })
</script>
@stop

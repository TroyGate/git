
@extends('layouts.home')

@section('content')

    <div class="com-banner">
        <img src="images/index_banner.jpg" />
    </div>
    <div class="com-container">
        <div class="cms-g">
            <div class="am-hide-sm-only am-u-md-3 am-u-lg-3">
                <div class="com-nav-left">
                    <h1><em>产品中心</em><i>PRODUCT</i></h1>
                    <ul>
                        <li class="on"><a href="#">芯片封装</a></li>
                        <li><a href="#">LED电源</a></li>
                        <li><a href="#">LED灯具</a></li>
                        <li><a href="#">通讯模块</a></li>
                    </ul>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-9 am-u-lg-9">
                <div class="com-nav-title">
                    <a href="#doc-oc-demo1" class="font am-show-sm-only" data-am-offcanvas>&#xe68b;</a>
                    <span>LED灯具</span>
                </div>
                <div class="com-nav-category">
                    <ul>
                        <li class="on"><span><a href="#">LED T8灯管</a></span></li>
                        <li><span><a href="#">LED射灯</a></span></li>
                        <li><span><a href="#">LED软光灯</a></span></li>
                        <li><span><a href="#">LED泛光灯</a></span></li>
                        <li><span><a href="#">LED洗墙灯</a></span></li>
                    </ul>
                </div>
                <div class="product-list">
                    <div class="am-u-sm-6 am-u-md-4 am-u-lg-3">
                        <div class="product-list-item">                  
                            <div class="product-list-item-bj">
                                <a href="./product_info.html"><img src="{{URL::asset('img/product_01.jpg')}}" /></a>
                            </div>
                            <div class="product-list-item-title">
                                <a href="./product_info.html" class="f-toe">LED T8灯管0.6M</a>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-6 am-u-md-4 am-u-lg-3">
                        <div class="product-list-item">
                            <div class="product-list-item-bj">
                                <a href="./product_info.html"><img src="{{URL::asset('img/product_01.jpg')}}" /></a>
                            </div>
                            <div class="product-list-item-title">
                                <a href="#" class="f-toe">LED T8灯管0.6M</a>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-6 am-u-md-4 am-u-lg-3">
                        <div class="product-list-item">
                            <div class="product-list-item-bj">
                                <a href="./product_info.html"><img src="{{URL::asset('img/product_01.jpg')}}" /></a>
                            </div>
                            <div class="product-list-item-title">
                                <a href="#" class="f-toe">LED T8灯管0.6M</a>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-6 am-u-md-4 am-u-lg-3">
                        <div class="product-list-item">
                            <div class="product-list-item-bj">
                                <a href="./product_info.html"><img src="{{URL::asset('img/product_01.jpg')}}" /></a>
                            </div>
                            <div class="product-list-item-title">
                                <a href="#" class="f-toe">LED T8灯管0.6M</a>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-6 am-u-md-4 am-u-lg-3">
                        <div class="product-list-item">
                            <div class="product-list-item-bj">
                                <a href="./product_info.html"><img src="{{URL::asset('img/product_01.jpg')}}" /></a>
                            </div>
                            <div class="product-list-item-title">
                                <a href="#" class="f-toe">LED T8灯管0.6M</a>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-6 am-u-md-4 am-u-lg-3">
                        <div class="product-list-item">
                            <div class="product-list-item-bj">
                                <a href="./product_info.html"><img src="{{URL::asset('img/product_01.jpg')}}" /></a>
                            </div>
                            <div class="product-list-item-title">
                                <a href="#" class="f-toe">LED T8灯管0.6M</a>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-6 am-u-md-4 am-u-lg-3">
                        <div class="product-list-item">
                            <div class="product-list-item-bj">
                                <a href="./product_info.html"><img src="{{URL::asset('img/product_01.jpg')}}" /></a>
                            </div>
                            <div class="product-list-item-title">
                                <a href="#" class="f-toe">LED T8灯管0.6M</a>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-6 am-u-md-4 am-u-lg-3">
                        <div class="product-list-item">
                            <div class="product-list-item-bj">
                                <a href="./product_info.html"><img src="{{URL::asset('img/product_01.jpg')}}" /></a>
                            </div>
                            <div class="product-list-item-title">
                                <a href="#" class="f-toe">LED T8灯管0.6M</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-list">
                    <a href="#"><<</a>
                    <a href="#"><</a>
                    <a href="#" class="num">1</a>
                    <a href="#" class="num">2</a>
                    <a href="#" class="num">3</a>
                    <a href="#" class="on">4</a>
                    <a href="#" class="num">5</a>
                    <a href="#" class="num">6</a>
                    <a href="#">></a>
                    <a href="#">>></a>
                </div>
            </div>
        </div>
    </div>
    <div id="doc-oc-demo1" class="am-offcanvas">
        <div class="am-offcanvas-bar">
            <div class="am-offcanvas-content com-nav-left com-nav-left1">
                <ul>
                    <li class="on"><span><a href="#">LED T8灯管</a></span></li>
                    <li><span><a href="#">LED射灯</a></span></li>
                    <li><span><a href="#">LED软光灯</a></span></li>
                    <li><span><a href="#">LED泛光灯</a></span></li>
                    <li><span><a href="#">LED洗墙灯</a></span></li>
                </ul>
            </div>
        </div>
    </div>

</body>
</html>
    @stop
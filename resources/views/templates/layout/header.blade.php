<?php
    $setting = Cache::get('setting');
    $sliders = DB::table('slider')->where('com','gioi-thieu')->where('status',1)->get();
    $categories = \App\NewsCate::where('com','dau-gia')->where('parent_id',0)->orderBy('id','asc')->get();
?>


<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3 tac">
                <a href="{{url('')}}"><img src="{{asset('upload/hinhanh/'.$setting->photo)}}"  class="img-logo" alt=""></a>
            </div>
            <div class="col-md-6">
                <h1 class="name_company">{{ $setting->company }}</h1>
            </div>
            <div class="col-md-3 tac">
                <img src="{{asset('public/images/bua.png')}}" class="bua" alt="">
            </div>
        </div>
    </div>
</header>   
<div class="visible-xs visible-sm menu-mobile">
    <div class="vk-header__search">
        <div class="container">                
            <a href="#menuMobile" class="menu_Mobile" data-toggle="collapse" class="_btn d-lg-none menu_title"><i class="fa fa-bars"></i> Menu</a>
        </div>
    </div>
    <nav class="vk-header__menu-mobile">
        <ul class="vk-menu__mobile collapse" id="menuMobile">
            
            <li><a href="{{url('gioi-thieu')}}">Giới thiệu</a></li>
            <li>
                <a href="{{url('tin-dau-gia')}}">Tin đấu giá</a>

                <a href="#menu2" data-toggle="collapse" class="_arrow-mobile"><i class="_icon fa fa-angle-down"></i></a>
                <ul class="collapse" id="menu2">
                    @foreach($categories as $cate)
                        <li><a href="{{url('tin-dau-gia/'.$cate->alias)}}">{{$cate->name}}</a></li>
                    @endforeach                      
                </ul>
            </li>
            <li><a href="{{url('thu-tuc')}}">Thủ tục</a></li>
            <li><a href="{{url('tin-tuc')}}">Tin tức</a></li>
            <li><a href="{{url('lien-he')}}">Liên hệ</a></li>
        </ul>
    </nav>        
</div>

<div class="menu-cate visible-md visible-lg">
    <div class="container">
        <div class="row">                
            <div class="menu">
                <ul class="navi">
                    <li class="@if(@$com == 'index')active @endif"><a href="{{url('')}}">Trang chủ</a></li>
                    <li class="@if(@$com == 'gioi-thieu')active @endif"><a href="{{url('gioi-thieu')}}">Giới thiệu</a></li>
                    <li class="@if(@$com == 'dau-gia')active @endif">
                        <a href="{{url('tin-dau-gia')}}">Tin đấu giá <i class="fa fa-angle-down" style="color: #fff"></i></a>                        
                        <ul class="vk-menu__child">                                
                            @foreach($categories as $cate)
                            <li><a href="{{url('tin-dau-gia/'.$cate->alias)}}">{{$cate->name}}</a></li>
                            @endforeach                     
                        </ul>
                    </li>
                    <li class="@if(@$com == 'thu-tuc')active @endif"><a href="{{url('thu-tuc')}}">Thủ tục</a></li>
                    <li class="@if(@$com == 'tin-tuc')active @endif"><a href="{{url('tin-tuc')}}">Tin tức</a></li>
                    <li class="@if(@$com == 'lien-he')active @endif"><a href="{{url('lien-he')}}">Liên hệ</a></li>
                </ul>
            </div>
        </div>
        
    </div>       
</div>
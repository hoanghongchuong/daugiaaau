@extends('index')
@section('content')
<?php
$setting = Cache::get('setting');
$sliders = DB::table('slider')->where('status',1)->where('com','gioi-thieu')->orderBy('id','desc')->get();
?>
<div class="slider">
    <div id="carousel-id1" class="carousel slide" data-ride="carousel">                    
        <div class="carousel-inner">
            @foreach($sliders as $k=>$slider)
            <div class="item @if($k== 0)active @endif">
                <img  alt="Third slide" src="{{asset('upload/hinhanh/'.$slider->photo)}}">                            
            </div>
            @endforeach
        </div>
        <a class="left carousel-control" href="#carousel-id1" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-id1" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
</div>
<div class="title-partner">
    <p>Đối tác tin cậy của bạn</p>
</div>
<div class="box-home" style="margin-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <h3 class="title-about">GIỚI THIỆU</h3>
                <div class="des-about">
                    {!! $about->mota !!}
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{asset('upload/hinhanh/'.$about->photo)}}" alt="" class="img-responsive">
            </div>
        </div>
    </div>
</div>
<div class="box-home box-cate-news">
    <div class="container">
        <div class="row">
            @foreach($newsCate as $cate)
            <div class="col-md-4">
                <div class="item-cate grids_in">
                    <div class="img-right-pro">
                        <a href="{{url('tin-dau-gia/'.$cate->alias)}}" class="effect_hover" title="{{$cate->name}}"><img src="{{asset('upload/news/'.$cate->photo)}}" alt="{{$cate->name}}" class="img-pro"></a>
                    </div>
                    <div class="name-pro-right">
                        <a href="{{url('tin-dau-gia/'.$cate->alias)}}" title="{{$cate->name}}">
                            <h3>{{$cate->name}}</h3>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="box-home news-daugia">
    <div class="container">
        <div class="row">
            <div class="box-title-daugia">
                <div class="title-news-daugia">
                    <span>Tin đấu giá</span>
                </div>
                <div class="box-read-more pull-right"><a href="" class="read-more">Xem thêm <i class="fa fa-angle-right"></i></a></div>
            </div>                
            <div class="list-item-news">
                @foreach($news_daugia as $item)
                <div class="box-item">
                    <div class="col-md-2 pdl-0">
                        <a href="{{url('tin-dau-gia/'.$item->alias.'.html')}}"><img src="{{asset('upload/news/'. $item->photo)}}"></a>
                    </div>
                    <div class="col-md-10 pdl-0 pdr-0">
                        <p class="name_news"><a href="{{url('tin-dau-gia/'.$item->alias.'.html')}}" title="{{$item->name}}">{{$item->name}}</a></p>
                        <div class="des-news">{!! $item->mota !!}</div>
                        <div class="bottom-box">
                            <div class="pull-left"><span class="date-created">Giá khởi điểm:</span> <span class="price">{{$item->price}} VNĐ</span></div>
                            <div class="pull-right date-c"><span class="date-created">Ngày đăng: <span class="price">{{date('d/m/Y', strtotime($item->created_at))}}</span></span></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>
<div class="box-home news-daugia">
    <div class="container">
        <div class="row">
            <div class="box-title-daugia">
                <div class="title-news-daugia">
                    <span>Tin tức</span>
                </div>
                <div class="box-read-more pull-right"><a href="" class="read-more">Xem thêm <i class="fa fa-angle-right"></i></a></div>
            </div>
            <div class="list-item-news">
                @foreach($news as $data)
                <div class="col-md-3 box-news">
                    <a href="{{url('tin-tuc/'.$data->alias.'.html')}}" title="{{$data->name}}"><img src="{{asset('upload/news/'.$data->photo)}}" alt="{{$data->name}}"></a>
                    <p class="name_news"><a href="{{url('tin-tuc/'.$data->alias.'.html')}}" title="{{$data->name}}">{{$data->name}}</a></p>
                    <div class="des_news">{!! $data->mota !!}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="box-home news-daugia">
    <div class="container">
        <div class="row">
            <div class="box-title-daugia">
                <div class="title-news-daugia">
                    <span>Đối tác</span>
                </div>
                <div class="box-read-more pull-right"><a href="" class="read-more">Xem thêm <i class="fa fa-angle-right"></i></a></div>
            </div>
            <div class="owl-carousel owl-theme owl-carousel-product">     
                @foreach($partners as $partner)                   
                <div class="item">
                    <img src="{{asset('upload/banner/'.$partner->photo)}}" alt="">
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

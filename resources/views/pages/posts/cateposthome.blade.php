@extends('layout')
@section('content')

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>{{$meta_title}}</span>
                    <div class="fb-share-button" data-href="{{$url_canonical}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog">
    <div class="container">
        <div class="row">
            @foreach($post as $key => $p)
            <div class="col-md-6">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="{{asset('public/uploads/post/'.$p->post_image)}}" alt="Blog">
                    </div>
                    <div class="blog-content">
                        <h2 class="blog-title">{{$p->post_title}}</h2>
                        <div class="blog-meta">
                            <p><i class="far fa-user"></i>{{$p->post_poster}}</p>
                            <p><i class="far fa-calendar-alt"></i>{{$p->time}}</p>
                        </div>
                        <div class="blog-text">
                            <p>{!!substr_replace($p->post_desc, "...", 350)!!}</p>
                            <a class="btn btn-warning" style="color:#ffffff;padding:7px;" href="{{URL::to('/bai-viet/'.$p->post_slug)}}">Đọc ngay</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="pagination justify-content-center">
                    <li class="page-item">{{$post->links()}}</li>
                </ul> 
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

@endsection
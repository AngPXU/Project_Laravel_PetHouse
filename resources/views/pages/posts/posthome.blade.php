@extends('layout')
@section('content')

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>{{$meta_title}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__item">
                        <div class="section-title">
                            <h4>Danh mục bài viết</h4>
                        </div>
                        <ul>
                            @foreach($category_post as $key => $listpost)
                                <li><a href="{{URL::to('/danh-muc-bai-viet/'.$listpost->cate_post_slug)}}">{{$listpost->cate_post_name}} <span>(6)</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <div class="section-title">
                            <h4>Liên quan</h4>
                        </div>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($related as $key => $post_relate)
                                    <a href="{{URL::to('/bai-viet/'.$post_relate->post_slug)}}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('public/uploads/post/'.$post_relate->post_image)}}" alt="">
                                            <h6>{{$post_relate->post_title}}</h6>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="blog__details__content">
                    @foreach($post as $key => $p)
                    <div class="blog__details__item">
                        <img src="img/blog/details/blog-details.jpg" alt="">
                        <div class="blog__details__item__title">
                            <div class="fb-share-button" data-href="{{$url_canonical}}" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                            <h4>{{$p->post_title}}</h4>
                            <ul>
                                <li>Bởi: <span>{{$p->post_poster}}</span></li>
                                <li>Ngày: <span>7/4/2022</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog__details__desc">
                        <p>{!!$p->post_desc!!}</p>
                    </div>
                    <div class="blog__details__quote">
                        <div class="icon"><i class="fa fa-quote-left"></i></div>
                    </div>
                    <div class="blog__details__desc">
                        <p><p>{!!$p->post_content!!}</p></p>
                    </div>
                    @endforeach

                    <?php
                        $customer_id = Session::get('customer_id');
                        if($customer_id != NULL){	
                    ?>
                    <form>
                        @csrf
                        <div class="form-row">
                          <div class="col-3">
                            <input type="text" class="form-control comment_post_name" placeholder="Tên của bạn.." value="{{Session::get('customer_name')}}">
                          </div>
                          <div class="col-7">
                            <input type="text" class="form-control comment_post_content" placeholder="Lời bình luận..">
                          </div>
                          <div class="col">
                            <button type="button" class="btn btn-primary send_post_comment">Đăng</button>
                          </div>
                        </div>
                        <div id="notify_post_comment"></div>
                    </form>
                    <?php
                        }else{
                    ?>
                        <div class="col">
                            <a href="{{URL::to('/login-checkout')}}"><button type="submit" class="btn btn-primary">Đăng nhập để bình luận</button></a>
                        </div>
                    <?php
                            }
                    ?>
                    
                    <form>
                        @csrf
                        <input type="hidden" name="comment_post_id" class="comment_post_id" value="{{$p->post_id}}">
                        <div id="comment_post_show"></div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
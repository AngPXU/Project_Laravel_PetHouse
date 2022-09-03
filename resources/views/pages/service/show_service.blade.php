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

<!-- Price Start -->
<div class="price">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="price-item">
                    <div class="price-header">
                        <div class="price-title">
                            <h2>CƠ BẢN</h2>
                        </div>
                        <div class="price-prices">
                            <h2>500.000 đ</h2>
                        </div>
                    </div>
                    <div class="price-body">
                        <div class="price-description">
                            <ul>
                                <li>Cắt, duỗi móng</li>
                                <li>Gỡ rối, cắt tỉa lông</li>
                                <li>Tắm vệ sinh</li>
                            </ul>
                        </div>
                    </div>
                    <div class="price-footer">
                        <div class="price-action">
                            <a class="btn" href="">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="price-item">
                    <div class="price-header">
                        <div class="price-title">
                            <h2>THÔNG THƯỜNG</h2>
                        </div>
                        <div class="price-prices">
                            <h2>1.000.000 đ</h2>
                        </div>
                    </div>
                    <div class="price-body">
                        <div class="price-description">
                            <ul>
                                <li>Cắt, duỗi móng</li>
                                <li>Gỡ rối, cắt tỉa lông</li>
                                <li>Tắm vệ sinh</li>
                                <li>Spa toàn thân</li>
                            </ul>
                        </div>
                    </div>
                    <div class="price-footer">
                        <div class="price-action">
                            <a class="btn" href="">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="price-item">
                    <div class="price-header">
                        <div class="price-title">
                            <h2>CAO CẤP</h2>
                        </div>
                        <div class="price-prices">
                            <h2>1.500.000 đ</h2>
                        </div>
                    </div>
                    <div class="price-body">
                        <div class="price-description">
                            <ul>
                                <li>Cắt, duỗi móng</li>
                                <li>Gỡ rối, cắt tỉa lông</li>
                                <li>Tắm vệ sinh</li>
                                <li>Spa toàn thân</li>
                                <li>Khách sạn thú cưng</li>
                            </ul>
                        </div>
                    </div>
                    <div class="price-footer">
                        <div class="price-action">
                            <a class="btn" href="">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Price End -->

<div class="single">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-bio">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="about-text">
                                    <p style="font-size:40px;color:#fbaf32;font-weight:700;text-align:center;">15 bước Spa trọn gói</p>
                                    <hr>
                                </div>
                                <div class="main-timeline">
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B1 </div>
                                            <div class="inner-content">
                                                <p class="description">Kiểm tra sức khỏe tổng quát các bộ phận của bé: lông, móng,
                                                    tai, mắt, miệng,...
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B2 </div>
                                            <div class="inner-content">
                                                <p class="description">Tiến hành cắt và mài giũa tất cả các móng cho bé.<br></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B3 </div>
                                            <div class="inner-content">
                                                <p class="description">Cạo lông các vùng chuyên biệt: bụng, chổ đi vệ sinh, lòng bàn chân.<br></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B4 </div>
                                            <div class="inner-content">
                                                <p class="description">Dùng bông gạc vêj sinh tai và loại bỏ lông thừa trong ống tai.<br></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B5 </div>
                                            <div class="inner-content">
                                                <p class="description">Dùng thuốc rửa tai chuyên dụng giảm sát trùng, diệt khuẩn, và kìm 
                                                    hãm phát triển của vi khuẩn.<br></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B6 </div>
                                            <div class="inner-content">
                                                <p class="description">Vắt tuyến hôi giúp giảm bớt mùi mồ hôi chó bé.<br></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B7 </div>
                                            <div class="inner-content">
                                                <p class="description">Tắm gội cho bé bằng loại dầu gội phù hợp với lông và da.<br></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B8 </div>
                                            <div class="inner-content">
                                                <p class="description">Bóp dịch hậu môn để loại bỏ hoàn toàn mùi trên cở thể bé.<br></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B9 </div>
                                            <div class="inner-content">
                                                <p class="description">Dùng dầu xả để cung cấp chất dưỡng ẩm làm mượt lông.<br></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B10 </div>
                                            <div class="inner-content">
                                                <p class="description">Sấy khô, chải lông để loại bỏ lông chết cho bé.<br></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B11 </div>
                                            <div class="inner-content">
                                                <p class="description">Sấy khô, chải lông bằng lượt chuyên dụng cho pet.<br></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B12 </div>
                                            <div class="inner-content">
                                                <p class="description">Thực hiện các dịch vụ theo yêu cầu: cắt tỉa, tạo kiểu, nhuộm.<br></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B13 </div>
                                            <div class="inner-content">
                                                <p class="description">Thoa lotion tạo sự bóng mượt tự nhiên cho bộ lông.<br></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B14 </div>
                                            <div class="inner-content">
                                                <p class="description">Xịt nước hoa tạo hương thơm dễ chịu lâu dài trên cơ thể.<br></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="timeline">
                                        <a class="timeline-content">
                                            <div class="timeline-icon">
                                            </div>
                                            <div class="timeline-year"> B15 </div>
                                            <div class="inner-content">
                                                <p class="description">Hướng dẫn cách chăm sóc và dưỡng lông cho bé tại nhà.<br></p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portfolio">
                    <div class="container">
                        <div class="portfolio-text">
                            <p>Hình ảnh dịch vụ tắm Spa</p>
                        </div>
                        <div class="row portfolio-container">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="portfolio-wrap">
                                    <img src="{{asset('public/frontend/img/spa4.png')}}" alt="Ảnh dịch vụ tắm spa">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="portfolio-wrap">
                                    <img src="{{asset('public/frontend/img/spa5.png')}}" alt="Ảnh dịch vụ tắm spa">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="portfolio-wrap">
                                    <img src="{{asset('public/frontend/img/spa6.png')}}" alt="Ảnh dịch vụ tắm spa">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="portfolio-wrap">
                                    <img src="{{asset('public/frontend/img/spa7.png')}}" alt="Ảnh dịch vụ tắm spa">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="portfolio-wrap">
                                    <img src="{{asset('public/frontend/img/spa8.png')}}" alt="Ảnh dịch vụ tắm spa">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="portfolio-wrap">
                                    <img src="{{asset('public/frontend/img/spa9.png')}}" alt="Ảnh dịch vụ tắm spa">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
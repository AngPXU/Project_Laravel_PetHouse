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

<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__content">
                    <div class="contact__address">
                        <h5>Thông tin liên hệ</h5>
                        <ul>
                            <li>
                                <h6><i class="fas fa-map-marker-alt"></i> Địa chỉ</h6>
                                <p>14/286 Trưng Nữ Vương, Thủy Phương, Hương Thủy, Huế</p>
                            </li>
                            <li>
                                <h6><i class="fa fa-phone"></i> Phone</h6>
                                <p><span>+84 334 301 474</span><span>Anh: Anh</span></p>
                                <p><span>+84 766 564 481</span><span>Chị: Diệu</span></p>
                            </li>
                            <li>
                                <h6><i class="fas fa-envelope"></i> Email</h6>
                                <p>anhtuanpxu@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                    <div class="contact__form">
                        <h5>Liên hệ</h5>
                        <form action="{{URL::to('/save-contact')}}" method="post">
                            @csrf
                            <input type="text" name="contact_name" placeholder="Tên" required="">
                            <input type="text" name="contact_email" placeholder="Email" required="">
                            <input type="text" name="contact_phone" placeholder="Số điện thoại" required="">
                            <textarea name="contact_notes" placeholder="Lời nhắn" required=""></textarea>
                            <button type="submit" name="add_contact" class="site-btn">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3557.868068574649!2d107.63079651465645!3d16.42733878866051!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a228af4c4da1%3A0x0!2zMTbCsDI1JzM4LjQiTiAxMDfCsDM3JzU4LjgiRQ!5e1!3m2!1svi!2s!4v1647586660185!5m2!1svi!2s" height="780" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
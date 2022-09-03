<!DOCTYPE html>
<html lang="zxx">

<head>
    <!----------SEO----------->
    <meta charset="utf-8">
    <title>{{$meta_title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <meta name="author" content=""/>
    <link rel="canonical" href="{{$url_canonical}}"/>
    <link rel="shortcut icon" href="{{asset('public/frontend/img/pethouse.png')}}" type="image/x-icon">
    <!----------//SEO----------->
    <!----------Chia sẽ facebook----------->
    <meta property="og:url" content="{{$url_canonical}}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{$meta_title}}" />
    <meta property="og:description" content="{{$meta_desc}}" />
    <meta property="og:image" content="{{$share_image}}" />
    <!----------//Chia sẽ facebook----------->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/sweetalert.css')}}" type="text/css">
</head>

<body>

    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__logo">
            <h2>PETHOUSE</h2>
        </div>
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="search-switch"><i class="fas fa-search"></i></span></li>
            <li><a href="{{URL::to('/like')}}"><span><i class="fas fa-heart"></i></span></a></li>
            <li><a href="{{URL::to('/gio-hang')}}"><span><i class="fas fa-shopping-bag"></i></span></a></li>
        </ul>
        
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <?php
                $customer_id = Session::get('customer_id');
                if($customer_id != NULL){	
            ?>
            <a href="{{URL::to('/home-user')}}"><i class="fas fa-user"></i>&ensp;{{Session::get('customer_name')}}</a>
            <a href="{{URL::to('/logout-checkout')}}" style="color:red;"><i class="fas fa-sign-out"></i>&ensp;Đăng xuất</a>
            <?php
                }else{
            ?>
            <a href="{{URL::to('/login-checkout')}}"><i class="fas fa-sign-in"></i>&ensp;Đăng nhập</a>
            <?php
                }
            ?>
        </div>
    </div>

        <div class="top-bar d-none d-md-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top-bar-left">
                            <div class="text">
                                <i class="fas fa-clock"></i>
                                <h2>8:00 - 21:00</h2>
                                <p>Mọi ngày</p>
                            </div>
                            <div class="text">
                                <i class="fas fa-phone"></i>
                                <h2>+84 334 301 474</h2>
                                <p>Giờ hành chính</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="top-bar-right">
                            <div class="social">
                                <a href="{{URL::to('/like')}}"><i class="fas fa-heart"></i>Yêu thích</a>
                                <!-- --------------------Đăng nhập - Đăng xuất-------------------- -->
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id != NULL){	
                                ?>
                                <div class="dropdown-user">
                                    <a href="" class="dropbtn"><i class="fas fa-user-alt-slash"></i> {{Session::get('customer_name')}}</a>
                                    <div class="dropdown-content">
                                        <a href="{{URL::to('/home-user')}}"><i class="fas fa-user"></i>&ensp;Thông tin</a>
                                        <a href="{{URL::to('/logout-checkout')}}" style="color:red;"><i class="fas fa-sign-out"></i>&ensp;Đăng xuất</a>
                                    </div>
                                </div>
                                <?php
                                    }else{
                                ?>
                                <a href="{{URL::to('/login-checkout')}}"><i class="fas fa-user-alt"></i>Đăng nhập</a>
                                <?php
                                    }
                                ?>
                                <!-- --------------------Đăng nhập - Đăng xuất-------------------- -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-2">
                    <div class="header__logo">
                        <a href="{{URL::to('/')}}"><img src="{{asset('public/frontend/img/pethouse.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                            <li><a href="{{URL::to('/show-intro')}}">Giới thiệu</a></li>
                            <li><a href="{{URL::to('/home-product')}}">Danh mục&ensp;<i class="fas fa-angle-down"></i></a>
                                <ul class="dropdown">
                                    @foreach($category as $key => $cate)
                                        @if($cate->category_parent == 0 && $cate->category_id != 60)
                                            <li><a style="font-weight:bold;">{{$cate->category_name}}</a></li>
                                            @foreach($category as $key => $cate_sub)
                                                @if($cate_sub->category_parent == $cate->category_id)
                                                    <ul>
                                                        <li style="padding-left:15px;"><a href="{{URL::to('/danh-muc-san-pham/'.$cate_sub->category_id)}}"><i class="fas fa-caret-right"></i>&ensp;{{$cate_sub->category_name}}</a></li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">Loại&ensp;<i class="fas fa-angle-down"></i></a>
                                <ul class="dropdown">
                                    @foreach($brand as $key => $brand)
                                        <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">Phụ kiện&ensp;<i class="fas fa-angle-down"></i></a>
                                <ul class="dropdown">
                                    @foreach($category as $key => $cate)
                                        @if($cate->category_parent == 0 && $cate->category_id == 60)
                                            <li><a style="font-weight:bold;">{{$cate->category_name}}</a></li>
                                            @foreach($category as $key => $cate_sub)
                                                @if($cate_sub->category_parent == $cate->category_id)
                                                    <ul>
                                                        <li style="padding-left:15px;"><a href="{{URL::to('/danh-muc-san-pham/'.$cate_sub->category_id)}}"><i class="fas fa-caret-right"></i>&ensp;{{$cate_sub->category_name}}</a></li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">Tin tức&ensp;<i class="fas fa-angle-down"></i></a>
                                <ul class="dropdown">
                                    @foreach($category_post as $key => $listpost)
                                        <li><a href="{{URL::to('/danh-muc-bai-viet/'.$listpost->cate_post_slug)}}">{{$listpost->cate_post_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{URL::to('/show-service')}}">Dịch vụ</a></li>
                            <li><a href="{{URL::to('/show-contact')}}">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="header__right">
                        <div class="header__cart">
                            <ul>
                                <li><span class="search-switch"><i class="fas fa-search"></i></span></li>
                                <li><a href="{{URL::to('/like')}}"><i class="fa fa-heart"></i></a></li>
                                <li><div id="show-cart"></div></li>
                            </ul>
                            <div class="header__cart__price"><span>
                                @if(Session::get('cart') == true)
                                @php
                                    $total = 0;
                                @endphp
                                @foreach(Session::get('cart') as $key => $cart)
                                @php
                                    $subtotal = $cart['product_price'] * $cart['product_qty'];
                                    $total += $subtotal;
                                @endphp
                                @endforeach
                                Tổng: {{number_format($total,0,',','.').' đ'}}
                                @else
                                Tổng: 0.00 đ
                                @endif
                            </span></div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->



    @yield('content')



<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fas fa-truck"></i>
                    <h6>Miễn phí giao hàng</h6>
                    <p>Cho đơn hàng từ 1 triệu đồng</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fas fa-money-bill"></i>
                    <h6>Hoàn tiền 100%</h6>
                    <p>Cho các sản phẩm lỗi hoặc hư hại</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fas fa-phone-volume"></i>
                    <h6>Hỗ trợ 24/7</h6>
                    <p>Đội ngũ hỗ trợ chu, nhiệt tình</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fas fa-credit-card"></i>
                    <h6>Thanh toán an toàn</h6>
                    <p>Baỏ đảm thông tin thanh toán của khách hàng</p>
                </div>
            </div>
        </div>
    </div>
</section>
<img src="{{asset('public/frontend/img/banner_footer.png')}}" class="img_banner_footer" alt="Ảnh banner footer" style="margin-bottom: -50px;">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-contact">
                                    <h2>PET HOUSE</h2>
                                    <p><i class="fa fa-map-marker-alt"></i>14/286 Trưng Vữ Vương, Huế</p>
                                    <p><i class="fa fa-phone-alt"></i>+84 334 301 474</p>
                                    <p><i class="fa fa-envelope"></i>anhtuanpxu@gmail.com</p>
                                    <div class="footer-social">
                                        <a href=""><i class="fab fa-facebook-f"></i></a>
                                        <a href=""><i class="fab fa-youtube"></i></a>
                                        <a href=""><i class="fab fa-instagram"></i></a>
                                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-link">
                                    <h2>Danh mục</h2>
                                    <a href=""><i class="fas fa-angle-right"></i>&ensp;Chó cưng</a>
                                    <a href=""><i class="fas fa-angle-right"></i>&ensp;Mèo cưng</a>
                                    <a href=""><i class="fas fa-angle-right"></i>&ensp;Phụ kiện</a>
                                    <a href=""><i class="fas fa-angle-right"></i>&ensp;Thức ăn</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-link">
                                    <h2>Chính sách mua hàng</h2>
                                    <a href="{{URL::to('/show-intro')}}"><i class="fas fa-angle-right"></i>&ensp;Giao hàng</a>
                                    <a href="{{URL::to('/show-intro')}}"><i class="fas fa-angle-right"></i>&ensp;Thanh toán</a>
                                    <a href="{{URL::to('/show-intro')}}"><i class="fas fa-angle-right"></i>&ensp;Bảo hàng</a>
                                    <a href="{{URL::to('/show-intro')}}"><i class="fas fa-angle-right"></i>&ensp;Trả góp</a>
                                    <a href="{{URL::to('/show-intro')}}"><i class="fas fa-angle-right"></i>&ensp;Bảo mật</a>
                                    <a href="{{URL::to('/show-intro')}}"><i class="fas fa-angle-right"></i>&ensp;Đổi trả</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-link">
                                    <h2>Trang</h2>
                                    <div class="fb-page" data-href="https://www.facebook.com/PetHouse-101783902029151" data-tabs="timeline" data-width="300"
                     data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" 
                     data-show-facepile="true"><blockquote cite="https://www.facebook.com/PetHouse-101783902029151" 
                     class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/PetHouse-101783902029151">PetHouse</a></blockquote></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>Bản quyền thuộc &copy; PetHouse.</p>
                    <p>Thiết kế bởi AnhKlee</p>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form action="{{URL::to('/tim-kiem')}}" method="post" class="search-model-form">
            @csrf
            <input type="text" id="keywords" name="keywords_submit" placeholder="Tìm kiếm ...">
            <div id="search-ajax"></div>
        </form>
    </div>  
</div>
<!-- Search End -->



<!-- Js Plugins -->
<script src="{{asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/frontend/js/mixitup.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('public/frontend/js/sweetalert.js')}}"></script>
<script src="{{asset('public/frontend/js/main.js')}}"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
{{-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0&appId=2157791151053205&
autoLogAppEvents=1" nonce="3rB8pP0I"></script> --}}


<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>
    $(".latest-product__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });
</script>
<!---------------------------------------------------------- Đánh giá sao -------------------------------------------------------------->
<script>
    function remove_background(product_id){
        for(var count=1;count<=5;count++){
            $('#'+product_id+'-'+count).css('color','#ccc');
        }
    }

    $(document).on('mouseenter','.rating', function(){
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        remove_background(product_id);
        for(var count=1;count<=index;count++){
            $('#'+product_id+'-'+count).css('color','#ffcc00');
        }
    });

    $(document).on('mouseleave','.rating', function(){
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        var rating = $(this).data("rating");
        remove_background(product_id);
        for(var count=1;count<=rating;count++){
            $('#'+product_id+'-'+count).css('color','#ffcc00');
        }
    });

    $(document).on('click','.rating', function(){
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{url('/insert-rating')}}",
            method: "POST",
            data:{index:index,product_id:product_id,_token:_token},
            success: function(data){
                if(data == 'done'){
                    alert("Bạn đã đánh giá "+index+" trên 5 sao");
                }else{
                    alert("Lỗi đánh giá");
                }
                location.reload();
            }
        });
    });
</script>

<!-------------------------------------------------------- Ẩn hiện mật khẩu ------------------------------------------------------------>
<script>
    // step 1
const ipnElement = document.querySelector('#ipnPassword')
const btnElement = document.querySelector('#btnPassword')

// step 2
btnElement.addEventListener('click', function() {
  // step 3
  const currentType = ipnElement.getAttribute('type')
  // step 4
  ipnElement.setAttribute(
    'type',
    currentType === 'password' ? 'text' : 'password'
  )
})
</script>

<!-------------------------------------------------------- Chat bằng FB ------------------------------------------------------------>
<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "101783902029151");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

  <!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v14.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script type="text/javascript">
    function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
</script>
<!-------------------------------------------------------- Giỏ hàng Ajax ------------------------------------------------------------>
<script type="text/javascript">
    $(document).ready(function(){
        //Đếm số lượng sản phẩm trong giỏ hàng
        show_cart();
        function show_cart(){
            $.ajax({
                url:"{{url('/show-cart')}}",
                method:"GET",
                success:function(data){
                    $('#show-cart').html(data);
                }
            });
        }
        //Theem cart ajax
        $('.add-to-cart').click(function(){
            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_quantity = $('.cart_product_quantity_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
            if(parseInt(cart_product_qty) > parseInt(cart_product_quantity)){
                alert('Số lượng trong kho hiện chỉ có ' + cart_product_quantity);
            }else{
                $.ajax({
                    url: "{{url('/add-cart-ajax')}}",
                    method: "POST",
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,
                        cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity
                        },
                    success: function(data){
                        swal({
                            title: "Đã thêm sản phẩm vào giỏ hàng",
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            showCancelButton: true,
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false
                        },
                        function() {
                            window.location.href = "{{url('/gio-hang')}}";
                        });
                        show_cart();
                    }
                });
            }
        });
    });    
</script>
<!------------------------------------------------------- Xem nhanh sản phẩm ----------------------------------------------------------->
<script type="text/javascript">
    $('.xemnhanh').click(function(){
        var product_id = $(this).data('id_product');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{url('/quickview')}}",
            method: "POST",
            dataType: 'JSON',
            data:{product_id:product_id,_token:_token},
            success: function(data){
                $('#product_quickview_title').html(data.product_name);
                $('#product_quickview_id').html(data.product_id);
                $('#product_quickview_price').html(data.product_price);
                $('#product_quickview_image').html(data.product_image);
                $('#product_quickview_gallery').html(data.product_gallery);
                $('#product_quickview_desc').html(data.product_desc);
                $('#product_quickview_content').html(data.product_content);
            }
        });
    });
</script>
<!--------------------------------------------------- Bình luận sản phẩm - Bài viết ------------------------------------------------------->
<!---------- Sản phẩm ---------->
<script type="text/javascript">
    $(document).ready(function(){
        load_comment();
        function load_comment(){
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/load-comment')}}",
                method: "POST",
                data:{product_id:product_id,_token:_token},
                success: function(data){
                    $('#comment_show').html(data);
                }
            });
        }
        $('.send-comment').click(function(){
            var product_id = $('.comment_product_id').val();
            var comment_name = $('.comment_name').val();
            var comment_content = $('.comment_content').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/send-comment')}}",
                method: "POST",
                data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content,_token:_token},
                success: function(data){
                    $('#notify_comment').html('<p class="text text-success">Thêm bình luận thành công. Bình luận của bạn đang chờ xét duyệt.</p>');
                    load_comment();
                    $('#notify_comment').fadeOut(6000);
                    $('.comment_name').val('');
                    $('.comment_content').val('');
                }
            });
        });
    });
</script>
<!---------- Bài viết ---------->
<script type="text/javascript">
    $(document).ready(function(){
        load_comment_post();
        function load_comment_post(){
            var post_id = $('.comment_post_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/load-comment-post')}}",
                method: "POST",
                data:{post_id:post_id,_token:_token},
                success: function(data){
                    $('#comment_post_show').html(data);
                }
            });
        }

        $('.send_post_comment').click(function(){
            var post_id = $('.comment_post_id').val();
            var comment_post_name = $('.comment_post_name').val();
            var comment_post_content = $('.comment_post_content').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/send-post-comment')}}",
                method: "POST",
                data:{post_id:post_id,comment_post_name:comment_post_name,comment_post_content:comment_post_content,_token:_token},
                success: function(data){
                    $('#notify_post_comment').html('<p class="text text-success">Thêm bình luận thành công. Bình luận của bạn đang chờ xét duyệt.</p>');
                    load_comment_post();
                    $('#notify_post_comment').fadeOut(6000);
                    $('.comment_post_name').val('');
                    $('.comment_post_content').val('');
                }
            });
        });
    });
</script>


<!------------------------------------------------------- Phí vận chuyển ------------------------------------------------------------>
<script type="text/javascript">
    $(document).ready(function(){
        $('.choose').change(function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                if(action == 'city'){
                    result = 'province';
                }else{
                    result = 'wards';
                }
                $.ajax({
                    url:"{{url('/select-delivery-home')}}",
                    method:"post",
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                        $('#'+result).html(data);
                    }
                });
            });
        $('.calculate_delivery').click(function(){
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if(matp == '' && maqh == '' && xaid == ''){
                alert('Làm ơn chọn địa chỉ');
            }else{
                $.ajax({
                    url:"{{url('/calculate-fee')}}",
                    method:"post",
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                        location.reload();
                    }
                });
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.send_order').click(function(){
            swal({
                title: "Đặt hàng?",
                text: "Bạn có muốn mua sản phẩm này không?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Mua ngay",
                cancelButtonText: "Không",
                closeOnConfirm: false,
                closeOnCancel: false
                },
                function(isConfirm) {
                if (isConfirm) {
                    var shipping_email = $('.shipping_email').val();
                    var shipping_name = $('.shipping_name').val();
                    var shipping_address = $('.shipping_address').val();
                    var shipping_phone = $('.shipping_phone').val();
                    var shipping_notes = $('.shipping_notes').val();
                    var shipping_method = $('.payment_select').val();
                    var order_fee = $('.order_fee').val();  
                    var order_coupon = $('.order_coupon').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{url('/confirm-order')}}",
                        method:"post",
                        data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,
                            shipping_notes:shipping_notes,shipping_method:shipping_method,order_fee:order_fee,order_coupon:order_coupon,_token:_token},
                        success:function(){
                            swal("Đã mua hàng!", "Đã nhận được thông tin đặt hàng. PetHouse sẽ liên hệ đến bạn trong thời gian ngắn nhất", "success");
                        }
                    });
                    window.setTimeout(function(){
                        // location.reload();
                        window.location.href = "{{url('/home-user')}}";
                    }, 1000);
                } else {
                    swal("Đã hủy!", "Bạn đã hủy mua hàng :)", "error");
                }
            });
        });
    });
</script>

<script type="text/javascript">
    function Huydonhang(id){
        var order_code = id;
        var lydo = $('.lydohuydon').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{url('/huy-don-hang')}}",
            method:"post",
            data:{order_code:order_code,lydo:lydo,_token:_token},
            success:function(){
                alert('Bạn đã hủy đơn hàng thành công!');
                location.reload();
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).on('click', '.watch-video', function(){
        var video_id = $(this).attr('id');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{url('/watch-video')}}",
            method:"post",
            dataType:"json",
            data:{video_id:video_id,_token:_token},
            success:function(data){
               $('#video_title').html(data.video_title);
               $('#video_link').html(data.video_link);
            }
        });
    });
</script>

<!------------------------------------------------------- Sản phẩm yêu thích ------------------------------------------------------------>
<script type="text/javascript">
    function view(){
        if(localStorage.getItem('data')!=null){
            var data = JSON.parse(localStorage.getItem('data'));
            data.reverse();
            document.getElementById('row_wishlist').style.overflow = 'scroll';
            for(i=0;i<data.length;i++){
                var name = data[i].name;
                var price = data[i].price;
                var image = data[i].image;
                var url = data[i].url;
                $("#row_wishlist").append('<div class="product__item__pic set-bg"><img src="'+image+'"><ul class="product__hover"><li><a href="" title="Xem chi tiết sản phẩm"><span><i class="fas fa-eye"></i></span></a></li><li><a class="button_wishlist" onclick="add_wishlist(this.id);" title="Thêm vào yêu thích"><span><i class="fas fa-heart"></i></span></a></li><li><a type="button" data-toggle="modal" data-target="#xemnhanh" class="xemnhanh" data-id_product="" title="Xem nhanh sản phẩm"><span><i class="fas fa-expand-alt"></i></span></a></li></ul></div><div class="product__item__text"><h6><a href="'+url+'">'+name+'</a></h6><div class="product__price"><button type="button" class="btn-product add-to-cart" data-id_product="" name="add-to-cart"><i class="fas fa-cart-plus"></i> | '+price+'</button></div></div>');
            }
        }
    }
    view();

    function add_wistlist(clicked_id){
        var id = clicked_id;
        var name = document.getElementById('wishlist_productname'+id).value;
        var price = document.getElementById('wishlist_productprice'+id).value;
        var image = document.getElementById('wishlist_productimage'+id).src;
        var url = document.getElementById('wishlist_producturl'+id).href;
        var newItem = {
            'url':url,
            'id':id,
            'name':name,
            'price':price,
            'image':image
        }

        var old_data = JSON.parse(localStorage.getItem('data'));
        if(localStorage.getItem('data')==null){
            localStorage.setItem('data', '[]');
        }
        var matches = $.grep(old_data, function(obj){
            return obj.id == id;
        })

        if(matches.length){
            alert('Bạn đã thêm sản phẩm này vào yêu thích rồi ạ ^^');
        }else{
            old_data.push(newItem);
            $("#row_wishlist").append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img src="'+newItem.image+'" width="100%"></div><div class="col-md-8 info_wishlist"><p>'+newItem.name+'</p><p style="color:#fe980f">'+newItem.price+'</p><a href="'+newItem.url+'">Dat hang</a></div></div>');
        }
        localStorage.setItem('data', JSON.stringify(old_data));
    }
</script>
<!------------------------------------------------------- Sắp xếp theo giá ------------------------------------------------------------>
<!-- Danh mục -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#sort').on('change', function(){
            var url = $(this).val();
            if(url){
                window.location = url;
            }
            return false;
        });
        
        $('#sort_brand').on('change', function(){
            var url = $(this).val();
            if(url){
                window.location = url;
            }
            return false;
        });
    });
</script>

<!--------------------------------------------------------- Lọc theo giá -------------------------------------------------------------->
<script type="text/javascript">
    $( function() {
      $( "#slider-range" ).slider({
        orientation: "horizontal",
        range: true,
        min:0,
        max:{{$max_price}},
        step:10000,
        values: [0,{{$max_price}}],
        slide: function( event, ui ) {
            $( "#amount" ).val( "đ" + ui.values[ 0 ] + " - đ" + ui.values[ 1 ] );
            $( "#start_price" ).val(ui.values[ 0 ]);
            $( "#end_price" ).val(ui.values[ 1 ]);
        }
      });
      $( "#amount" ).val( "đ " + $( "#slider-range" ).slider( "values", 0 ) +
        " - đ" + $( "#slider-range" ).slider( "values", 1 ) );
    } );


</script>

<!---------------------------------------------------------- Lọc danh mục ------------------------------------------------------------->
<script type="text/javascript">
    $('.category-filter').click(function(){
        var category = [], tempArray = [];
        $.each($("[data-filters='category']:checked"), function(){
            tempArray.push($(this).val());
        });
        tempArray.reverse();
        if(tempArray.length !== 0){
            category += '?cate=' + tempArray.toString();
        }
        window.location.href = category;
    });

    $('.brand-filter').click(function(){
        var brand = [], tempArray = [];
        $.each($("[data-filters='brand']:checked"), function(){
            tempArray.push($(this).val());
        });
        tempArray.reverse();
        if(tempArray.length !== 0){
            brand += '?brand=' + tempArray.toString();
        }
        window.location.href = brand;
    });
</script>

<!------------------------------------------------------- Tự động tìm kiếm ---------------------------------------------------------->
<script type="text/javascript">
    $('#keywords').keyup(function(){
        var query = $(this).val();
        if(query != ''){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/autocomplete-ajax')}}",
                method:"post",
                data:{query:query,_token:_token},
                success:function(){
                    $('#search-ajax').fadeIn();
                    $('#search-ajax').html(data);
                }
            });
        }else{
            $('#search-ajax').fadeOut();
        }
    });
    $(document).on('click','li',function(){
        $('#keywords').val($(this).text());
        $('#search-ajax').fadeOut();
    });
</script>

</body>

</html>
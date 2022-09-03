<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>PetHouse - Trang chủ Admin</title>

    <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/css/iziToast.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/css/style.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm" data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{asset('public/backend/img/user.png')}}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Xin chào, <?php
                            $name = Session::get('admin_name');
                            if($name){
                                echo $name;
                            }
                        ?>
                        </div></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i>Thông tin
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i>Cài đặt
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{URL::to('/logout')}}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i>Đăng xuất
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{URL::to('/')}}"><img alt="image" src="{{asset('public/backend/img/pethouse.png')}}"></a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">PH</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Trang chủ</li>
                        <li><a class="nav-link" href="{{URL::to('/dashboard')}}"><i class="fas fa-home-lg"></i><span>Trang chủ</span></a></li>
                        <li class="menu-header">Sản phẩm</li>
                        <li>
                            <a class="nav-link" href="{{URL::to('/all-category-product')}}">
                                <i class="fas fa-list-alt"></i><span>Danh mục sản phẩm</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{URL::to('/all-brand-product')}}">
                                <i class="fas fa-th-list"></i><span>Loại sản phẩm</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{URL::to('/all-product')}}">
                                <i class="fas fa-dog"></i><span>Sản phẩm</span>
                            </a>
                        </li>
                        <li class="menu-header">Bài viết</li>
                        <li>
                            <a class="nav-link" href="{{URL::to('/all-category-post')}}">
                            <i class="fas fa-file"></i><span>Danh mục bài viết</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{URL::to('/all-post')}}">
                                <i class="fas fa-file-alt"></i><span>Bài viết</span>
                            </a>
                        </li>
                        <li class="menu-header">Quản lý</li>
                        <li>
                            <a class="nav-link" href="{{URL::to('/manage-order')}}">
                                <i class="fas fa-boxes"></i><span>Đơn hàng</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{URL::to('/users')}}">
                                <i class="fas fa-laptop-code"></i><span>Khách hàng</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{URL::to('/list-coupon')}}">
                                <i class="fas fa-laptop-code"></i><span>Mã giảm giá</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{URL::to('/delivery')}}">
                                <i class="fas fa-truck"></i><span>Vận chuyển</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Bình luận</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{URL::to('/comment')}}">Thú cưng</a></li>
                                <li><a class="nav-link" href="{{URL::to('/comment-post')}}">Bài viết</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-link" href="{{URL::to('/manage-banner')}}">
                                <i class="fas fa-sliders-h"></i><span>Banner</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{URL::to('/video')}}">
                                <i class="fas fa-photo-video"></i><span>Video</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{URL::to('/list-contact')}}">
                                <i class="fas fa-address-card"></i><span>Liên hệ</span>
                            </a>
                        </li>
                        <li class="menu-header">Khách sạn thú cưng</li>
                        <li>
                            <a class="nav-link" href="{{URL::to('/hotel-manager')}}">
                                <i class="fas fa-spa"></i><span>Khách sạn</span>
                            </a>
                        </li>
                        <li>
                            <a style="height:100px;"></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <div class="main-content">

                
                @yield('admin_content')

            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    &copy; 2022 <div class="bullet"></div> Thiết kế bởi <a href="https://nauval.in/">AnhKlee</a>
                </div>
                <div class="footer-right">
                
                </div>
            </footer>
        </div>
    </div>

  <script src="{{asset('public/backend/js/jquery.min.js')}}"></script> 
  <script src="{{asset('public/backend/js/popper.js')}}"></script>
  <script src="{{asset('public/backend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('public/backend/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('public/backend/js/datatables.min.js')}}"></script>
  <script src="{{asset('public/backend/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('public/backend/js/dataTables.select.min.js')}}"></script>
  <script src="{{asset('public/backend/js/modules-datatables.js')}}"></script>
  <script src="{{asset('public/backend/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <script src="{{asset('public/backend/js/scripts.js')}}"></script>
  <script src="{{asset('public/backend/js/iziToast.min.js')}}"></script>
  <script src="{{asset('public/backend/js/modules-toastr.js')}}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
    </script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-94034622-3');
    </script>
        <script>
            let table1 = document.querySelector('#table1');
            let dataTable = new simpleDatatables.DataTable(table1);
        </script>
    <!------------------------------------------------ Sắp xếp danh mục theo thứ tự --------------------------------------------------->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#category_order').sortable({
                placeholder: 'ui-state-highlight',
                update  : function(event, ui){
                    var page_id_array = new Array();
                    var _token = $('input[name="_token"]').val();
                    $('#category_order tr').each(function(){
                        page_id_array.push($(this).attr("id"));
                    });
                    alert(page_id_array);   
                    $.ajax({
                        url:"{{url('/arrange-category')}}",
                        method:"post",
                        data:{page_id_array:page_id_array,_token:_token},
                        success:function(data){
                            alert(data);
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>

    <!-------------------------------------------------------- Thư viện ảnh ----------------------------------------------------------->
    <script type="text/javascript">
        $(document).ready(function(){
            load_gallery();
            function load_gallery(){
                var pro_id = $('.pro_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/select-gallery')}}",
                    method:"post",
                    data:{pro_id:pro_id,_token:_token},
                    success:function(data){
                        $('#gallery_load').html(data);
                    }
                });
            }

            $('#file').change(function(){
                var error = '';
                var files = $('#file')[0].files;
                if(files.length > 4){
                    error+='<p>Chỉ được chọn tối đa <b>4</b> ảnh</p>';
                }else if(files.length == ''){
                    error+='<p>Vui lòng chọn ảnh</p>';
                }else if(files.size > 2000000){
                    error+='<p>Ảnh ko được lớn hơn 2MB</p>';
                }
                if(error==''){

                }else{
                    $('#file').val('');
                    $('#error_gallery').html('<span class="text-danger">'+error+'</span>');
                    return false;
                }
            });

            $(document).on('blur', '.edit_gal_name', function(){
                var gal_id = $(this).data('gal_id');
                var gal_text = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/update-gallery-name')}}",
                    method:"post",
                    data:{gal_id:gal_id,gal_text:gal_text,_token:_token},
                    success:function(data){
                        load_gallery();
                        $('#error_gallery').html('<span class="text-danger">Cập nhật tên hình ảnh thành công</span>');
                    }
                });
            });

            $(document).on('click', '.delete-gallery', function(){
                var gal_id = $(this).data('gal_id');
                var _token = $('input[name="_token"]').val();
                if(confirm('Bạn có chắc chắn muốn xóa ảnh này không ?')){
                    $.ajax({
                        url:"{{url('/delete-gallery')}}",
                        method:"post",
                        data:{gal_id:gal_id,_token:_token},
                        success:function(data){
                            load_gallery();
                            $('#error_gallery').html('<span class="text-danger">Xóa hình ảnh thành công</span>');
                        }
                    });
                }
            });

            $(document).on('change', '.file_image', function(){
                var gal_id = $(this).data('gal_id');
                var image = document.getElementById('file-'+gal_id).files[0];
                var form_data = new FormData();
                form_data.append("file", document.getElementById('file-'+gal_id).files[0]);
                form_data.append("gal_id", gal_id);
                    $.ajax({
                        url:"{{url('/update-gallery')}}",
                        method:"post",
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data:form_data,
                        contentType:false,
                        cache:false,
                        processData:false,
                        success:function(data){
                            load_gallery();
                            $('#error_gallery').html('<span class="text-danger">Cập nhật hình ảnh thành công</span>');
                        }
                    });
            });
        });
    </script>

    <!-------------------------------------------------------- Phí vận chuyển ----------------------------------------------------------->
    <script type="text/javascript">
        $(document).ready(function(){
            fetch_delivery();
            $('.add_delivery').click(function(){
                var city = $('.city').val();
                var province = $('.province').val();
                var wards = $('.wards').val();
                var fee_ship = $('.fee_ship').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/insert-delivery')}}",
                    method:"post",
                    data:{city:city,province:province,wards:wards,fee_ship:fee_ship,_token:_token},
                    success:function(data){
                        fetch_delivery();
                    }
                });
            });
            $(document).on('blur','.fee_feeship_edit', function(){
                var feeship_id = $(this).data('feeship_id');
                var fee_value = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/update-delivery')}}",
                    method:"post",
                    data:{feeship_id:feeship_id,fee_value:fee_value,_token:_token},
                    success:function(data){
                        fetch_delivery();
                    }
                });
            });
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
                    url:"{{url('/select-delivery')}}",
                    method:"post",
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                        $('#'+result).html(data);
                    }
                });
            });
            function fetch_delivery(){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/select-feeship')}}",
                    method:"post",
                    data:{_token:_token},
                    success:function(data){
                        $('#load_delivery').html(data);
                    }
                });
            }
        });
    </script>
    <!---------------------------------------------------- Quản lý số lượng bán tồn ----------------------------------------------------->
    <script type="text/javascript">
        $(document).ready(function(){
            $('.order_details').change(function(){
                var order_status = $(this).val();
                var order_id = $(this).children(":selected").attr("id");
                var _token = $('input[name="_token"]').val();
                quantity = [];
                $("input[name='product_sales_quantity']").each(function(){
                    quantity.push($(this).val());
                });
                order_product_id = [];
                $("input[name='order_product_id']").each(function(){
                    order_product_id.push($(this).val());
                });
                j = 0;
                for(i=0;i<order_product_id.length;i++){
                    var order_qty = $('.order_qty_'+order_product_id[i]).val();
                    var order_qty_storage = $('.order_qty_storage_'+order_product_id[i]).val();
                    if(parseInt(order_qty) > parseInt(order_qty_storage)){
                        j = j + 1;
                        if(j == 1){
                            alert('Số lượng hàng trong kho ko đủ');
                        }
                        $('.color_qty_'+order_product_id[i]).css('background','#C0C0C0');
                    }
                }
                if(j == 0){
                        $.ajax({
                            url:"{{url('/update-order-qty')}}",
                            method:"post",
                            data:{order_status:order_status,order_id:order_id,quantity:quantity,order_product_id:order_product_id,_token:_token},
                            success:function(data){
                                alert('Cập nhật tình trạng đơn hàng thành công');
                                location.reload();
                            }
                        });
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.update_quantity_order').click(function(){
                var order_product_id = $(this).data('product_id');
                var order_qty = $('.order_qty_'+order_product_id).val();
                var order_code = $('.order_code').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/update-qty')}}",
                    method:"post",
                    data:{order_product_id:order_product_id,order_qty:order_qty,order_code:order_code,_token:_token},
                    success:function(data){
                        alert('Cập nhật số lượng thành công');
                        location.reload();
                    }
                });
            });
        });
    </script>

    <!---------------------------------------------------------- Video ----------------------------------------------------------->
    <script type="text/javascript">
        $(document).ready(function(){
            load_video();
            function load_video(){
                $.ajax({
                    url:"{{url('/select-video')}}",
                    method:"post",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data){
                        $('#video_load').html(data);
                    }
                });
            }
        });
        $(document).on('click','.btn_add_video',function(){
            var video_title = $('.video_title').val();
            var video_slug = $('.video_slug').val();
            var video_link = $('.video_link').val();
            var video_desc = $('.video_desc').val();
            var form_data = new FormData();
            form_data.append("file", document.getElementById('file_img_video').files[0]);
            form_data.append("video_title", video_title);
            form_data.append("video_slug", video_slug);
            form_data.append("video_link", video_link);
            form_data.append("video_desc", video_desc);
            $.ajax({
                url:"{{url('/insert-video')}}",
                method:"post",
                headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    load_video();
                    $('#notify').html('<span class="text text-success">Thêm video thành công</span>');
                }
            });
        });
        $(document).on('blur', '.video_edit', function(){
            var video_type = $(this).data('video_type');
            var video_id = $(this).data('video_id');
            if(video_type == 'video_title'){
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }else if(video_type == 'video_desc'){
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }else if(video_type == 'video_link'){
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }else{
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }
            $.ajax({
                url:"{{url('/update-video')}}",
                method:"post",
                headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                data:{video_edit:video_edit,video_id:video_id,video_check:video_check},
                success:function(data){
                    load_video();
                    $('#notify').html('<span class="text text-success">Cập nhật video thành công</span>');
                }
            });
        });
        $(document).on('change', '.file_img_video', function(){
                var video_id = $(this).data('video_id');
                var image = document.getElementById('file-video-'+video_id).files[0];
                var form_data = new FormData();
                form_data.append("file", document.getElementById('file-video-'+video_id).files[0]);
                form_data.append("video_id", video_id);
                    $.ajax({
                        url:"{{url('/update-video-image')}}",
                        method:"post",
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data:form_data,
                        contentType:false,
                        cache:false,
                        processData:false,
                        success:function(data){
                            load_video();
                            $('#notify').html('<span class="text text-success">Cập nhật video thành công</span>');
                        }
                    });
            });
        $(document).on('click','.btn-delete-video',function(){
            var video_id = $(this).data('video_id');
            if(confirm('Bạn có chắc chắn muốn xóa video này không?')){
                $.ajax({
                    url:"{{url('/delete-video')}}",
                    method:"post",
                    headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    data:{video_id:video_id},
                    success:function(data){
                        load_video();
                        $('#notify').html('<span class="text text-success">Xóa video thành công</span>');
                    }
                });
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            chart60daysorder();
            var chart = new Morris.Bar({
                element: 'myfirstchart', 
                lineColors: ['#819C79', '#FC8710', '#FF6541', '#A4ADD3', '#766856'],
                pointFillColors: ['#ffa426'],
                pointStrokeColors: ['#6777ef'],
                fillOpacity: 0.6,
                hideHover: 'auto',
                parseTime: false,
                xkey: 'period',
                ykeys: ['order', 'sales', 'profit', 'quantity'],
                behaveLikeLine: true,
                labels: ['Đơn hàng', 'Doanh số', 'Lợi nhuận', 'Số lượng']
            });  

            function chart60daysorder(){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/days-order')}}",
                    method:"POST",
                    dataType:"JSON",
                    data:{_token:_token},
                    success:function(data){
                        chart.setData(data);
                    }
                });
            }

            $('.dashboard-filter').change(function(){
                var dashboard_value = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/dashboard-filter')}}",
                    method:"POST",
                    dataType:"JSON",
                    data:{dashboard_value:dashboard_value,_token:_token},
                    success:function(data){
                        chart.setData(data);
                    }
                });
            });

            $('#btn-dashboard-filter').click(function(){
                var _token = $('input[name="_token"]').val();
                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();
                $.ajax({
                    url:"{{url('/filter-by-date')}}",
                    method:"POST",
                    dataType:"JSON",
                    data:{from_date:from_date,to_date:to_date,_token:_token},
                    success:function(data){
                        chart.setData(data);
                    }
                });
            });

            var colorDanger = "#FF1744";
            Morris.Donut({
            element: 'donut-example',
            resize: true,
            colors: [
                '#6777ef',
                '#fc544b',
                '#ffa426',
                '#63ed7a'
            ],
            //labelColor:"#cccccc", // text color
            //backgroundColor: '#333333', // border color
            data: [
                {label:"Sản phẩm", value:<?php echo $product_ad?>},
                {label:"Bài viết", value:<?php echo $post_ad?>},
                {label:"Đơn hàng", value:<?php echo $order_ad?>},
                {label:"Khách hàng", value:<?php echo $customer_ad?>}
            ]
            });
        }); 
    </script>

</body>
</html>
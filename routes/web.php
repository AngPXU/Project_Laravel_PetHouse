<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

//Phần Frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', 'HomeController@index');
Route::get('/home-product', 'HomeController@home_product');
Route::post('/tim-kiem','HomeController@search');               //Trang tìm kiếm
Route::post('/autocomplete-ajax','HomeController@autocomplete_ajax');               //Trang tìm kiếm
Route::get('/show-intro','HomeController@show_intro');          //Trang giới thiệu
Route::get('/show-contact','HomeController@show_contact');      //Trang liên hệ
Route::post('/save-contact','HomeController@save_contact');     //Thêm liên hệ người dùng
Route::get('/list-contact','HomeController@list_contact');      //Hiển thị liên hệ ngươi dùng
Route::get('/unactive-contact/{contact_id}','HomeController@unactive_contact'); //Chưa liên hệ
Route::get('/active-contact/{contact_id}','HomeController@active_contact');     //Đã liên hệs
Route::get('/show-service','HomeController@show_service');      //Trang dịch vụ
Route::get('/404','HomeController@error_page_404');             //Lỗi 404
Route::get('/500','HomeController@error_page_500');             //Lỗi 500
Route::get('/farm-corgi','HomeController@farm_corgi');          //Trang farm corgi
Route::get('/farm-phoc','HomeController@farm_phoc');            //Trang farm phốc sóc
Route::get('/farm-poodle','HomeController@farm_poodle');        //Trang farm poodle
Route::get('/farm-bull','HomeController@farm_bull');            //Trang farm bull
Route::get('/farm-chow','HomeController@farm_chow');            //Trang farm chow
Route::get('/home-product','HomeController@home_product');
Route::get('/home-product-cat','HomeController@home_product_cat');
Route::get('/home-user','HomeController@home_user');
Route::get('/view-history-order/{order_code}','HomeController@view_history_order');
Route::post('/huy-don-hang','HomeController@huy_don_hang');
Route::post('/edit-home-user/{customer_id}','HomeController@edit_home_user');
Route::get('/like','HomeController@like');

//Gửi Mail
Route::get('/send-mail','HomeController@send_mail');
Route::get('/send-coupon','MailController@send_coupon');
Route::get('/mail-example','MailController@mail_example');
Route::post('/recover-pass','MailController@recover_pass');
Route::get('/update-new-pass','MailController@update_new_pass');
Route::post('/reset-new-pass','MailController@reset_new_pass');

//DDăng nhập facebook - google
Route::get('/login-facebook','AdminController@login_facebook');
Route::get('/admin/callback','AdminController@callback_facebook');
Route::get('/login-google','AdminController@login_google');
Route::get('/google/callback','AdminController@callback_google');

//DDăng nhập facebook - google khách hàng
Route::get('/login-facebook-customer','AdminController@login_facebook_customer');
Route::get('/customer/facebook/callback','AdminController@callback_facebook_customer');
Route::get('/login-customer-google','AdminController@login_customer_google');
Route::get('/google/callback','AdminController@callback_customer_google');

//Phần Backend
Route::get('/admin', 'AdminController@index');                      //Đăng nhập Admin
Route::get('/dashboard', 'AdminController@show_dashboard');         //Trang chủ Admin
Route::post('/admin-dashboard', 'AdminController@dashboard');       //Đăng nhập Admin
Route::get('/logout', 'AdminController@logout');                   //Đăng xuất Admin
Route::post('/filter-by-date', 'AdminController@filter_by_date');
Route::post('/dashboard-filter', 'AdminController@dashboard_filter');
Route::post('/days-order', 'AdminController@days_order'); 

//Danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}','BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');
Route::get('/danh-muc-phu-kien/{accessory_id}','AccessoryController@show_accessory_home');
Route::get('/chi-tiet-phu-kien/{acsr_id}','AccessoryController@details_accessory');
Route::get('/danh-muc-bai-viet/{post_slug}','PostController@danh_muc_bai_viet');
Route::get('/bai-viet/{post_slug}','PostController@bai_viet');
Route::post('/quickview','ProductController@quickview');

//Bình luận
Route::post('/load-comment','ProductController@load_comment');         //Hiển thị bình luận User
Route::post('/send-comment','ProductController@send_comment');         //Thêm bình luận
Route::get('/comment','ProductController@list_comment');               //Hiển thị bình luận Admin
Route::get('/delete-comment/{comment_id}','ProductController@delete_comment');      //Xóa bình luận Admin

Route::post('/load-comment-post','PostController@load_comment_post');         //Hiển thị bình luận User
Route::post('/send-post-comment','PostController@send_post_comment');         //Thêm bình luận
Route::get('/comment-post','PostController@list_comment_post');               //Hiển thị bình luận Admin
Route::get('/delete-post-comment/{commentpost_id}','PostController@delete_post_comment');      //Xóa bình luận Admin

//Danh mục sản phẩm
Route::get('/add-category-product','CategoryProduct@add_category_product');     //Thêm danh mục sản phẩm
Route::get('/all-category-product','CategoryProduct@all_category_product');     //Hiển thị danh mục sản phẩm
Route::get('/save-category-product','CategoryProduct@save_category_product');   //Thêm danh mục sản phẩm
Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');     //Bỏ kích hoạt danh mục sản phẩm
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');         //Kích hoạt danh mục sản phẩm
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');         //Sửa danh mục sản phẩm
Route::get('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');     //Cập nhật danh mục sản phẩm
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');     //Xóa danh mục sản phẩm
Route::post('/export-csv','CategoryProduct@export_csv');
Route::post('/import-csv','CategoryProduct@import_csv');
Route::post('/arrange-category','CategoryProduct@arrange_category');

//Thương hiệu
Route::get('/add-brand-product','BrandProduct@add_brand_product');          //Thêm danh mục thương hiệu
Route::get('/all-brand-product','BrandProduct@all_brand_product');          //Hiển thị danh mục thương hiệu
Route::get('/save-brand-product','BrandProduct@save_brand_product');       //Thêm danh mục thương hiệu
Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');   //Bỏ kích hoạt danh mục thương hiệu
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');       //Kích hoạt danh mục thương hiệu
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');             //Sửa danh mục thương hiệu
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');         //Xóa danh mục thương hiệu
Route::get('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');       //Cập nhật danh mục thương hiệu
Route::post('/export-csv-brand','BrandProduct@export_csv_brand');
Route::post('/import-csv-brand','BrandProduct@import_csv_brand');

//Sản phẩm 
Route::get('/add-product','ProductController@add_product');         //Thêm sản phẩm 
Route::get('/all-product','ProductController@all_product');         //Hiển thị sản phẩm
Route::post('/save-product','ProductController@save_product');      //Thêm sản phẩm
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');      //Bỏ kích hoạt sản phẩm
Route::get('/active-product/{product_id}','ProductController@active_product');          //Kích hoạt sản phẩm
Route::get('/edit-product/{product_id}','ProductController@edit_product');              //Sửa sản phẩm
Route::get('/delete-product/{product_id}','ProductController@delete_product');          //Xóa sản phẩm
Route::post('/update-product/{product_id}','ProductController@update_product');         //Cập nhật sản phẩm
Route::get('/tag/{product_tag}','ProductController@tag');           //Tag sản phẩm
Route::get('/show-pro','ProductController@show_pro');               //Hiển thị tất cả sản phẩm
Route::post('/export-csv-product','ProductController@export_csv_product');
Route::post('/import-csv-product','ProductController@import_csv_product');
Route::post('/insert-rating','ProductController@insert_rating');

//Giỏ hàng
Route::post('/save-cart','CartController@save_cart');       //Thêm sản phẩm vào giỏ hàng
Route::post('/save-cart-accessory','CartController@save_cart_accessory');       //Thêm phụ kiện vào giỏ hàng
Route::post('/update-cart-quantity','CartController@update_cart_quantity');     //Cập nhật số lượng sản phẩm trong giỏ hàng
Route::get('/show-cart','CartController@show_cart');        //Hiển thị giỏ hàng
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');      //Xóa sản phẩm trong giỏ hàng
Route::get('/unset-coupon','CartController@unset_coupon');            //Xóa mã giảm giá
Route::get('/del-all-product','CartController@delete_all_product');         //Xóa tất cả sản phẩm, mã giảm giá trong giỏ hàng

//Giỏ hàng AJAX
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/gio-hang','CartController@gio_hang');
Route::post('/update-cart','CartController@update_cart');
Route::get('/del-product/{session_id}','CartController@del_product');
Route::get('/del-all-product','CartController@del_all_product');
Route::get('/show-cart','CartController@show_cart_menu');                    //Hiển thị số lượng SP có trong Cart

//Checkout
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/register-checkout','CheckoutController@register_checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::get('/forgot-pass','CheckoutController@forgot_pass');
Route::post('/add-customer','CheckoutController@add_customert');        //Đăng ký
Route::get('/checkout','CheckoutController@checkout')->name('checkout');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/login-customer','CheckoutController@login_customert');
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
Route::post('/calculate-fee','CheckoutController@calculate_fee');
Route::get('/del-fee','CheckoutController@del_fee');
Route::post('/confirm-order','CheckoutController@confirm_order');

//Đặt hàng
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');
Route::get('/print-order/{checkout_code}','OrderController@print_order');
Route::post('/update-order-qty','OrderController@update_order_qty');            
Route::post('/update-qty','OrderController@update_qty');

//Danh mục phụ kiện
Route::get('/add-accessory-product','AccessoryController@add_accessory_product');
Route::get('/all-accessory-product','AccessoryController@all_accessory_product');
Route::post('/save-accessory-product','AccessoryController@save_accessory_product');
Route::get('/unactive-accessory-product/{accessory_product_id}','AccessoryController@unactive_accessory_product');
Route::get('/active-accessory-product/{accessory_product_id}','AccessoryController@active_accessory_product');
Route::get('/edit-accessory-product/{accessory_product_id}','AccessoryController@edit_accessory_product');
Route::get('/delete-accessory-product/{accessory_product_id}','AccessoryController@delete_accessory_product');
Route::post('/update-accessory-product/{accessory_product_id}','AccessoryController@update_accessory_product');

//
Route::get('/add-accessory','AccessoryController@add_accessory');
Route::get('/all-accessory','AccessoryController@all_accessory');
Route::post('/save-accessory','AccessoryController@save_accessory');       //Button thêm trong add_category_product
Route::get('/unactive-accessory/{acsr_id}','AccessoryController@unactive_accessory');   //Ẩn danh mục sản phẩm
Route::get('/active-accessory/{acsr_id}','AccessoryController@active_accessory');       //Hiện danh mục sản phẩm
Route::get('/edit-accessory/{acsr_id}','AccessoryController@edit_accessory');
Route::get('/delete-accessory/{acsr_id}','AccessoryController@delete_accessory');
Route::post('/update-accessory/{acsr_id}','AccessoryController@update_accessory');

//Mã giảm giá
Route::post('/check-coupon','CartController@check_coupon');
Route::get('/insert-coupon','CouponController@insert_coupon');
Route::get('/list-coupon','CouponController@list_coupon');
Route::post('/insert-coupon-code','CouponController@insert_coupon_code');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');

//Vận chuyển
Route::get('/delivery','DeliveryController@delivery');
Route::post('/select-delivery','DeliveryController@select_delivery');
Route::post('/insert-delivery','DeliveryController@insert_delivery');
Route::post('/select-feeship','DeliveryController@select_feeship');
Route::post('/update-delivery','DeliveryController@update_delivery');

//Phân quyền
Route::get('/register-auth','AuthController@register_auth');
Route::get('/login-auth','AuthController@login_auth');
Route::post('/register','AuthController@register');
Route::post('/login','AuthController@login');

Route::get('/users','AuthController@index');
Route::get('/add-users','AuthController@add_users');
Route::post('/store-users','AuthController@store_users');
Route::post('/assign-roles','AuthController@assign_roles');

//Danh mục bài viết
Route::get('/add-category-post','CategoryPost@add_category_post'); 
Route::post('/save-category-post','CategoryPost@save_category_post');
Route::get('/all-category-post','CategoryPost@all_category_post');
Route::get('/danh-muc-bai-viet/{cate_post_slug}','CategoryPost@danh_muc_bai_viet');
Route::get('/unactive-category-post/{cate_id}','CategoryPost@unactive_category_post');
Route::get('/active-category-post/{cate_id}','CategoryPost@active_category_post');
Route::get('/edit-category-post/{cate_post_id}','CategoryPost@edit_category_post');
Route::post('/update-category-post/{cate_id}','CategoryPost@update_category_post');
Route::get('/delete-category-post/{cate_id}','CategoryPost@delete_category_post');
Route::post('/export-csv-catepost','PostController@export_csv_catepost');
Route::post('/import-csv-catepost','PostController@import_csv_catepost');

//Bài viết
Route::get('/add-post','PostController@add_post');
Route::post('/save-post','PostController@save_post');
Route::get('/all-post','PostController@all_post');
Route::get('/edit-post/{post_id}','PostController@edit_post');
Route::get('/delete-post/{post_id}','PostController@delete_post');
Route::post('/update-post/{post_id}','PostController@update_post');
Route::get('/unactive-post/{post_id}','PostController@unactive_post');
Route::get('/active-post/{post_id}','PostController@active_post');
Route::post('/export-csv-post','PostController@export_csv_post');
Route::post('/import-csv-post','PostController@import_csv_post');

//Nhiều ảnh trong sản phẩm
Route::get('/add-gallery/{product_id}','ProductController@add_gallery');
Route::post('/select-gallery','ProductController@select_gallery');
Route::post('/insert-gallery/{pro_id}','ProductController@insert_gallery');
Route::post('/update-gallery-name','ProductController@update_gallery_name');
Route::post('/delete-gallery','ProductController@delete_gallery');
Route::post('/update-gallery','ProductController@update_gallery');

//Banner
Route::get('/manage-banner','HomeController@manage_banner');
Route::get('/add-slider','HomeController@add_slider');
Route::post('/insert-slider','HomeController@insert_slider');
Route::get('/unactive-slider/{slider_id}','HomeController@unactive_slider');
Route::get('/active-slider/{slider_id}','HomeController@active_slider');

//Video
Route::get('/video','VideoController@video');
Route::post('/select-video','VideoController@select_video');
Route::get('/add-video','VideoController@add_video');
Route::post('/insert-video','VideoController@insert_video');
Route::post('/update-video','VideoController@update_video');
Route::post('/delete-video','VideoController@delete_video');
Route::post('/update-video-image','VideoController@update_video_image');
Route::post('/watch-video','VideoController@watch_video');

//Thanh toán bằng PayPal
Route::get('/create-transaction','PayController@createTransaction')->name('createTransaction');
Route::get('/process-transaction','PayController@processTransaction')->name('processTransaction');
Route::get('/success-transaction','PayController@successTransaction')->name('successTransaction');
Route::get('/cancel-transaction','PayController@cancelTransaction')->name('cancelTransaction');

//Khách sạn thú cưng
Route::get('/hotel-manager','HotelController@hotel_manager');
Route::get('/add-hotel','HotelController@add_hotel');
Route::post('/insert-hotel','HotelController@insert_hotel');
Route::get('/delete-hotel/{hotel_id}','HotelController@delete_hotel');
Route::get('/unactive-hotel/{ht_id}','HotelController@unactive_hotel');
Route::get('/active-hotel/{ht_id}','HotelController@active_hotel');
Route::get('/edit-hotel/{ht_id}','HotelController@edit_hotel');
Route::post('/update-hotel/{ht_id}','HotelController@update_hotel');

//Thanh toán
Route::post('/vnpay-payment','CheckoutController@vnpay_payment');
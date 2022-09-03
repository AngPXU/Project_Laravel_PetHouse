<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Post;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Video;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->composer('*', function($view){
            $post_ad = Post::all()->count();
            $product_ad = Product::all()->count();
            $order_ad = Order::all()->count();
            $video_ad = Video::all()->count();
            $customer_ad = Customer::all()->count();
            $max_price = Product::max('product_price');

            $view->with('post_ad', $post_ad)->with('product_ad', $product_ad)->with('order_ad', $order_ad)->with('video_ad', $video_ad)->with('customer_ad', $customer_ad)
            ->with('max_price', $max_price);
        });
    }
}

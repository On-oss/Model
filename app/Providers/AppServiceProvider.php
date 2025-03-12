<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ProductType;
use App\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
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
        // Chia sẻ danh mục sản phẩm với tất cả các view có include header
        View::composer('commons.header', function ($view) {
            $loai_sp = ProductType::all();
            $view->with('loai_sp', $loai_sp);
        });               

        // Chia sẻ danh sách sản phẩm mới với trang product_type
        View::composer('page.loai_sanpham', function ($view) {
            $product_new = Product::where('new', 1)
                ->orderBy('id', 'DESC')
                ->skip(1)
                ->take(8)
                ->get();
            $view->with('product_new', $product_new);
        });
    }
}


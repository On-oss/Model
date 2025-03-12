<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $new_product = Product::where('new', 1)->paginate(4);
        $promotion_product = Product::where('promotion_price', '>', 0)->paginate(8);

        return view('page.trangchu', compact('slide', 'new_product', 'promotion_product'));
    }

    public function getLoaiSp($type)									
    {									
    $sp_theoloai = Product::where('id_type', $type)->get();									
    $type_product = ProductType::all();									
    $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);									
                                        
    return view('page.loai_sanpham', compact('sp_theoloai', 'type_product', 'sp_khac'));									
    }															
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(Request $request){
        // //seo
        // $meta_desc = "Thời trang cao cấp — Bảy ngày không có lý do để trả lại hoặc trao đổi hàng hóa. Giao hàng miễn phí mọi mặt hàng. miễn phí vận chuyển. thanh toán khi giao hàng. Loại: quần áo phụ nữ thời trang";
        // $meta_keywords = "quan ao nu, quần áo nữ, váy nữ";
        // $meta_title = "Store PinkBlue";
        // $url_canonical = $request->url();

        // //seo
        $cate_product = DB::table('category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        // $all_product =  DB::table('product')
        // ->join('category_product','category_product.category_id','=','product.category_id')
        // ->join('brand_product','brand_product.brand_id','=','product.brand_id')
        // ->orderby('product.brand_id','desc')->get();
        $all_product = DB::table('product')->where('product_status','0')->orderBy('product_id','desc')->limit(20)->get();
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('all_product',$all_product)
        ;
 
    }
    public function search(Request $request) {
        $keyword = $request->keyword_submit;
            $cate_product = DB::table('category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
            $brand_product = DB::table('brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
            // $all_product =  DB::table('product')
            // ->join('category_product','category_product.category_id','=','product.category_id')
            // ->join('brand_product','brand_product.brand_id','=','product.brand_id')
            // ->orderby('product.brand_id','desc')->get();
            $search_product = DB::table('product')->where('product_name','like','%'.$keyword.'%')
            ->get();
            return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)
            ->with('search_product',$search_product);
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\Models\Coupon;
session_start();

class CartController extends Controller
{
    

    public function check_coupon(Request $request){
        $data = $request->all();
       
       $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
       if($coupon){
        $count_coupon = $coupon->count();
        if($count_coupon>0){
            $coupon_session = Session::get('coupon');
            if($coupon_session == true){
                $is_avaiable = 0;
                if($is_avaiable == 0){
                    $cou[]= array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,

                    );
                    Session::put('coupon',$cou);
                }
            }else{
                $cou[]= array(
                    'coupon_code' => $coupon->coupon_code,
                    'coupon_condition' => $coupon->coupon_condition,
                    'coupon_number' => $coupon->coupon_number,

                );
                Session::put('coupon',$cou);
            }
            Session::save();
            return Redirect()->back()->with('message','Thêm mã giảm giá thành công!');
       }

    }else{
        return Redirect()->back()->with('error','Mã giảm giá không hợp lệ!');
    }
}

    public function gio_hang()  
    {
    
    $cate_product = DB::table('category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $content = Cart::content();
        $total = Cart::total(0,',','.');
        return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('brand',$brand_product)->with('total',$total);
    }







    public function add_cart_ajax(Request $request) {
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart'); // có tồn tại session cart hay chưa
    
    if($cart == true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['product_id']){
                    $is_avaiable ++;
                }
            }
               if($is_avaiable == 0){
                $cart[] = array(
                    'session_id'=> $session_id,
                    'product_name'=> $data['cart_product_name'],
                    'product_id'=> $data['cart_product_id'],
                    'product_code'=> $data['cart_product_code'],
                    'product_image'=> $data['cart_product_image'],
                    'product_qty'=>$data['cart_product_qty'],
                    'product_price'=> $data['cart_product_price'],
                ); 
                Session::put('cart',$cart); 
            }
                
            }   
            else{
            $cart[] = array(
                'session_id'=> $session_id,
                'product_name'=> $data['cart_product_name'],
                'product_id'=> $data['cart_product_id'],
                'product_code'=> $data['cart_product_code'],
                'product_image'=> $data['cart_product_image'],
                'product_qty'=>$data['cart_product_qty'],
                'product_price'=> $data['cart_product_price'],
            );
            Session::put('cart',$cart);
        }
        Session::save();
    }

 

    // public function save_cart(Request $request){
       
    //     $productId = $request->productid_hidden;
    //     $quantity = $request->qty;
    //     $product_info = DB::table('product')->where('product_id',$productId)->first();
    //     // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
    //     $data['id'] = $product_info->product_id;
    //     $data['qty'] = $quantity;
    //     $data['name'] = $product_info->product_name;
    //     $data['code'] = $product_info->product_code;
    //     $data['price'] = $product_info->product_price;
    //     $data['weight'] = $product_info->product_price;
    //     $data['options']['image'] = $product_info->product_image;
    //     $request->merge(['size' => $request->input('size', 'L')]);
    // $request->merge(['color' => $request->input('color', 'Red')]);

    //     Cart::add($data);

    //     Cart::setGlobalTax(10);

    //     return Redirect::to('/show-cart');
    //     // Cart::destroy();
        

    public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('product')->where('product_id', $productId)->first();
    
        // Kiểm tra dữ liệu đầu vào từ form
        //dd($request->all());
    
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['code'] = $product_info->product_code;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['color'] = $product_info->product_color;
        $data['options']['image'] = $product_info->product_image;
        // $color = $request->color; 
        // $data['color'] = $color;
        // Lưu kích cỡ và màu sắc vào dữ liệu giỏ hàng
        $data['options']['size'] = $request->size;
        $data['options']['color'] = $request->color;
        Cart::add($data);
    
        Cart::setGlobalTax(5);
    
        return Redirect::to('/show-cart');
    //    Cart::destroy();

    }
    
    public function show_cart(){
        
        $cate_product = DB::table('category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $content = Cart::content();
        $total = Cart::total(0,',','.');
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product)->with('total',$total);
    }
    
    public function delete_to_cart($rowId){
       
        Cart::remove($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
    public function del_all_product( Request $request)
{
    $cart =  Session::get('cart');
    if($cart == true){
       Session::forget('cart');
       Session::forget('coupon');

       return Redirect::to('/show-cart')->with('message','Xóa hết sản phẩm trong giỏ hàng thành công');
    }
}
   

}

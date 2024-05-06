<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\OrderDetails;
use App\Models\Order;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();

class CheckoutController extends Controller
{
   
    public function save_customer_info(Request $request) {
        // Lấy dữ liệu từ request
        $customerName = $request->input('customer_name');
        $customerEmail = $request->input('customer_email');
       
        $customerPhone = $request->input('customer_phone');
    
        // Xử lý dữ liệu (ví dụ: kiểm tra tính hợp lệ, khử trùng)
        // ...
    
        // Lưu thông tin khách hàng vào database
        $customer = new Customer;
        $customer->customer_name = $customerName;
        $customer->customer_email = $customerEmail;
       
        $customer->customer_phone = $customerPhone;
        $customer->save();
    
        // Lưu session thông tin khách hàng
        Session::put('customer_id', $customer->id);
        Session::put('customer_name', $customerName);
    
        // Trả về kết quả
        return redirect('/checkout');
    }

    public function Authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('doashboard');
         }else{
            Redirect::to('admin')->send();
    } 
}
    public function login_checkout()  {
        $cate_product = DB::table('category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();

        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name']= $request->customer_name;
        $data['customer_phone']= $request->customer_phone;
        $data['customer_email']= $request->customer_email;
        $data['customer_password']= md5($request->customer_password);
        $data['customer_address']= $request->customer_address;
        $customer_id = DB::table('customer')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);

        return Redirect('/login-checkout');
    }
    public function checkout(){
        $cate_product = DB::table('category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();

        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name']= $request->shipping_name;
        $data['shipping_phone']= $request->shipping_phone;
        $data['shipping_email']= $request->shipping_email;
        $data['shipping_address']= $request->shipping_address;
        $data['shipping_note']= $request->shipping_note;
        $shipping_id = DB::table('shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);
        
        return Redirect::to('/payment');
    }
    public function payment(){
        $cate_product = DB::table('category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function order_place(Request $request) {
        //insert payment method
        $data = array();
        $data['payment_method']= $request->payment_option;
        $data['payment_status']= 'Đơn hàng mới';
       
        $payment_id = DB::table('payment')->insertGetId($data);
    
        //insert order
        $order_data = array();
        $order_data['customer_id']= Session::get('customer_id');
        // $order_data['shipping_id']= Session::get('shipping_id');
        $order_data['payment_id']= $payment_id;
        $order_data['order_total'] = intval(str_replace(',', '', Cart::total()));
    
    
        $order_data['order_status']= 'Đơn hàng mới';
        $order_id = DB::table('order')->insertGetId($order_data);
        
        //insert order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data['order_id']= $order_id;
            $order_d_data['product_id']= $v_content->id;
            $order_d_data['product_name']= $v_content->name;
            $order_d_data['product_price']= $v_content->price;
            $order_d_data['product_sales_quantity']= $v_content->qty;
            DB::table('order_details')->insert($order_d_data);
        }
    
        if($data['payment_method']==1){
            echo 'Thanh toán thẻ ATM';
        } elseif($data['payment_method']==2){
            $cate_product = DB::table('category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
            $brand_product = DB::table('brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
            $order_total = $order_data['order_total']; // Lấy tổng tiền đơn hàng
            $order_details = DB::table('order_details')->where('order_id', $order_id)->get(); // Lấy chi tiết đơn hàng
            return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product)->with('order_id',$order_id)->with('order_total', $order_total)->with('order_details', $order_details);
        } else {
            echo 'Thẻ ghi nợ';
        }
    }
    
    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    }
    public function login_customer(Request $request) {
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('customer')->where('customer_email',$email)->where('customer_password', $password)->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/login-checkout');
           
        }
    }
    //order
    public function manage_order(){
        $this->Authlogin();
        $all_order =  DB::table('order')
        ->join('customer','order.customer_id','=','customer.customer_id')
        ->select('order.*','customer.customer_name')
        ->orderby('order.order_id','desc')->get();
        
        $manage_order = view('admin.manage_order')->with ('all_order', $all_order);
        return view('admin_layout') -> with('admin.manage_order', $manage_order);
    }
    public function view_order($orderId) {
        $this->Authlogin();
        $order_by_id =  DB::table('order')
            ->join('customer','order.customer_id','=','customer.customer_id')
            // ->join('shipping','order.shipping_id','=','shipping.shipping_id')
            ->join('order_details','order.order_id','=','order_details.order_id')
        
            ->select('order.*','customer.*','order_details.*')
            ->where('order.order_id', $orderId) // Lọc theo order_id
            ->get(); // Lấy tất cả các bản ghi
        
        $manage_order_by_id = view('admin.view_order')->with('order_by_id', $order_by_id);
        return view('admin_layout')->with('admin.view_order', $manage_order_by_id);
    }
    
     

}
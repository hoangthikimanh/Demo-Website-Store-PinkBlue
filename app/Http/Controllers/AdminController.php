<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
session_start();
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;
use App\Models\Product;
// use App\Http\Request;

class AdminController extends Controller
{   
  public function showProducts() {
    $products = Product::paginate(6);
    return view('admin.all_product')->with('products', $products);
}

  public function filterOrders(Request $request) {
    $start_date = $request->input('start_date');
    
    $query = Order::query();

    if ($start_date) {
        $query->whereDate('created_at', $start_date);
    }

    $filtered_orders = $query->get();

    return redirect()->route('manage_order')->with('all_order', $filtered_orders);
}

public function search_admin_product(Request $request) {
  $keyword = $request->keyword_submit;

  // Get all categories and brands for dropdown menus (unchanged)
  $cate_product = DB::table('category_product')->where('category_status', '0')->orderBy('category_id', 'desc')->get();
  $brand_product = DB::table('brand_product')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();

  // Build the search query
  $search_query = DB::table('product')
    ->join('category_product', 'category_product.category_id', '=', 'product.category_id')
    ->join('brand_product', 'brand_product.brand_id', '=', 'product.brand_id')
    ->orderBy('product.brand_id', 'desc');

  // Apply search filter based on keyword
  if ($keyword) {
    $search_query = $search_query->where(function ($query) use ($keyword) {
      $query->where('product.product_code', 'like', '%' . $keyword . '%')
        ->orWhere('product.product_name', 'like', '%' . $keyword . '%');
    });
  }

  // Execute the search query and retrieve results
  $search_product = $search_query->get();

  // Return the view with data
  return view('admin.search_product_admin')
    ->with('category', $cate_product)
    ->with('brand', $brand_product)
    ->with('search_product', $search_product);
    // ->with('all_product', $all_product); // Include all products for reference (optional)
}


    public function Authlogin(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return Redirect::to('doashboard');
      }else{
        Redirect::to('admin')->send();
      }
    }
    public function index(){
       return view('admin_login'); // ta sẽ trả về trang home
    }
    public function show_dashboard(){
        $this->Authlogin();
        return view('admin.dashboard'); // này là đường dẫn từ folder admin đến file dashboard
    }
    public function dashboard(Request $request){
       $admin_email = $request -> admin_email;
       $admin_password = md5($request -> admin_password) ; 

      $result = DB::table('admin') ->where('admin_email', $admin_email) 
     -> where('admin_password', $admin_password) ->first() ;

      if($result){
        Session()->put('admin_name', $result->admin_name);
        Session() ->put('admin_id', $result->admin_id);
        return Redirect::to('/dashboard'); 
      }
      else {
        Session() -> put('message', 'Mật khẩu hoặc tài khoản bị sai. Vui lòng nhập lại');
        return Redirect::to('/admin');
      }
      
}

public function logout(){
  $this->Authlogin();
  Session()->put('admin_name', null);
  Session() ->put('admin_id',null);
  return Redirect::to('/admin');
}


}
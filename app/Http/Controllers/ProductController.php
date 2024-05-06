<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    
    public function Authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('doashboard');
         }else{
            Redirect::to('admin')->send();
    }
    
}

    public function add_product(){
        $this->Authlogin();
        $cate_product = DB::table('category_product')->orderBy('category_id','DESC')->get();
        $brand_product = DB::table('brand_product')->orderBy('brand_id','DESC')->get();
        
        return view('admin.add_product') -> with('cate_product', $cate_product) ->with('brand_product', $brand_product);
       
    }
    public function all_product(){
        $this->Authlogin();
        $all_product =  DB::table('product')
        ->join('category_product','category_product.category_id','=','product.category_id')
        ->join('brand_product','brand_product.brand_id','=','product.brand_id')
        ->orderby('product.brand_id','desc')
        ->paginate(6);
        
        
        $manager_product = view('admin.all_product') 
        ->with ('all_product', $all_product);
        return view('admin_layout') -> with('admin.all_product', $manager_product );
    }
    public function save_product(Request $request){
        $this->Authlogin();
         $data = array();
         $data ['product_name'] = $request -> product_name ;
         $data ['product_content'] = $request -> product_name ;
         $data ['product_code'] = $request -> product_code ;
         $data ['product_desc'] = $request -> product_desc;
         $data ['product_price'] = $request -> product_price ;
        //  $data ['product_qty'] = $request -> product_qty ;
         $data ['product_size'] = $request -> product_size ;
         $data ['product_color'] = $request ->product_color;// tên name của trường; //tên của cột trong mysql
         $data ['category_id'] = $request -> product_cate;
         $data ['brand_id'] = $request ->product_brand;
         $data ['product_status'] = $request ->product_status;

         $get_image = $request ->file('product_image');
         if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).".".$get_image->getClientOriginalExtension(); //lấy ra ngẫu nhiên sản phẩm không trùng nhau và lấy được hình ảnh có nhiều đuôi mở rộng
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('product') ->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
             return  Redirect::to('all-product');
         }
         $data['product_image'] = "";
        DB::table('brand_product') ->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công không thành công');
         return  Redirect::to('all-product');
       
    }
    public function unactive_product($product_id){
        $this->Authlogin();
            DB::table('product')->where('product_id',$product_id)->update(['product_status'=>1]);
            Session::put('message', 'Kích hoạt sản phẩm không thành công');
            return  Redirect::to('all-product');
       
    }

    public function active_product($product_id){
        $this->Authlogin();
        DB::table('product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message', 'Kích hoạt sản phẩm thành công');
        return  Redirect::to('all-product');
    }
    public function edit_product($product_id){
           //function chỉnh sửa danh mục sản phẩm
           $this->Authlogin();
        $cate_product = DB::table('category_product')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('brand_product')->orderBy('brand_id','desc')->get();

        $edit_product =  DB::table('product') ->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with ('edit_product', $edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('admin_layout') -> with('admin.edit_product', $manager_product );
    }
    public function update_product(Request $request, $product_id)  { //function cập nhật danh mục sản phẩm
        $this->Authlogin();
        $data = array();
        $data ['product_name'] = $request -> product_name ;
        $data ['product_content'] = $request -> product_name ;
        $data ['product_code'] = $request -> product_code ;
        $data ['product_desc'] = $request -> product_desc;
        $data ['product_price'] = $request -> product_price ;
        $data ['product_size'] = $request -> product_size ;
        // $data ['product_qty'] = $request->product_qty; // Giá trị mặc định là 0 nếu không có giá trị từ form

        $data ['product_color'] = $request ->product_color;// tên name của trường; //tên của cột trong mysql
        $data ['category_id'] = $request -> product_cate;
        $data ['brand_id'] = $request ->product_brand;
        $data ['product_status'] = $request ->product_status;
        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).".".$get_image->getClientOriginalExtension(); //lấy ra ngẫu nhiên sản phẩm không trùng nhau và lấy được hình ảnh có nhiều đuôi mở rộng
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('product')->where('product_id', $product_id) ->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công');
             return  Redirect::to('all-product');
         }
        
         DB::table('product')->where('product_id', $product_id) ->update($data);
         Session::put('message', 'Cập nhật sản phẩm thành công');
         return  Redirect::to('all-product');
    }
    public function delete_product($product_id)  {
        $this->Authlogin();
        DB::table('product')->where('product_id',$product_id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return  Redirect::to('all-product');
        
    }
    //End Adim page
    public function details_product($product_id){
        $cate_product = DB::table('category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();

        $details_product =  DB::table('product')
        ->join('category_product','category_product.category_id','=','product.category_id')
        ->join('brand_product','brand_product.brand_id','=','product.brand_id')
        ->where('product.product_id',$product_id)->get();
    
        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
        }
        
    
        $related_product =  DB::table('product')
        ->join('category_product','category_product.category_id','=','product.category_id')
        ->join('brand_product','brand_product.brand_id','=','product.brand_id')
        ->where('category_product.category_id',$category_id)->whereNotIn('product.product_id',[$product_id])
        ->paginate(20);
        


        return view('pages.sanpham.show_details')->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('product_details',$details_product)
        ->with('related_product',$related_product)
        ;
    }
}

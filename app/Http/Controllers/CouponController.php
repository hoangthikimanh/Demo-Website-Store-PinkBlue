<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use PHPUnit\Framework\Constraint\Count;

session_start();

class CouponController extends Controller
{
    public function checkCoupon(Request $request) {
        $couponCode = $request->input('coupon_code');
    
        // Kiểm tra mã giảm giá trong cơ sở dữ liệu
        $coupon = Coupon::where('coupon_code', $couponCode)->first();
    
        if ($coupon) {
            // Mã giảm giá hợp lệ
            return response()->json([
                'valid' => true,
                'discount' => $coupon->coupon_times,
                'type' => $coupon->coupon_name
            ]);
        } else {
            // Mã giảm giá không hợp lệ
            return response()->json(['valid' => false]);
        }
    }

    public function insert_coupon(){
        return view('admin.coupon.insert_coupon');
    }
    public function insert_coupon_code(Request $request){
        $data = $request->all();
       $coupon = new Coupon(); 

       $coupon->coupon_name = $data['coupon_name']; //cot 1 là cột ở mysql, cột 2 là name ở trong insert_coupon
       $coupon->coupon_code = $data['coupon_code'];
       $coupon->coupon_times = $data['coupon_times'];
       $coupon->coupon_number = $data['coupon_number'];
       $coupon->coupon_condition = $data['coupon_condition'];
       $coupon->save();

       Session::put('message', 'Thêm mã giảm giá thành công');
       return  Redirect::to('insert-coupon');
    }
    public function list_coupon()  {
        $coupon = Coupon::orderby('coupon_id', 'DESC')->get();
        return view('admin.coupon.list_coupon')->with(compact('coupon'));
    }
    public function delete_coupon($coupon_id){
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        Session::put('message', 'Xóa mã giảm giá thành công');
        return  Redirect::to('list-coupon');

    }
    
}

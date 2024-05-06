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
use PDF;


class OrderController extends Controller
{
    public function print_order($checkout_code){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }
    public function print_order_convert($checkout_code){
        $order_details = OrderDetails::where('order_id', $checkout_code)->get();
        $order = Order::where('order_id', $checkout_code)->first();
        $customer = Customer::where('customer_id', $order->customer_id)->first();
        
        // Chuyển đổi chuỗi ngày tháng thành đối tượng ngày tháng
        $created_at = \Carbon\Carbon::parse($order->created_at)->format('d/m/Y');
        
        $customer_info = '<div class="customer-info" style="font-family: DejaVu Sans; margin-bottom: 1cm;">';
        $customer_info .= '<div style="text-align: center;"><strong>Cửa hàng PinkBlue</strong></div>';
        $customer_info .= '<div><strong>Ngày đặt hàng:</strong> ' . $created_at . '</div>';
        $customer_info .= '<div><strong>Tên khách hàng:</strong> ' . $customer->customer_name . '</div>';
        $customer_info .= '<div><strong>Số điện thoại:</strong> ' . $customer->customer_phone . '</div>';
        $customer_info .= '<div><strong>Địa chỉ:</strong> ' . $customer->customer_address . '</div>';
        $customer_info .= '</div>';
    
        $product_table = '<table class="table table-bordered table-striped" style="border-color: black;">';
        $product_table .= '<thead>';
        $product_table .= '<tr>';
        $product_table .= '<th>Tên sản phẩm</th>';
        $product_table .= '<th>Số lượng</th>';
        $product_table .= '<th>Đơn giá</th>';
        $product_table .= '<th>Thành tiền</th>';
        $product_table .= '</tr>';
        $product_table .= '</thead>';
        $product_table .= '<tbody>';
    
        foreach ($order_details as $detail) {
            // Tính thành tiền cho từng sản phẩm
            $subtotal = $detail->product_sales_quantity * $detail->product_price;
            
            $product_table .= '<tr>';
            $product_table .= '<td>' . $detail->product_name . '</td>';
            $product_table .= '<td>' . $detail->product_sales_quantity . '</td>';
            $product_table .= '<td>' . number_format($detail->product_price, 0, ',', '.') . '</td>';
            $product_table .= '<td>' . number_format($subtotal, 0, ',', '.') . '</td>';
            $product_table .= '</tr>';
        }
    
        // Tính tổng cộng từ đơn hàng
        $total_amount = $order->order_total;
    
        // Hiển thị tổng cộng trong bảng sản phẩm
        $product_table .= '<tr>';
        $product_table .= '<td colspan="3"><strong>Tổng cộng</strong></td>';
        $product_table .= '<td>' . number_format($total_amount, 0, ',', '.') . '</td>';
        $product_table .= '</tr>';
    
        $product_table .= '</tbody>';
        $product_table .= '</table>';
    
        $output = $customer_info . $product_table;
    
        $output .= '<style>
            body {
                font-family: DejaVu Sans;
            }
            .table-bordered {
                border: 1px solid black;
                width:100%;
            }
            .table-bordered th, .table-bordered td {
                border: 1px solid black;
            }
        </style>';
    
        return $output;
    }
    




    public function search(Request $request)
    {
        $searchQuery = $request->input('q');
        $customers = [];
        if ($searchQuery) {
            $customers = Customer::where('customer_name', 'like', "%{$searchQuery}%")
            ->orWhere('customer_email', 'like', "%{$searchQuery}%")
            ->orWhere('customer_phone', 'like', "%{$searchQuery}%")
            ->get();
        }
        return view('admin.add_order', ['customers' => $customers]);
        }
        
    public function add_order(){
        return view('admin.add_order');
    }

    public function customer_info()
    {
       
          $customer = Customer::first();

           
               if ($customer) {
                $message = '"Vì chính sách an toàn thẻ, bạn không thể thay đổi SĐT, Ngày sinh, Họ tên. Vui lòng liên hệ CSKH 02 9734 34586 để được hỗ trợ"';
            } else {
                $message = 'Không tìm thấy thông tin khách hàng!';
            }
            
            // Lưu tin nhắn vào session
            session()->flash('message', $message);
            
            $cate_product = DB::table('category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
            $brand_product = DB::table('brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
            
            return view('pages.sanpham.customer_info')->with('category', $cate_product)
                                                       ->with('brand', $brand_product)
                                                       ->with('customer',$customer); 
            }

   public function order_list() {
    $cate_product = DB::table('category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
    $brand_product = DB::table('brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
    $customer = Customer::first();
   
    // Lấy tất cả các đơn hàng đã đặt
    $orders = DB::table('order')->get();

    // Tạo một mảng để lưu thông tin chi tiết của từng đơn hàng
    $order_details = [];

    foreach ($orders as $order) {
        $order_date = DB::table('order')->select('created_at')->where('order_id', $order->order_id)->value('created_at');
        // Lấy chi tiết đơn hàng cho mỗi đơn hàng
        $details = DB::table('order_details')->where('order_id', $order->order_id)->get();
        
        // Tính tổng tiền của đơn hàng
        $total = 0;
        foreach ($details as $detail) {
            $total += $detail->product_price * $detail->product_sales_quantity;
        }

        // Thêm thông tin chi tiết của đơn hàng vào mảng
        $order_details[] = [
            'order_id' => $order->order_id,
            'order_date' => $order_date,
            'order_status' => $order->order_status,
            'products' => $details,
            'total' => $total
        ];
    }

    // Lấy order_id đầu tiên trong danh sách nếu có
    $order_id = !empty($order_details) ? $order_details[0]['order_id'] : null;

    return view('pages.sanpham.order_list')->with('category', $cate_product)
                                           ->with('brand', $brand_product)
                                           ->with('order_details', $order_details)
                                           ->with('order_id', $order_id) // Truyền biến $order_id vào view
                                           ->with('customer', $customer); // Truyền biến $order_id vào view
}




    
    public function deleteOrder($order_id) {
        // Xóa đơn hàng từ cơ sở dữ liệu
        Order::where('order_id', $order_id)->delete();

        // Đặt thông báo cho người dùng
        Session::flash('message', 'Đã xóa đơn hàng thành công');

        // Chuyển hướng người dùng đến trang danh sách đơn hàng
        return redirect()->back();
    }

        public function show_order()
        {
            $orders = Order::all(); // Lấy tất cả các đơn hàng từ cơ sở dữ liệu
            return view('pages.checkout.handcash', compact('order')); // Truyền biến $orders vào view
        }

            
}

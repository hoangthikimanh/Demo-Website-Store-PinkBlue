@extends('layout')
@section('content')
<section id="order-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Chi tiết đơn hàng</h2>
                <div class="order">
                   
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng: </th>
                                <th>Ngày đặt</th>
                                <th>Trạng thái</th>
                                <th>Sản phẩm</th>
                                <th>Tổng tiền</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order_details as $order_detail)
                                <tr>
                                    <td>PL00{{ $order_id }}</td>
                                    <td>
                                        @if ($order_detail->created_at)
                                            {{ $order_detail->created_at->format('Y-m-d H:i:s') }}
                                        @else
                                            // Xử lý trường hợp created_at không tồn tại
                                        @endif
                                    </td>
                                    
                                    <td>Đặt hàng thành công</td>
                                    <td>{{ $order_detail->product_sales_quantity }} - {{ $order_detail->product_name }}</td>
                                    <td>{{ $order_total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section> <!--/#order-details-->
@endsection

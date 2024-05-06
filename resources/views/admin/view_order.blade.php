@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin khách hàng
      </div>
      
      <div class="table-responsive">
      
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên khách hàng </th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              
              <td>{{$order_by_id[0]->customer_name}}</td>
              <td>{{$order_by_id[0]->customer_address}}</td>
              <td>{{$order_by_id[0]->customer_phone}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<br><br>
{{-- <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin vận chuyển
      </div>
      
      <div class="table-responsive">
      
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên người vận chuyển </th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$order_by_id[0]->shipping_name}}</td>
              <td>{{$order_by_id[0]->shipping_address}}</td>
              <td>{{$order_by_id[0]->shipping_phone}}</td>
               
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div> --}}

<br><br>

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê chi tiết đơn hàng 
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên sản phẩm </th>
              <th>Số lượng </th>
              <th>Giá</th>
              
              
              <th>Tổng tiền</th>
              
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($order_by_id as $order)

                    <tr>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->product_sales_quantity }}</td>
                        <td>{{ number_format($order->product_price, 0, '.', '.') }}</td>
                        
                        <td>{{ number_format($order->product_sales_quantity * $order->product_price, 0, '.', '.') }}</td>
                        
                    </tr>
                    
                    @endforeach
                    <tr>
                      <td></td><td></td>
                      <td><strong>Tổng cộng</strong></td>
                      <td>{{ number_format($order->order_total, 0, '.', '.') }}</td>
                    </tr>
          </tbody>
        </table>
      </div>
  </div>

     
    
  
  
@endsection
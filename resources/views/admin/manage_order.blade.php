@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê đơn hàng
      </div>
      <div class="row w3-res-tb">
        <form method="POST" action="{{URL::to('/filter-orders')}}">
        <div class="col-sm-3">
          <div class="input-group">
              <input type="date" class="input-sm form-control" placeholder="Từ ngày" name="start_date">
              
              <span class="input-group-btn">
                  <button class="btn btn-sm btn-default" type="submit" id="filter_btn">Lọc</button>
              </span>
          </div>
          </form>
      </div>
      
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          
        </div>
      </div>
      <div class="table-responsive">
        <?php
        $message = Session::get('message');
        if ($message) {
           echo '<span class = "text-alert">'.$message.'</span>';
           Session::put('message', null);
        }
    ?>
       <table class="table table-striped b-t b-light">
        <thead>
            <tr>
                <th style="width:20px;">
                    
                </th>
                
              
                <th>Mã đơn hàng</th>
                <th>Thời gian đặt hàng</th>
                <th>Tên khách hàng</th>
                <th>Trạng thái đơn hàng</th>
                <th>Tổng giá tiền</th>
                
                <th>Hiển thị</th>
                <th>Xem HĐ</th>
                <th style="width:30px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalAmount = 0; // Khai báo biến tổng số tiền và gán giá trị ban đầu là 0
            ?>
            @foreach ($all_order as $key => $order)
            <tr>
                <td>
                    
                </td>
                <td>HD00{{ $order->order_id }}</td>
                <td>{{ \Carbon\Carbon::parse($order->created_at)->format(' H:i:s  d/m/Y' ) }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->order_status }}</td>
                <td>{{ number_format($order->order_total, 0, '.', '.') }}</td>

                <td>
                    <a href="{{ URL::to('/view-order/'.$order->order_id) }}" class="active styling edit" ui-toggle-class="">
                        <i class="fa fa-eye text-success text-active"></i>
                    </a>
                    <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng này không?')" href="{{ URL::to('/delete-order/'.$order->order_id) }}" class="active styling edit" ui-toggle-class="">
                        <i class="fa fa-times text-danger text"></i>
                    </a>
                </td>
                <td><a target="_blank" href="{{url::to('/print-order/'.$order->order_id)}}">Xuất HĐ</a></td>
            </tr>
            <?php
            // Thêm số tiền của đơn hàng hiện tại vào biến tổng
            $totalAmount += $order->order_total;
            ?>
            @endforeach
        </tbody>
    </table>
    
      
      
    <br>
    <p><strong>Tổng số tiền: {{ number_format($totalAmount,0, '.', '.') }}</strong></p>
    <br>
    
      </div>
      {{-- <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer> --}}
    </div>
  </div>

@endsection
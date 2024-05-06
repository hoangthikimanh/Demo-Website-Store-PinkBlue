@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
              <li class="active">Giỏ hàng của bạn</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
          
            <!-- Bắt đầu một bảng mới -->
<table class="table table-condensed">
    <thead>
        <tr class="cart_menu">
            <td class="image">Hình ảnh</td>
            <td class="name">Tên sản phẩm</td>
            <td class="price">Giá</td>
            <td class="quantity">Số lượng</td>
            <td class="total">Tổng</td>
            
        </tr>
    </thead>
    <tbody>
       @php
            $total = 0; 
       @endphp
        @foreach(Session::get('cart')->items ?? [] as $item)
           @php
               $subtotal = $item->product_price * $item->product_qty;
               $total = $subtotal;
           @endphp
            <tr>
                <td class="cart_product">
                  
                    <img src="{{asset('public/uploads/product/'.$item->product_image) }}" width="90" alt="{{$item->product_name}}" />
                </td>
                
                <td class="cart_description">
                    <p>{{ $item->product_name}}</p> 
                </td>
                <td class="cart_price">
                    <p>{{number_format($item->product_price,0, ',', '.')}}vnđ</p>
                </td>
                <td class="cart_quantity">
                    <div class="cart_quantity_button">
                        <form action="" method="POST">
                            <input class="cart_quantity_" type="number" name="cart_quantity" value="{{ $item->product_qty}}" min="1">
                            <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                        </form>
                    </div>
                </td>
                <td class="cart_total">
                    <p class="cart_total_price">
                        {{number_format($subtotal,0, ',', '.')}}
                    </p>
                </td>
                <td class="cart_delete">
                    <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                </td>
            </tr>
        @endforeach
       
    </tbody>
</table>

</div>
</div>
</section> <!--/#cart_items-->

<section id="do_action">
    
        
        <div class="row">
            <div class="col-sm-6">
                
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng tiền: <span>{{number_format($total,0, ',', '.')}}</span></li>
                        <li>Thuế <span></span></li>
                        <li>Phí vận chuyển<span>Free</span></li>
                        <li>Tiền sau giảm<span></span></li>
                    </ul>
                   
                     <a class="btn btn-default check_out" href="">Thanh toán</a>
                   
                     <a class="btn btn-default check_out" href="">Tính mã giảm giá</a>
                     
                </div>
            </div>
        </div>
    
</section><!--/#do_action-->
@endsection
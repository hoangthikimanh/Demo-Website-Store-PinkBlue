@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container" >
        {{-- <div class="breadcrumbs"> --}}
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                <li class="active">Hoàn thành</li>
              </ol>
        {{-- </div> --}}
    </div>
   <div style="margin-bottom:3cm;font-size: 19px;
   font-family: 'ui-monospace';margin-top:1cm">
    Đơn hàng của bạn đã được đặt hàng thành công. Chúng tôi sẽ cố gắng gửi hàng đến tay bạn sớm nhất có thể!. Cảm ơn bạn đã tin tưởng PinkBlue <br><br>
    <div style="text-align: left;">
        <a href="{{URL::to('/trang-chu')}}" class="back"><i class="fas fa-arrow-left"></i>  Tiếp tục mua hàng</a>
    </div>
</div> 
    

@endsection
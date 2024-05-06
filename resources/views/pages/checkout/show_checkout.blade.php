<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Store PinkBlue</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	<style>
        body {
            font-family: 'Roboto', sans-serif; /* Sử dụng font chữ Roboto */
        }
    </style>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{('public/frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<script>
		window.onload = function() {
		  document.getElementById("localhost-notice").innerHTML = "Cửa hàng Pinkblue thông báo";
		}
	  </script>
	  
</head><!--/head-->

<body>
	
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> hoangkimuc@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								

								<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
								<?php 
								 $customer_id = Session::get('customer_id');
								 $shipping_id = Session::get('shipping_id');
								 if ($customer_id != NULL && $shipping_id == NULL) {
								?>
								<li><a href="{{URL::to('/customer-info')}}"><i ><img src="{{asset('public/frontend/images/acount.png')}}" width="25px" height="25px" alt=""></i>Tài khoản</a></li>
								<?php 

								}elseif ($customer_id != NULL && $shipping_id != NULL) {
									
								?>
								<li><a href="{{URL::to('/customer-info')}}"><i ><img src="{{asset('public/frontend/images/acount.png')}}" width="25px" height="25px" alt=""></i>Tài khoản</a></li>
								<?php 
								}else{
									
								?>
									<li><a href="{{URL::to('/login-checkout')}}"><i ><img src="{{asset('public/frontend/images/acount.png')}}" width="25px" height="25px" alt=""></i>Tài khoản</a></li>
								<?php 
								
								}
								?>

							

								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li></li>
								<li></li>
								<li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
								<li class="dropdown">
									<a href="#">Danh mục<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
									  @foreach ($category as $key => $cate)
										<li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
									  @endforeach
									</ul>
								</li>
								
								<li class="dropdown">
									<a href="#">Thương hiệu <i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										@foreach ($brand as $key => $brand)
										<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
										@endforeach
									</ul>
								 </li>
								
								
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<form action="{{URL::to('/tim-kiem')}}" method="POST">
							{{ csrf_field() }}
						<div class="search_box pull-right">
							
							<input type="text" name="keyword_submit" placeholder="Tìm kiếm sản phẩm"/>
							<input type="submit" style="margin-top: 0px; color:white; border-top-left-radius: 0.6rem;
							border-top-right-radius: 0.6rem;
							border-bottom-right-radius: 0.6rem;
							border-bottom-left-radius: 0.6rem;text-align:center;height: calc(1.5em + 1rem + 2px);
							padding: 0.5rem 1rem;
							font-size: 14px;
							line-height: 1.5;
							width: 100px" 
							name="search_items" class="btn btn-primary btn-sm" value="Tìm kiếm">
						</div>
					</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								
								<div class="col-sm-12">
									<img  src="{{asset('public/frontend/images/bia.jpg')}}" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							<div class="item">
								{{-- <div class="col-sm-12">
									<h1><span>Pink</span>Blue</h1> 
									<h2>Thiết kế độc đáo, đa dạng mẫu</h2>
									
									<button type="button" class="btn btn-default get">Mua ngay</button>
								</div> --}}
								<div class="col-sm-12">
									<img src="{{asset('public/frontend/images/bia1.jpg')}}" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	<div class="container">
		<div class="row">

		</div>
	</div>
	<section>
		<div class="container">
			<div class="row">
				
					
				 
				
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				
				 
                <section id="cart_items">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                            <li class="active">Thanh toán giỏ hàng</li>
                        </ol>
                
                        <div class="row">
                            <div class="col-md-7">
                                <!-- Phần 1: Địa chỉ thanh toán, phương thức thanh toán, Phương thức giao hàng, Xem lại giỏ hàng -->
                                <div class="shopper-informations">
                                    <!-- Địa chỉ giao hàng -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h3><strong>Địa chỉ giao hàng</strong></h3>
                                            @php
                                                use App\Models\Customer;
                                                if (Session::has('customer_id')) {
                                                    $customer = Customer::find(Session::get('customer_id'));
                                                }
                                            @endphp
                        
                                            @if (!empty($customer))
                                               
                                                    <div  style="padding: 20px 30px; position: relative;border: 1px solid #bbb7b7; border-radius: 32px 0px; font-size: 16px;">
                                                        <div class="card">
                                                            <div class="card border rounded">
                                                                <h5 class="card-title"></h5>
                                                                <p class="card-text"><strong>Họ và tên:</strong> {{ $customer->customer_name }}</p>
                                                                <p class="card-text"><strong>Số điện thoại:</strong> {{ $customer->customer_phone }}</p>
                                                                <p class="card-text"><strong>Địa chỉ:</strong> {{ $customer->customer_address }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                        
                                            @endif
                                            
                                            
                                        </div>
                                    </div>
                
                                    <!-- Phương thức giao hàng -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h3><strong>Phương thức giao hàng</strong></h3>
                                            <div style="padding: 20px 30px; position: relative;border: 1px solid #bbb7b7; border-radius: 32px 0px; font-size: 16px;">
                                                <p class="card-text"><strong>Chuyển phát nhanh</p>
                                                <p>Thời gian nhận hàng dự kiến : Thứ Hai, 08/04/2024</p>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <!-- Hình thức thanh toán -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h3><strong>Hình thức thanh toán</strong></h3>
                                           
                                            <div style="padding: 20px 20px; position: relative;border: 1px solid #bbb7b7; border-radius: 32px 0px; font-size: 16px; height: 5cm;">
                                                <div class="payment-options" style="padding: 30px 12px;">
                                                    <span>
                                                        <label><input name="payment_option" value="2" type="radio">Thanh toán khi nhận hàng</label>
                                                    </span><br><br>
                                                    <span>
                                                        <label><input name="payment_option" value="1" type="radio">Thanh toán bằng thẻ ATM</label>
                                                        <p>Hỗ trợ thanh toán online hơn 38 ngân hàng phổ biến tại Việt Nam</p>
                                                    </span><br>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <!-- Xem lại giỏ hàng -->
                                    <div class="row">
                                        <div class="col-sm-12 " style="margin-top: 50px; margin-bottom:100px">
                                            <h3><strong>Xem lại giỏ hàng</strong></h3>
                                            <div class="form-one">
                                                <div class="table-responsive cart_infos">
                                                    <?php 
                                                     $content = Cart::content();
                                                     ?>
                                         
                                                     <table class="table table-condensed">
                                                         <thead>
                                                             <tr class="cart_menu">
                                                                 <td class="image">Hình ảnh</td>
                                                                 
                                                                 <td class="description">Tên sản phẩm</td>
                                                                 <td class="price">Giá tiền</td>
                                                                 <td class="quantity">Số lượng</td>
                                                                 <td class="total">Tổng tiền</td>
                                                                 <td></td>
                                                             </tr>
                                                            
                                                         </thead>
                                                         <tbody>
                                                             @foreach ($content as $v_content)
                                                             <tr>
                                                                 <td class="cart_product">
                                                                     <p><a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="50" alt="" /></a>
                                                                     </p>
                                                                 </td>
                                                                
                                                                 <td class="cart_description">
                                                                     <h4>{{$v_content->name}}</h4>
                                                                     @if($v_content->options->size == 'free' && $v_content->category_name == 'Bags')
                                                                         <p>{{$v_content->options->color}} / Freesize</p>
                                                                     @else
                                                                         <p>{{$v_content->options->color}} / {{$v_content->options->size}}</p>
                                                                     @endif
                                                                     <p></p>
                                                                 </td>
                                                                 
                                                                 
                                                                 <td class="cart_price">
                                                                     <p>{{number_format($v_content->price).' '.'vnđ'}}</p>
                                                                 </td>
                                                                 <td class="cart_quantity">
                                                                     <div class="cart_quantity_button">
                                                                         <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                                                             {{ csrf_field() }}
                                                                         <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}" >
                                                                        {{-- <input type="hidden" value="{{$v_content->rowId}}" class="form-control" name="rowId_cart" class="btn btn-default btn-sm">
                                                                        <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm"> --}}
                                                                     </form>
                                                                     </div>
                                                                 </td>
                                                                 <td class="cart_total">
                                                                     <p class="cart_total_price"></p>
                                         
                                                                     <?php 
                                                                         $subtotal=$v_content->price*$v_content->qty;
                                                                         echo  number_format($subtotal). ' '.'vnđ';
                                                                     ?>
                                                                 </td>
                                                             </tr>
                                                             @endforeach
                                                         </tbody>
                                                     </table>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-5">
                                @if(session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                    
                                @endif
                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                                <!-- Phần 2: Total area -->
                                <div class="total_area order-section" style="margin-top: 1.5cm;">
                                    
                                    <form action="{{URL::to('/order-place')}}" method="POST">
                                        {{ csrf_field() }}
                                    <div class="total_area">
                                        
                                        <ul>
                                            <li><h3><strong>Tóm tắt đơn hàng</strong></h3></li>
                                            {{-- Tổng tiền hàng --}}
                                            <li>Tổng tiền hàng <span>{{ Cart::subtotal(0,',','.').' '.'vnđ' }}</span></li>
                                            
                                            {{-- Tính toán số tiền giảm giá --}}
                                            @php
                                            $couponDiscountPercentage = 0; // Giảm giá theo phần trăm
                                            $couponDiscountAmount = 0; // Giảm giá theo số tiền
                                            $shippingFee = 25000; // Phí vận chuyển
                                        
                                            // Tính toán số tiền giảm giá từ mã giảm giá
                                            if (Session::has('coupon')) {
                                                foreach(Session::get('coupon') as $key => $cou) {
                                                    if ($cou['coupon_condition'] == 1) {
                                                        $couponDiscountPercentage += (floatval(str_replace(',', '', Cart::subtotal())) * $cou['coupon_number']) / 100;
                                                    } else {
                                                        $couponDiscountAmount += floatval(str_replace(',', '', $cou['coupon_number']));
                                                    }
                                                }
                                            }
                                            $totalToPay = (floatval(str_replace(',', '', Cart::subtotal())) - $couponDiscountPercentage - $couponDiscountAmount) + $shippingFee;
                                            @endphp
                                            
                                            {{-- Tạm tính --}}
                                            <li>Tạm tính <span>{{ number_format((floatval(str_replace(',', '', Cart::subtotal())) - $couponDiscountPercentage - $couponDiscountAmount), 0, ',', '.') }} vnđ</span></li>
                                        
                                            {{-- Hiển thị số tiền giảm giá --}}
                                            @if ($couponDiscountPercentage > 0)
                                                {{-- <li>Tiền giảm giá (theo phần trăm) <span>{{ number_format($couponDiscountPercentage, 0, ',', '.') }} vnđ</span></li> --}}
                                            @elseif ($couponDiscountAmount > 0)
                                                {{-- <li>Tiền giảm giá (theo số tiền) <span>{{ number_format($couponDiscountAmount, 0, ',', '.') }} vnđ</span></li> --}}
                                            @endif
                                            
                                            {{-- Phí vận chuyển --}}
                                            <li>Phí vận chuyển <span>{{ number_format($shippingFee, 0, ',', '.') }} vnđ</span></li>
                                            
                                            {{-- Tổng tiền thanh toán --}}
                                            <li>Tổng tiền thanh toán <span>{{ number_format($totalToPay, 0, ',', '.') }} vnđ</span></li>
                                            
                                            {{-- Button thanh toán --}}
                                            <hr style="border-top: 1px solid #ccc;">
                                            <input type="submit" value="Thanh toán" class="btn btn-default check_outs" onclick="copyPaymentOption()">
                                        </ul>
                                      
                                    </div>
                                    </form>
                                    {{-- <form action="{{URL::to('/check-coupon')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá">
                                        <input type="submit"  class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">
                                    </form>
                                      --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function copyPaymentOption() {
                            var paymentOption = document.querySelector('input[name="payment_option"]:checked');
                            if (paymentOption !== null) {
                                var paymentOptionValue = paymentOption.value;
                                var hiddenInput = document.createElement('input');
                                hiddenInput.type = 'hidden'; // Sửa thành hidden input để không hiển thị trên giao diện
                                hiddenInput.name = 'payment_option';
                                hiddenInput.value = paymentOptionValue;
                                document.querySelector('.total_area form').appendChild(hiddenInput);
                            }
                        }
                    </script>
                    
                    
                </section> <!--/#cart_items-->
                
				</div> 
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>CTy PinkBlue</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#"><strong>Cửa hàng PINKBLUE</strong></a></li>
								<li><a href="#"><strong>Địa chỉ:</strong> 45 Nguyễn Trãi, Quận 3, TPHCM</a></li>
								<li><a href="#"><strong>Số điện thoại:</strong>  0243 205 2222</a></li>
								<li><a href="#"><strong>Email:</strong>cskh@pinkblue.com.vn</a></li>
								<li><a href="#">Hotline: 0248 379 0834 </a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Giới thiệu</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Về PinkBlue</a></li>
								<li><a href="#">Tuyển dụng</a></li>
								<li><a href="#">Hệ thống cửa hàng</a></li>
								
							</ul>
						</div>
					</div>
					
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Liên hệ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hotline</a></li>
								<li><a href="#">Email</a></li>
								<li><a href="#">Messenger</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ khách hàng</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Chính sách điều khoản</a></li>
								<li><a href="#">Hướng dẫn mua hàng</a></li>
								<li><a href="#">Chính sách thanh toán</a></li>
								<li><a href="#">Chính sách đổi trả</a></li>
								<li><a href="#">Chính sách bảo hành</a></li>
								<li><a href="#">Chính sách giao nhận vận chuyển</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2 ">
						<div class="single-widget">
							<h2>Tải ứng dụng</h2>
							<p class="img-footer"><img src="{{asset('public/frontend/images/bancode.jpg')}}" width="90" height="90" alt="" /></p>
							<img src="{{asset('public/frontend/images/googleplay.jpg')}}" alt="" />
							<img src="{{asset('public/frontend/images/appstore.jpg')}}" alt="" />
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		 
	</footer><!--/Footer-->
	

  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/s/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="{{ asset('js/your-custom-script.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
			$('.add-to-cart').click(function(){
				
				var id= $(this).data('id_product');
				
				 var cart_product_id = $('.cart_product_id_' + id).val();
				 var cart_product_code = $('.cart_product_code_'+ id).val();
				var cart_product_name = $('.cart_product_name_'+ id).val();
				var cart_product_image = $('.cart_product_image_'+ id).val();
				var cart_product_price = $('.cart_product_price_'+ id).val();
				var cart_product_qty = $('.cart_product_qty_'+ id).val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: '{{url('/add-cart-ajax')}}' ,
					method: 'POST',
					data:{cart_product_id:cart_product_id,
						
						cart_product_name:cart_product_name,
						cart_product_image:cart_product_image,
						cart_product_price:cart_product_price,
						cart_product_qty:cart_product_qty,
						_token:_token},
						success:function(data){
							swal({
								title: "Đã thêm sản phẩm vào giỏ hàng",
								text: "Bạn có thể tiếp tục mua hàng hoặc tới giỏ hàng để tiến hành thanh toán",
								showCancelButton: true,
								cancelButtonText: "Xem tiếp",
								confirmButtonClass: "btn-success",
								confirmButtonText: "Đi đến giỏ hàng",
								closeOnConfirm: false
							},
							function(){
								window.location.href="{{url('/gio-hang')}}";
						
						});
						alert(data);
						}
					});
			
			});
		});
	
	</script>
	
	<script>
		$.validate({
		  validateOnBlur : false, // disable validation when input looses focus
		  errorMessagePosition : 'top' // Instead of 'inline' which is default
		  scrollToTopOnError : false // Set this property to true on longer forms
		});
	  </script>
	  
</body>
</html>










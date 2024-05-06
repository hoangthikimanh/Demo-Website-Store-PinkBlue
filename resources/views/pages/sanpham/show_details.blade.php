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
							<a href="index.html"><img src="{{('public/frontend/images/pl.jpg')}}" alt="" /></a>
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
								
								<li><a href="contact-us.html">About us</a></li>
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
				
					<div class="col-sm-3"> 
					
						</div>
					</div> 
				 
				<div class="col-sm-9 padding-right" style=" margin-bottom:2cm"> 
				
					@yield('content')
                
				</div> 
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				
                <ol class="breadcrumb">
                    <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                    {{-- Thêm một mục breadcrumb cho danh mục sản phẩm --}}
                    @foreach ($product_details as $key => $value)
                    {{-- <li><a href="{{URL::to('/danh-muc-san-pham/'.$value->category_name)}}"></a></li> --}}
                    @endforeach
                    {{-- Kết thúc thêm mục --}}
                    <li class="active">{{ $value->category_name }}</li>
                    <li class="active">{{ $value->product_name }}</li>
                </ol>
                
                @foreach ($product_details as $key => $value)
                
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-1">
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <div class="view-product">
                            <img src="{{ URL::to('/public/uploads/product/'.$value->product_image) }}" alt="" />
                           
                        </div>
                    </div>
                    {{-- <div class="col-lg-2 col-md-2 col-sm-2">
                    </div> --}}
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <div class="product-information"><!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>{{ $value->product_name }}</h2>
                
                            <p>SP: {{ $value->product_code }}</p>
                            
                
                            <form action="{{ URL::to('/save-cart') }}" method="POST">
                                {{ csrf_field() }}
                                <span>
                                    <span>{{ number_format($value->product_price).' '.'vnđ' }}</span>
                                    <div>
                                    <label for="qty">Số lượng:</label>
                                        <input name="qty" type="number" min="1" value="1" />
                                        <input name="productid_hidden" type="hidden" value="{{ $value->product_id }}" />
                                    </div>
                                    <br>
                                    <!-- Thêm các trường kích cỡ và màu sắc -->
                                    <div style="display: inline-block;">
                                        <label for="size" style="display: inline-block;">Kích cỡ:</label>
                                        <select name="size" id="size" style="display: inline-block; width: 100px;"> 
                                            <?php if ($value->category_name == 'Bags') { ?>
                                                <option value="free">Freesize</option>
                                              <?php } else { ?>
                                                <option value="L">S</option>
                                                <option value="M">M</option>
                                                <option value="S">L</option>
                                                <option value="S">XL</option>
                                              <?php } ?>
                                              
                                        </select>
                                    </div>
                                  <br><br>
                                    <div >
                                        <label>Màu sắc: </label>
                                        <input type="text" name="color" value="{{ $value->product_color }}" class="colorPro">
                                    </div>
                                </span>
                                <br>
                                
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" id="sizeGuideBtn" data-toggle="modal" data-target="#sizeGuideModal" 
                                
                          
                             
                            style="display: block;
                            background-color: rgba(99, 177, 188, .05);
                            border: 1px solid rgba(99, 177, 188, .1);
                            border-radius: 4px;
                            font-weight: bold;
                            font-size: 17px;
                            line-height: 16px;
                            color: #63b1bc;
                            padding: 10px 300px 10px 100px;
                            background-repeat: no-repeat;
                            background-position: left 11px center;
                            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyLjA4MzUgNC41ODM4OUwxMy4zMzM1IDUuODMzODlNOS41ODM0NyA3LjA4Mzg5TDEwLjgzMzUgOC4zMzM4OU03LjA4MzQ3IDkuNTgzODlMOC4zMzM0NyAxMC44MzM5TTQuNTgzNDcgMTIuMDgzOUw1LjgzMzQ3IDEzLjMzMzlNMi4xMzgxNyAxNC42Mzg3TDUuMzYyMDMgMTcuODYyNUM1LjUyNzA0IDE4LjAyNzUgNS42MDk1NCAxOC4xMSA1LjcwNDY4IDE4LjE0MDlDNS43ODgzNiAxOC4xNjgxIDUuODc4NTEgMTguMTY4MSA1Ljk2MjE5IDE4LjE0MDlDNi4wNTczMyAxOC4xMSA2LjEzOTgzIDE4LjAyNzUgNi4zMDQ4NCAxNy44NjI1TDE3Ljg2MiA2LjMwNTMzQzE4LjAyNyA2LjE0MDMyIDE4LjEwOTUgNi4wNTc4MiAxOC4xNDA1IDUuOTYyNjhDMTguMTY3NiA1Ljg3ODk5IDE4LjE2NzYgNS43ODg4NSAxOC4xNDA1IDUuNzA1MTZDMTguMTA5NSA1LjYxMDAzIDE4LjAyNyA1LjUyNzUyIDE3Ljg2MiA1LjM2MjUyTDE0LjYzODIgMi4xMzg2NkMxNC40NzMyIDEuOTczNjUgMTQuMzkwNyAxLjg5MTE1IDE0LjI5NTUgMS44NjAyNEMxNC4yMTE4IDEuODMzMDUgMTQuMTIxNyAxLjgzMzA1IDE0LjAzOCAxLjg2MDI0QzEzLjk0MjkgMS44OTExNSAxMy44NjA0IDEuOTczNjUgMTMuNjk1NCAyLjEzODY2TDIuMTM4MTcgMTMuNjk1OUMxLjk3MzE2IDEzLjg2MDkgMS44OTA2NiAxMy45NDM0IDEuODU5NzUgMTQuMDM4NUMxLjgzMjU2IDE0LjEyMjIgMS44MzI1NiAxNC4yMTIzIDEuODU5NzUgMTQuMjk2QzEuODkwNjYgMTQuMzkxMSAxLjk3MzE2IDE0LjQ3MzcgMi4xMzgxNyAxNC42Mzg3WiIgc3Ryb2tlPSIjNjNCMUJDIiBzdHJva2Utd2lkdGg9IjEuMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+Cjwvc3ZnPgo=);
                            margin-bottom: 19px;
                            position: relative;"
                            >
                            Gợi ý tìm size
                            <script>
                    // Lắng nghe sự kiện khi trang được tải hoàn thành
                    document.addEventListener("DOMContentLoaded", function() {
                        // Lấy ra danh mục sản phẩm được chọn
                        var category = "{{ $value->category_name }}";
                
                        // Nếu danh mục là "Bags", ẩn nút gợi ý tìm size và modal
                        if (category === "Bags") {
                            document.getElementById("sizeGuideBtn").style.display = "none";
                        }
                    });
                </script>
                
                         </button>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="sizeGuideModal" tabindex="-1" role="dialog" aria-labelledby="sizeGuideModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style=" max-width: 700px;">
                      <div class="modal-content">
                        <div class="modal-header">
                
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="padding: 10px 20px;">
                            <h2>Hướng dẫn chọn size</h2>
                
                          <table style="width: 100%;
                          border-collapse: collapse;background-color: #f8f8f8">
                            <table class="table" style=" padding: 8px;
                            border: 1px solid #ddd;">
                                <tr style="font-weight: bold;background-color: #333f48; color: #fff">
                                    <th>SIZE</th>
                                  <th>Chiều cao (cm)</th>
                                  <th>Cân nặng (kg)</th>
                                  <th>Vòng 2 (cm)</th>
                                  <th>Vòng 3 (cm)</th>
                                </tr>
                                <tr>
                                  <th>S</th>
                                  <td>150 - 155</td>
                                  <td>41 - 46</td>
                                  <td>79 - 82</td>
                                  <td>88 - 90 </td>
                                </tr>
                                <tr style="background-color:#edf1f5">
                                    
                                  <th>M</th>
                                  <td>155 - 163</td>
                                  <td>47 - 52</td>
                                  <td>82 - 87</td>
                                  <td>90 - 94</td>
                                </tr>
                                <tr>
                                  <th>L</th>
                                  <td>160 - 165</td>
                                  <td>53 - 58</td>
                                  <td>88 - 94</td>
                                  <td>94 - 98</td>
                                </tr>
                                <tr style="background-color:#edf1f5">
                                  <th>XL</th>
                                  <td>162 - 166</td>
                                  <td>59 - 64</td>
                                  <td>94 - 99</td>
                                  <td>98 - 102</td>
                                </tr>
                              </table>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br><br>
                            <button type="submit" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                Thêm vào giỏ hàng
                            </button>
                            </form>
                        </div><!--/product-information-->
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="view-product">
                                {{-- <img src="{{ URL::to('/public/uploads/product/'.$value->product_image) }}" alt="" /> --}}
                               
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                
                                <div class="tab-pane fade active in" id="details" >
                                    {{-- <p style="padding-left: 20px;">   {!!$value->product_desc!!}   </p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#details-tab" data-toggle="tab">Chi tiết sản phẩm</a></li>
                                <li><a href="#reviews-tab" data-toggle="tab">Mô tả sản phẩm</a></li>
                                
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="details-tab">
                                <p style="padding-left: 25px;"><strong>Danh mục:</strong> {!! $value->brand_name !!}</p>
                                <p style="padding-left: 25px;"><strong>Thương hiệu:</strong> {!! $value->category_name !!}</p>
                               
                                <p style="padding-left: 25px;"><strong>Tình trạng:</strong> Còn hàng</p>
                                <p style="padding-left: 25px;"><strong>Điều kiện:</strong> Mới</p>
                               
                            
                            </div>
                            <div class="tab-pane fade" id="reviews-tab">
                                <p style="padding-left: 25px;">{!! $value->product_desc !!}</p>
                            </div>
                        </div>
                    </div><!--/category-tab-->
                    
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12" style="margin-top: 15px; margin-bottom: 15px;">
                            <hr style="border-top: 1px solid #ccc;">
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px">
                      
                        <div class="col-sm-4" style="display: flex; align-items: center; ">
                            <div class="icon"style="margin-right: 4px; width: 44px; min-width: 44px;">
                            <img src={{asset('public/frontend/images/service1.jpg')}} alt="Thumbnail 1" class="img-responsive">
                            </div>
                            <div class="content"style="-ms-flex-positive: 1; flex-grow: 1; }">
                                <h3>Thanh toán khi nhận hàng</h3>
                                <span>Giao hàng toàn quốc</span>
                            </div>
                        </div>
                        <div class="col-sm-4" style="display: flex; align-items: center; ">
                            <div class="icon" style="margin-right: 4px;
                            width: 44px;
                            min-width: 44px;">
                            <img src={{asset('public/frontend/images/service2.jpg')}} alt="Thumbnail 2" class="img-responsive">
                            </div>
                            <div class="content" style="-ms-flex-positive: 1; flex-grow: 1; }">
                                <h3>Miễn phí giao hàng</h3>
                                <span>Với đơn hàng trên 499.000đ</span>
                            </div>
                        </div>
                        <div class="col-sm-4" style="display: flex; align-items: center; ">
                            <div class="icon"style="margin-right: 4px;
                            width: 44px;
                            min-width: 44px;">
                            <img src={{asset('public/frontend/images/service3.jpg')}} alt="Thumbnail 3" class="img-responsive">
                            </div>
                            <div class="content"style="-ms-flex-positive: 1; flex-grow: 1; }">
                                <h3>Đổi hàng miễn phí</h3>
                                <span>Kể từ 7 ngày mua hàng</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="margin-top: 15px; margin-bottom: 15px;">
                            <hr style="border-top: 1px solid #ccc;">
                        </div>
                    </div>
                
                </div>
                
                @endforeach
                <div class="recommended_items" style="margin-bottom:5cm"><!--recommended_items-->
                  <h2 class="title text-center">Gợi ý sản phẩm</h2>
                
                  <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                          @foreach ($related_product->chunk(4) as $related_items)
                          <div class="item @if ($loop->first) active @endif">
                              <div class="row">
                                  @foreach ($related_items as $related_item)
                                  <div class="col-sm-3">
                                      <div class="product-image-wrapper">
                                          <div class="single-products">
                                              <div class="productinfo text-center">
                                                  <img src="{{URL::to('public/uploads/product/'.$related_item->product_image)}}" alt="" />
                                                  <h2>{{number_format($related_item->product_price).' vnđ'}}</h2>
                                                  <p>{{$related_item->product_name}}</p>
                                                  <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏhàng</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  @endforeach
                              </div>
                          </div>
                          @endforeach
                      </div>
                
                      @if ($related_product->count() > 3)
                      <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                          <i class="fa fa-angle-left"></i>
                      </a>
                      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                          <i class="fa fa-angle-right"></i>
                      </a>
                      @endif
                  </div>
                
                  @if ($related_product->count() > 3)
                  <div class="pagination text-center">
                      <!-- Thêm mã HTML cho phân trang ở đây -->
                  </div>
                  @endif
                </div><!--/recommended_items-->
                
			
				
					
                
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



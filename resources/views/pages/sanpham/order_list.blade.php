@extends('layouts')

@section('content')


			<section id="order-details" style="margin-bottom: 7cm">
				<div class="container">
				   
					<div class="row">
						
						<div class="col-md-12">
							<h2 style="19px;"><strong>Quản lý đơn hàng</strong></h2>
							<br>
							<div class="order">
							   
								<table class="table table-condensed">
									<thead>
										<tr>
											<th>Mã đơn hàng </th>
											<th>Ngày đặt</th>
											<th>Trạng thái</th>
											<th>Sản phẩm</th>
											<th>Tổng tiền</th>
											
										</tr>
									</thead>
									<tbody>
										@foreach($order_details as $order_detail)
										<tr>
											<td>PL00{{ $order_detail['order_id'] }}</td>
											<td>{{ $order_detail['order_date'] }}</td>
											
											<td>Đặt hàng thành công</td>
											<td>
												@foreach($order_detail['products'] as $product)
													{{ $product->product_sales_quantity }}  <i class="bi bi-x">  {{ $product->product_name }} <br>
												@endforeach
											</td>
											<td> {{number_format($order_detail['total']).' '.'vnđ'}} </td>
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


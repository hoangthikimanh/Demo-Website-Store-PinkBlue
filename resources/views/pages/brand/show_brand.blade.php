@extends('layout')
@section('content')

<div class="features_items"><!--features_items-->
    @foreach($brand_name as $key => $name)
    <h2 class="title text-center">{{$name->brand_name}}</h2>
    @endforeach

     @foreach($brand_by_id as $key =>$product)
    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                        <h2>{{number_format($product->product_price).' VND'}}</h2>
                        <p>{{$product->product_name}}</p>
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                    </div>     
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                    </ul>
                </div>
            </div>
        </div>
     </a>
        @endforeach
</div>
<div class="text-center pagination-container" style="margin-bottom:3cm" >
    @if ($brand_by_id->onFirstPage())
        <span class="pagination-link disabled" style="
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px 10px;
            margin-right: 5px;
            color: #ccc;
            cursor: not-allowed;
        ">Previous</span>
    @else
        <a href="{{ $brand_by_id->previousPageUrl() }}" class="pagination-link" style="
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 5px 10px;
            margin-right: 5px;
            color: #007bff;
        ">Previous</a>
    @endif

    @for ($i = 1; $i <= $brand_by_id->lastPage(); $i++)
        @if ($i == $brand_by_id->currentPage())
            <span class="pagination-link current-page" style="
                border: 1px solid #007bff;
                border-radius: 5px;
                padding: 5px 10px;
                margin-right: 5px;
                background-color: #007bff;
                color: #fff;
            ">{{ $i }}</span>
        @else
            <a href="{{ $brand_by_id->url($i) }}" class="pagination-link" style="
                border: 1px solid #007bff;
                border-radius: 5px;
                padding: 5px 10px;
                margin-right: 5px;
                color: #007bff;
            ">{{ $i }}</a>
        @endif
    @endfor
    @if ($brand_by_id->hasMorePages())
        <a href="{{ $brand_by_id->nextPageUrl() }}" class="pagination-link" style="
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 5px 10px;
            margin-left: 5px;
            color: #007bff;
        ">Next</a>
    @else
        <span class="pagination-link disabled" style="
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px 10px;
            margin-left: 5px;
            color: #ccc;
            pointer-events: none;
            cursor: default;
        ">Next</span>
    @endif
</div>
@endsection


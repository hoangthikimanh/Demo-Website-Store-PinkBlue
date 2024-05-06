@extends('admin_layout')

@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê sản phẩm 
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          {{-- <form class="input-sm form-control w-sm inline v-middle" method="GET" action="{{URL::to('all_product') }}">
            <select class="input-sm form-control w-sm inline v-middle" name="brand">
              <option value="">Select brand</option>
              @foreach ($brands as $brand)
                <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
              @endforeach
            </select>
            <button type="submit" class="btn btn-sm btn-default">Apply</button>
          </form> --}}
        </div>
        <div class="col-sm-3">
        </div>
        <div class="col-sm-3">
          <form action="{{URL::to('search-admin-product')}}" method="POST">
            {{ csrf_field() }}
          <div class="input-group">
            <input type="text" name="keyword_submit" placeholder="Search"/>
              <span class="input-group-btn">
                <input type="submit" name="search_items" class="btn btn-primary btn-sm" value="Tìm kiếm">
              </span>
          </div>
        </form>
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
              {{-- <th style="width:20px;">
               
              </th> --}}
              <th>Hình ảnh</th>
              <th>Mã SP</th>
              <th>Tên sản phẩm</th>
              <th>Giá sản phẩm</th>
              
              <th>Danh mục</th>
              <th>Thương hiệu</th>
              <th>Kích cỡ</th>
              <th>Màu sắc</th>
              {{-- <th>SL</th> --}}

              <th>Hiển thị</th>
              <th></th>
              
             
            </tr>
          </thead>
          <tbody>
            @foreach ($all_product as $key => $pro)
            <tr>
                {{-- <td></td> --}}
                <td><img src="public/uploads/product/{{ $pro->product_image }}"height = "100" width="100"></td>
                <td>{{ $pro->product_code }}</td>
                <td>{{ $pro->product_name }}</td>
                <td>{{ $pro->product_price }}</td>
                
                <td>{{ $pro->category_name}}</td>
                <td>{{ $pro->brand_name }}</td>
                <td>{{ $pro->product_size }}</td>
                <td>{{ $pro->product_color }}</td>
                {{-- <td>{{ $pro->product_qty }}</td> --}}


                <td><span class="text-ellipsis">
                    <?php 
                        if($pro->product_status == 0){
                        
                        ?>
                        <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class ="fa-thumb-styling fa fa-thumbs-up"></span></a>
                        <?php 
                        }else {
                        ?>
                            <a href= "{{URL::to('/active-product/'.$pro->product_id)}}"><span class = " fa-thumb-styling fa fa-thumbs-down"></span></a>
                        <?php
                        }
                        ?>
                </span></td>
                <td>
                    <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active styling edit " ui-toggle-class="">
                      <i class="fa fa-pencil-square-o text-success text-active"></i>
                    </a>
                    <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này không?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active styling edit" ui-toggle-class="">
                      <i class="fa fa-times text-danger text"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        
          </tbody>
        </table>
        <br>
        {!! $all_product->links() !!}
        <br>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          
          {{-- <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div> --}}
        </div>
      </footer>
    </div>
  </div>

@endsection
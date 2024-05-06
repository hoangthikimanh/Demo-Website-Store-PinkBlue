@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Sản Phẩm
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                   echo '<span class = "text-aler">'.$message.'</span>';
                   Session::put('message', null);
                }
            ?>
                <div class="panel-body">
                   
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã sản phẩm</label>
                                <input type="text" name="product_code" class="form-control" 
                                id="exampleInputEmail1" 
                                data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự"
                                >
                            </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản Phẩm </label>
                            <input type="text" name="product_name" class="form-control" 
                            id="exampleInputEmail1" placeholder="Tên sản phẩm" 
                            data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự"
                            >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm </label>
                            <input type="file" name="product_image" class="form-control" 
                            id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize:none" rows = "8" class="form-control" name="product_desc" id="editor1" placeholder="Mô tả sản phẩm">
                                
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" name="product_price" class="form-control" 
                            id="exampleInputEmail1" data-validation="number"  data-validation-error-msg="Làm ơn điền số tiền">
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input type="text" name="product_qty" class="form-control" 
                            id="exampleInputEmail1" data-validation="number"  data-validation-error-msg="Làm ơn điền số lượng sản phẩm">
                        </div> --}}
                        <div class="form-group">
                           
                            <div class="form-group col-12">
                                <label for="exampleInputEmail1">Size</label>
                                <input type="text" name="product_size" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group col6">
                                <label for="exampleInputEmail1">Màu sắc</label>
                                <input type="text" name="product_color" class="form-control" id="exampleInputEmail1">
                                 
                            </div>
                        </div>
                        
                       
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục</label>
                            <select class="form-control input-sm m-bot15" name="product_cate">
                              @foreach ($cate_product as  $key => $cate)
                              <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                              @endforeach
                                
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu</label>
                            <select class="form-control input-sm m-bot15" name="product_brand">
                                @foreach ($brand_product as  $key => $brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endforeach
                               
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị </label>
                            <select class="form-control input-sm m-bot15" name="product_status">
                                <option value="1">Ẩn</option>
                                <option value="0">Hiển Thị</option>
                               
                            </select>
                        </div>
                       
                        <button type="submit" name="add_product" class="btn btn-info">Thêm Sản Phẩm</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection
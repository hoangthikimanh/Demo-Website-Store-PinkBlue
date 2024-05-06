@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Danh Mục Sản Phẩm
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
                        <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục </label>
                            <input type="text" name="category_product_name" class="form-control" 
                            id="exampleInputEmail1" placeholder="Tên Danh Mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize:none" rows = "8" class="form-control" name="category_product_desc" id="editor3" placeholder="Mô tả danh mục ">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị </label>
                            <select class="form-control input-sm m-bot15" name="category_product_status">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển Thị</option>
                               
                            </select>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Check me out
                            </label>
                        </div>
                        <button type="submit" name="add_category_product" class="btn btn-info">Thêm Danh Mục</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection
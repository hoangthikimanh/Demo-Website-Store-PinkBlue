@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
       Danh sách mã giảm giá 
      </div>
      <div class="row w3-res-tb">
        
        <div class="col-sm-4">
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
              
              <th>Mã giảm giá</th>
              <th>Tên mã giảm giá</th>
              <th>Số lượng giảm giá</th>
              <th>Điều kiện giảm giá</th>
              <th>Số giảm</th>
           
            </tr>
          </thead>
          <tbody>
            @foreach ($coupon as $key => $cou)
            <tr>
                
                <td>{{ $cou->coupon_code }}</td>
                <td>{{ $cou->coupon_name }}</td>
                <td>{{ $cou->coupon_times }}</td>
               
                <td><span class="text-ellipsis">
                    @if($cou->coupon_condition == 1)
                        Giảm theo %
                    @else
                        Giảm theo tiền
                    @endif
                </span></td>
                
                <td><span class="text-ellipsis">
                    @if($cou->coupon_condition == 1)
                        {{$cou->coupon_number}}
                    @else
                    {{$cou->coupon_number}} 
                    @endif
                </span></td>
                <td>
                    <a onclick="return confirm('Bạn có chắc là muốn xóa mã giảm giá này không?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active styling edit" ui-toggle-class="">
                      <i class="fa fa-times text-danger text"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
         
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
      </footer>
    </div>
  </div>

@endsection

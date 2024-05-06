@extends('layouts')

@section('content' )
    <div class="container" style="margin-bottom:5cm;">
        <h2>Tài khoản của tôi</h2>
      
            @if(session()->has('message'))
            <div class="alert alert-infos" style="width: 78%;
            color: #31708f;
            background-color: #d9edf7;
            border-color: #bce8f1;
            font-size: 17px;
                }">
                {{ session()->get('message') }} 
            </div>
            @endif
        
            <div class="info">
                <div class="row mb-3 form-group">
                    <div class="col-sm-3">
                        <label for="inputText" class="col-form-label" style="font-family: 'ui-monospace'; font-size:20px;">Họ và tên</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" style="font-family: 'ui-monospace'; font-size:20px;" class="form-control" id="inputText" value="{{ old('name', $customer->customer_name) }}" readonly>
                    </div>
                </div>
                <div class="row mb-3 form-group">
                    <div class="col-sm-3">
                        <label for="inputEmail" style="font-family: 'ui-monospace'; font-size:20px;" class="col-form-label">Số điện thoại</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" value="{{ old('phone', $customer->customer_phone) }}" readonly>
                    </div>
                </div>
                <div class="row mb-3 form-group">
                    <div class="col-sm-3">
                        <label for="inputPassword" class="col-form-label" style="font-family: 'ui-monospace'; font-size:20px;" >Email</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputPassword" value="{{ old('email', $customer->customer_email) }}" style="font-family: 'ui-monospace'; font-size:19px;">
                    </div>
                </div>
                <div class="row mb-3 form-group">
                    <div class="col-sm-3">
                        <label for="inputAddress" class="col-form-label" style="font-family: 'ui-monospace'; font-size:20px;">Địa chỉ</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputAddress" value="{{ old('address', $customer->customer_address) }}" readonly>
                    </div>
                </div>
                <!-- Include other fields -->
                
                
            </div>
    </div>
@endsection
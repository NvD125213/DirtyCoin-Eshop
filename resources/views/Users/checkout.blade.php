@extends('Layouts.master')
@section('title', 'Dirty Coin - Checkout')

@section('content')
    @include('Users.component.wrap-title', ['title' => 'Hợp đồng', 'home' => 'Trang chủ', 'content' => 'Hợp đồng'])
      <div class="container-fluid pt-5">
        <form action="{{route('createOrder')}}" method="post">
            @csrf
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <h4 class="font-weight-semi-bold mb-4">Thông tin địa chỉ</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Họ và tên</label>
                                <input class="form-control" name="name" type="text" placeholder="Nhập họ của bạn!">
                            </div>
                           
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" name="email" type="text" placeholder="example@email.com">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="address" type="text" placeholder="Ghi rõ số nhà, đường(phố)">
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <label>Thành phố</label>
                                <select class="custom-select" name="address_city">
                                    <option selected>Hà Nội</option>
                                    <option>TP Hồ Chí Minh</option>
                                    <option>Đà Nẵng</option>
                                    <option>Bình Dương</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="phone" type="text" placeholder="+123 456 789">
                            </div>
                         
                            
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" name="code_zip" type="text" placeholder="123">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="newaccount">
                                    <label class="custom-control-label" for="newaccount">Tạo tài khoản</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="shipto">
                                    <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Vận chuyển đến địa chỉ khác</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Tổng hóa đơn</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">Danh sách sản phẩm</h5>
                            @foreach ($cart as $item)
                                <div class="d-flex justify-content-between">
                                    <p>{{$item['name']}} - {{$item['quantity']}} chiếc</p>
                                    <p>{{$item['price'] * $item['quantity']}}</p>
                                </div>
        
                            @endforeach
                          
                            <hr class="mt-0">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Tổng giá</h6>
                                <h6 class="font-weight-medium">{{$subTotal}}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Phí ship</h6>
                                <h6 class="font-weight-medium">$10</h6>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Tổng</h5>
                                <h5 class="font-weight-bold">${{$subTotal}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Thanh toán</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="banktransfer" checked>
                                    <label class="custom-control-label" for="banktransfer">Qua VNPay</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="directcheck" >
                                    <label class="custom-control-label" for="directcheck">Sau khi nhận hàng</label>
                                </div>
                            </div>
                        
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      
    </div>

@endsection

@extends('Layouts.master')
@section('title', 'Dirty Coin - Success')

@section('content')
<div class="container" style="margin-top: 50px">
       <div class="row">
            <div class="col-lg-12">
                <h4 class="alert-heading">Đặt hàng thành công!</h4>
                <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi.</p>
                <hr>
                <p class="mb-0">Vui lòng kiểm tra email của bạn để biết thông tin chi tiết về đơn hàng.</p>
                <a href="{{route('Users.home')}}" style="margin-top: 20px" class="btn btn-primary">Trở lại mua sắm</a>
            </div>
       </div>
</div>
@endsection


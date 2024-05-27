@extends('layouts.master')

@section('title', 'Dirty Coin')
@section('js')
@endsection

@section('slider')
  @include('Users.component.slider')
@endsection
@section('features')
  @include('Users.component.features')
@endsection

@section('category')
    @include('Users.component.categories')
@endsection

@section('content')

<!-- Products Start -->
<div class="container-fluid pt-5">
  <div class="text-center mb-4">
      <h2 class="section-title px-5"><span class="px-2">Sản phẩm mới ra mắt</span></h2>
  </div>
  <div class="row px-xl-5 pb-3">
    @foreach ($show as $showItem)
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
      <div class="card product-item border-0 mb-4" style="height: 33rem">
          <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="{{$showItem->image_path}}" alt="">
          </div>
          <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3">{{$showItem->name}}</h6>
              <div class="d-flex justify-content-center">
                  <h6>{{$showItem->price}} VND</h6><h6 class="text-muted ml-2"></h6>
              </div>
          </div>
          <div class="card-footer d-flex justify-content-between bg-light border">
              <a href="{{route('getDetail', ['id' => $showItem->id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
              <a onclick="AddCart({{$showItem->id}})" href="javascript:" data-id="{{$showItem->id}}" class="btn btn-sm text-dark p-0 addToCart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
          </div>
      </div>
    </div>
    @endforeach
   
  </div>
</div>

<div class="container-fluid pt-5">
  <div class="text-center mb-4">
      <h2 class="section-title px-5"><span class="px-2">Được xem nhiều nhất</span></h2>
  </div>
  <div class="row px-xl-5 pb-3">
    @foreach ($view as $view)
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
      <div class="card product-item border-0 mb-4" style="height: 33rem">
          <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="{{$view->image_path}}" alt="">
          </div>
          <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3">{{$view->name}}</h6>
              <div class="d-flex justify-content-center">
                  <h6>${{$view->price}}</h6><h6 class="text-muted ml-2">VND</h6>
              </div>
          </div>
          <div class="card-footer d-flex justify-content-between bg-light border">
              <a href="{{route('getDetail', ['id' => $showItem->id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
              <a onclick="AddCart({{$view->id}})" href="javascript:" data-id="{{$view->id}}" class="btn btn-sm text-dark p-0 addToCart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
          </div>
      </div>
    </div>
    @endforeach
   
  </div>
</div>

@stop

 
@extends('Layouts.admin')
 
@section('title')
<title>Quản lý sản phẩm</title>

@endsection
@section('css')
 <link rel="stylesheet" href="/admin/product/index.css">
    
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('Admins.Components.content-header', ['name' => 'sản phẩm', 'key' => 'Quản lý'])


  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('products.create')}}" class="btn btn-success float-right m-2">Thêm</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
             
              @foreach ($products as $productItem)
              <tr>
                <th scope="row">{{$productItem->id}}</th>
                <td>{{$productItem->name}}</td>
                <td>{{$productItem->price}}</td>
                <td>
                  <img class="product_image" src="{{$productItem->image_path}}" alt="">
                </td>
                <td>{{optional($productItem->categories)->name}}</td>
                <td>
                  <a href="{{route('products.edit', ['id'=>$productItem->id])}}" class="btn btn-default">Edit</a>
                  <a href="" 
                  data-url = "{{route('products.delete', ['id' => $productItem->id])}}" 
                  class="btn btn-danger action_delete">Delete</a>
                </td>
               
              </tr>
              @endforeach
            
             
            </tbody>
          </table>
        </div>
       
        <nav aria-label="Page navigation example" style="margin: 0 auto">
          <ul class="pagination">
            <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
              <a class="page-link" href="{{ $products->previousPageUrl() }}" tabindex="-1"><<</a>
            </li>
            @for ($i = 1; $i <= $products->lastPage(); $i++)
              <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
              </li>
            @endfor
            <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
              <a class="page-link" href="{{ $products->nextPageUrl() }}"> >> </a>
            </li>
          </ul>
        </nav>
        
      </div>
    </div>
  </div>
  @if(Session::has('message')) 
  <script>
    swal('Hoàn thành!','Bạn đã thêm thành công!','success')
  </script>
  @endif
</div>
@endsection

@section('js') 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{asset('admin/product/list.js')}}"></script>
@endsection


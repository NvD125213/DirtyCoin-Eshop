 
@extends('Layouts.admin')
 
@section('title')
<title>Quản lý đơn hàng</title>

@endsection
@section('css')
 <link rel="stylesheet" href="/admin/product/index.css">
    
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('Admins.Components.content-header', ['name' => 'đơn hàng', 'key' => 'Quản lý'])


  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Email</th>
                <th scope="col">SĐT</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
             
              @foreach ($order as $order)
              <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>
                  {{$order->phone}}
                </td>
                <td>
                  <a href="" class="btn btn-default">Chi tiết</a>
                  <a href="" 
                  data-url = "" 
                  class="btn btn-danger action_delete">Hủy đơn</a>
                </td>
               
              </tr>
              @endforeach
            
             
            </tbody>
          </table>
        </div>
{{--        
        <nav aria-label="Page navigation example" style="margin: 0 auto">
          <ul class="pagination">
            <li class="page-item {{ $order->onFirstPage() ? 'disabled' : '' }}">
              <a class="page-link" href="{{ $order->previousPageUrl() }}" tabindex="-1"><<</a>
            </li>
            @for ($i = 1; $i <= $order->lastPage(); $i++)
              <li class="page-item {{ $order->currentPage() == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ $order->url($i) }}">{{ $i }}</a>
              </li>
            @endfor
            <li class="page-item {{ $order->hasMorePages() ? '' : 'disabled' }}">
              <a class="page-link" href="{{ $order->nextPageUrl() }}"> >> </a>
            </li>
          </ul>
        </nav> --}}
        
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


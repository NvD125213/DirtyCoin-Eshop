@extends('Layouts.admin')

@section('title')
<title>Quản lý slider</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin/product/index.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
 
  @include('Admins.Components.content-header', ['name' => 'slider', 'key' => 'Quản lý'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('slider.create')}}" class="btn btn-success float-right m-2">Thêm</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên slider</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
              @php
              $count = 1;
              @endphp
              @foreach ($slider as $sliderItem)
              <tr>
                <th scope="row">{{$count}}</th>
                <td>{{$sliderItem->name}}</td>
                <td>
                    <img class="product_image" src="{{$sliderItem->link}}" alt="">
                </td>
                <td>
                  <div class="col-md-6">
                    <a href="{{route('slider.edit', ['id' => $sliderItem->id])}}" class="btn btn-default">Edit</a>
                    <a href=""  data-url="{{route('slider.delete', ['id' => $sliderItem->id])}}" class="btn btn-danger action_delete">Delete</a>

                  </div>
                </td>
              </tr>
              @php
              $count++;
              @endphp
              @endforeach
            </tbody>
          </table>
        </div>
        <nav aria-label="Page navigation example" style="margin: 0 auto">
          <ul class="pagination">
            <li class="page-item {{ $slider->onFirstPage() ? 'disabled' : '' }}">
              <a class="page-link" href="{{ $slider->previousPageUrl() }}" tabindex="-1"><<</a>
            </li>
            @for ($i = 1; $i <= $slider->lastPage(); $i++)
              <li class="page-item {{ $slider->currentPage() == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ $slider->url($i) }}">{{ $i }}</a>
              </li>
            @endfor
            <li class="page-item {{ $slider->hasMorePages() ? '' : 'disabled' }}">
              <a class="page-link" href="{{ $slider->nextPageUrl() }}"> >> </a>
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
  @if(Session::has('message_edit')) 
  <script>
    swal('Hoàn thành!','Bạn đã sửa thành công!','success')
  </script>
  @endif
</div>
@endsection

@section('js') 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{asset('admin/product/list.js')}}"></script>
@endsection



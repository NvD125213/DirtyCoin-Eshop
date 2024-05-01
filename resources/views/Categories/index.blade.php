 
@extends('Layouts.admin')
 
@section('title')
<title>Quản lý danh mục</title>

@endsection


@section('content')
<div class="content-wrapper">
 
  @include('Admins.Components.content-header', ['name' => 'danh mục', 'key' => 'Quản lý'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('categories.create')}}" class="btn btn-success float-right m-2">Thêm</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($category as $cat)
              <tr>
                <th scope="row">{{ $cat->id }}</th>
                <td>{{ $cat->name }}</td>
                <td>
                  <div class="col-md-6">
                    <a href="{{route('categories.edit',['id'=> $cat->id])}}" class="btn btn-default">Edit</a>
                    <a onclick="confirmDelete('{{ $cat->id }}')" href="{{route('categories.delete',['id'=> $cat->id])}}" class="btn btn-danger">Delete</a>

                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
       
        <nav aria-label="Page navigation example" style="margin: 0 auto">
          <ul class="pagination">
            <li class="page-item {{ $category->onFirstPage() ? 'disabled' : '' }}">
              <a class="page-link" href="{{ $category->previousPageUrl() }}" tabindex="-1"><<</a>
            </li>
            @for ($i = 1; $i <= $category->lastPage(); $i++)
              <li class="page-item {{ $category->currentPage() == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ $category->url($i) }}">{{ $i }}</a>
              </li>
            @endfor
            <li class="page-item {{ $category->hasMorePages() ? '' : 'disabled' }}">
              <a class="page-link" href="{{ $category->nextPageUrl() }}"> >> </a>
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


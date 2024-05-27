 
@extends('Layouts.admin')
 
@section('title')
<title>Quản lý settings</title>

@endsection


@section('content')
<div class="content-wrapper">
 
  @include('Admins.Components.content-header', ['name' => 'settings', 'key' => 'Quản lý'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('settingAdd')}}" class="btn btn-success float-right m-2">Thêm</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Value</th>
                <th scope="col">Config Value</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($configs as $configs)
                <tr class="set_{{$configs->id}}">
                    <th scope="row">{{$configs->id}}</th>
                    <td>{{$configs->name}}</td>
                    <td>{{ \Illuminate\Support\Str::limit($configs->value, 30) }}</td>
                    <td>
                      <div class="col-md-6">
                        <a href="{{route('settingEdit',['id'=> $configs->id])}}" class="btn btn-default">Edit</a>
                        <a href="" 
                        data-url = "{{route('settingDelete', ['id' => $configs->id])}}" 
                        class="btn btn-danger action_delete">Delete</a>    
                      </div>
                    </td>
                  </tr>
                @endforeach
            
            </tbody>
          </table>
        </div>
       
     
        
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


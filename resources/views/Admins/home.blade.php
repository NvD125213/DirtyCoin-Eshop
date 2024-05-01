 
@extends('Layouts.admin')
 
@section('title')
<title>Trang chủ</title>

@endsection
 
@section('content')
<div class="content-wrapper">
  @include('Admins.Components.content-header', ['name' => 'Trang chủ', 'key' => '']);

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
       
        <div class="col-md-12">
          <p>Trang chu</p>
        </div>
      </div>
      
    </div>
  </div>
</div>
  
    
@endsection


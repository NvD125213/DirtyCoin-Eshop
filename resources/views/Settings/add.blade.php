
@extends('Layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('Admins.Components.content-header', ['name' => 'settings', 'key' => 'Thêm'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{Route('settingStore')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Tên setting:</label>
                            <div class="col-md-9">
                                <input id="name" type="text" name="name" class="form-control" placeholder="Nhập tại đây!" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Giá trị:</label>
                            <div class="col-md-9">
                                <input id="name" type="text" name="value" class="form-control" placeholder="Nhập tại đây!" required>
                            </div>
                        </div>
                        
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

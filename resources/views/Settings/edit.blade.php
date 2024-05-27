@extends('Layouts.admin')

@section('title')
    <title>Sửa thông tin settings</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('Admins.Components.content-header', ['name' => 'settings', 'key' => 'Sửa'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{Route('settingUpdate', ['id' => $configs->id])}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Tên settings:</label>
                            <div class="col-md-9">
                                <input id="name" type="text" name="name" value="{{ $configs->name }}" class="form-control" placeholder="Nhập tên danh mục tại đây!" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Tên settings:</label>
                            <div class="col-md-9">
                                <input id="name" type="text" name="value" value="{{ $configs->value }}" class="form-control" placeholder="Nhập tên danh mục tại đây!" required>
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

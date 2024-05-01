@extends('Layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('Admins.Components.content-header', ['name' => 'slider', 'key' => 'Thêm'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{Route('slider.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Tên slider:</label>
                            <div class="col-md-9">
                                <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên danh mục tại đây!" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-md-3 col-form-label text-md-right">Mô tả slider:</label>
                            <div class="col-md-9">
                                <textarea id="content" class="form-control @error('description') is-invalid @enderror" name="description" rows="3">
                                </textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image_path" class="col-md-3 col-form-label text-md-right">Chọn hình ảnh:</label>
                            <div class="col-md-9">
                                <input id="link" type="file" name="link" class="form-control-file  @error('link') is-invalid @enderror" required>  
                                @error('link')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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

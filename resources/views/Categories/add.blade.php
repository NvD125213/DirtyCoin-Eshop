
@extends('Layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('Admins.Components.content-header', ['name' => 'danh mục', 'key' => 'Thêm'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Tên danh mục:</label>
                            <div class="col-md-9">
                                <input id="name" type="text" name="name" class="form-control" placeholder="Nhập tên danh mục tại đây!" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="parent_id" class="col-md-3 col-form-label text-md-right">Danh mục cha:</label>
                            <div class="col-md-9">
                                <select id="parent_id" class="form-control" name="parent_id">
                                    <option value="">Danh mục lớn nhất</option>
                                    {!! $htmlOptions !!}
                                </select>
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

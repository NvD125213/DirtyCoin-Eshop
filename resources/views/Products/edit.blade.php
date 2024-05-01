@extends('Layouts.admin')

@section('title')
    <title>Sửa thông tin sản phẩm</title>
@endsection


@section('css')
  <link rel="stylesheet" href="{{asset('/vendor/select2/select2.min.css')}}">
  <script src="{{asset('/vendor/select2/select2.min.js')}}"></script>
  <link rel="{{asset('/admin/product/add.css')}}"></link>
  <link rel="stylesheet" href="/admin/product/edit.css">

@endsection


@section('content')
<div class="content-wrapper">
    @include('Admins.Components.content-header', ['name' => 'sản phẩm', 'key' => 'Sửa thông tin'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Tên sản phẩm:</label>
                            <div class="col-md-9">
                                <input id="name" value="{{$product->name}}" type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm tại đây!" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-3 col-form-label text-md-right">Nhập giá:</label>
                            <div class="col-md-9">
                                <input id="price" value="{{$product->price}}" type="number" class="form-control" name="price" placeholder="Nhập giá sản phẩm tại đây!" required>
                            </div>
                          
                        </div>
                        <div class="form-group row">
                            <label for="image_path" class="col-md-3 col-form-label text-md-right">Chọn hình ảnh:</label>
                            <div class="col-md-9">
                                <input id="image_path"  type="file" name="image_path" class="form-control-file" required>
                                <img class="product_image" src="{{$product->image_path}}" alt="">
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-3 col-form-label text-md-right">Thêm ảnh phụ:</label>
                            <div class="col-md-9">
                                <input id="image" type="file" name="image[]" multiple class="form-control-file">
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 listImage">
                                @foreach ($product->productImages as $productItem)
                                    <img src="{{ $productItem->image}}" alt="" class="product_image">
                                @endforeach
                            </div>

                        </div>
                      
                        <div class="form-group row">
                            <label for="content" class="col-md-3 col-form-label text-md-right">Nội dung:</label>
                            <div class="col-md-9">
                                <textarea id="content" class="form-control" name="description" rows="3">{{$product->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="parent_id" class="col-md-3 col-form-label text-md-right ">Chọn danh mục:</label>
                            <div class="col-md-9">
                                <select class="form-control select2_init" name="id_Cate">
                                    <option value="">Danh mục lớn nhất</option>
                                    {!! $htmlOptions !!}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tags" class="col-md-3 col-form-label text-md-right">Nhập size:</label>
                            <div class="col-md-9">
                                <select id="tags" name="tags[]" class="form-control tags_select_choose" multiple="multiple" name="tags[]">
                                    @foreach ($product->tags as $tagItem)
                                        <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                        
                                    @endforeach
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

@section('js')
    <script>
        $(".tags_select_choose").select2({
            tags: true,
            tokenSeparators: [',']
        });
       
    </script>
@endsection
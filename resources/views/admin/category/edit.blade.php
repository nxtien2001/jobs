@extends('admin.layout.layout')
@section('title', 'Dashboard')
@section('route', 'Cập nhật danh mục')
@section('category-menu','actives')
@section('main-content')

<br>
<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="exampleFormControlInput2">Tên danh mục</label>
                        <input autocomplete="off" type="text" name="name" id="name" value="{{$categories->name}}" class="form-control" id="" placeholder="">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <br>
                            <label for="">
                                <input type="radio" name="enable" value="1" checked id="">
                                HIỂN THỊ
                            </label>
                            <label for="">
                                <input type="radio" name="enable" value="0" id="">
                                ẨN
                            </label>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="exampleFormControlInput2">Slug</label>
                        <input autocomplete="off" type="text" name="slug" id="slug" value="{{$categories->slug}}" class="form-control" id="" placeholder="">
                        @error('slug')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" name="time" class="mt-4 mb-4 btn btn-primary">Cập nhật</button>
                <a href="{{route('categories.index')}}" type="submit" name="time" class="mt-4 mb-4 btn btn-danger">Quay lại</a>
            </form>
        </div>
    </div>
</div>

@endsection
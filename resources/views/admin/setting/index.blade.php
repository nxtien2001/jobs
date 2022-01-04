@extends('admin.layout.layout')
@section('title', 'Quản lý giao diện')
@section('route', 'Giao diện')
@section('setting-menu','actives')
@section('main-content')
<br>
<div class="table-responsive">
    @foreach($setting as $item)
    <p><span class="sp">Tên trang web:</span> {{$item->name}}</p>
    <p><span class="sp">Địa chỉ:</span> {{$item->address}}</p>
    <p><span class="sp">Bản quyền:</span> {{$item->copy_right}}</p>
    <p><span class="sp">Giới thiệu:</span> {{$item->intro}}</p>
    <p>
        <span class="sp">Logo Website:</span>
        <br> <img src="{{asset('storage/' . $item->logo)}}" width="100px" height="100px" alt="">
    </p>
    <br>
    <a class="btn btn-warning" href="{{route('setting.edit',['id'=>$item->id])}}">Cập nhật</a>
    @endforeach
</div>
<style>
    .sp {
        font-size: 18px;
        font-weight: lighter;
        color: white;
        /* color: #2196F3; */
    }

    p {
        font-size: 16px;
        /* color: #2196F3; */
        color: burlywood;
    }
</style>
@endsection
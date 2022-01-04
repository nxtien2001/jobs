@extends('admin.layout.layout')
@section('title', 'Quản lý tài khoản')
@section('route', 'Quản lý tài khoản')
@section('user-menu', 'actives')
@section('main-content')
<br>
@if(session('alert'))
<div class="text-success">{{session('alert')}}</div>
@endif
@if(session('message'))
<div class="text-success">{{session('message')}}</div>
@endif
@if(session('success'))
<div class="text-success">{{session('success')}}</div>
@endif
<div>
    <h6 class="key">Có: <i>{{count($users)}} tài khoản</i></h6>
    <style>
        .key {
            color: #0E2ECE;
        }
    </style>
</div>
<br>
<div class="row layout-spacing">
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <table id="style-3" class="table style-3  table-hover">
                    <thead>
                        <tr>
                            <th class="checkbox-column text-center">#</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Status</th>
                            <th class="text-center dt-no-sorting">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $item)
                        <tr>
                            <td class="checkbox-column text-center"> {{$loop->iteration}} </td>
                            <td class="text-center">{{$item->email}}</td>
                            <td class="text-center">
                                @if($item->role == 200)
                                <span>Admin</span>
                                @elseif($item->role == 150)
                                <span>Nhân viên</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($item->active == 1)
                                <span class="shadow-none badge badge-success"> Đã xác minh</span>
                                @elseif($item->active == 0)
                                <span class="shadow-none badge badge-warning"> Chưa xác minh</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li><a href="{{route('users.edit',['user'=>$item->id])}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg>
                                        </a></li>
                                    <li><a href="{{route('users.delete',['user'=>$item->id])}}" onclick="return confirm('Bạn có chắc chắn xoá?');" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg>
                                        </a></li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

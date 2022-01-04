@extends('admin.layout.layout')
@section('title', 'Dashboard')
@section('route', 'Dashboard')
@section('main-content')

<div class="row layout-top-spacing">
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget-two">
            <div class="widget-content">
                <div class="w-numeric-value">
                    <style>
                        .w-numeric-value {
                            display: block !important;
                        }
                    </style>
                    <i class="fas fa-book" style="font-size: 70px;color:#4DB6E6">
                        <a href="#" style="font-size: 17px;color:#4361EE"> Tin tuyển dụng theo ngày</a>
                    </i>
                    <br><br>
                    <p>
                        <a href="#" style="color:#4361EE">Có {{$blog}} Tin mới</a>
                        <br>
                        <a href="#" style="color:#4361EE">Có {{$blog_active}} Tin đã được duyệt</a>
                        <br>
                        <a href="#" style="color:#4361EE">Có {{$blog_unactive}} Tin chưa được duyệt</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget-two">
            <div class="widget-content">
                <div class="w-numeric-value">
                    <style>
                        .w-numeric-value {
                            display: block !important;
                        }
                    </style>
                    <i class="fas fa-book" style="font-size: 70px;color:#4DB6E6">
                        <a href="#" style="font-size: 17px;color:#4361EE">Tin {{$blogtuan}} tuyển dụng theo tuần</a>
                    </i>
                    <br><br>
                    <p>
                        <a href="#" style="color:#4361EE">Có {{$blogtuan}} Tin mới</a>
                        <br>
                        <a href="#" style="color:#4361EE">Có {{$blog_active_tuan}} Tin đã được duyệt</a>
                        <br>
                        <a href="#" style="color:#4361EE">Có {{$blog_unactive_tuan}} Tin chưa được duyệt</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget-two">
            <div class="widget-content">
                <div class="w-numeric-value">
                    <style>
                        .w-numeric-value {
                            display: block !important;
                        }
                    </style>
                    <i class="fas fa-book" style="font-size: 70px;color:#4DB6E6">
                        <a href="#" style="font-size: 17px;color:#4361EE">Tin {{$blogthang}} tuyển dụng theo tháng</a>
                    </i>
                    <br><br>
                    <p>
                        <a href="#" style="color:#4361EE">Có {{$blogthang}} Tin mới</a>
                        <br>
                        <a href="#" style="color:#4361EE">Có {{$blog_active_thang}} Tin đã được duyệt</a>
                        <br>
                        <a href="#" style="color:#4361EE">Có {{$blog_unactive_thang}} Tin chưa được duyệt</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row layout-top-spacing">
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget-two">
            <div class="widget-content">
                <div class="w-numeric-value">
                    <style>
                        .w-numeric-value {
                            display: block !important;
                        }
                    </style>
                    <i class="fas fa-users" style="font-size: 70px;color:#4DB6E6">
                        <a href="{{route('users.index')}}" style="font-size: 17px;color:#4361EE"> Tài khoản theo ngày</a>
                    </i>
                    <br><br>
                    <p>
                        <a href="#" style="color:#4361EE">Có {{$useradmin}} Tài khoản quản trị</a>
                        <br>
                        <a href="#" style="color:#4361EE">Có {{$usercan}} Tài khoản ứng viên</a>
                        <br>
                        <a href="#" style="color:#4361EE">Có {{$userre}} Tài khoản nhà tuyển dụng</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget-two">
            <div class="widget-content">
                <div class="w-numeric-value">
                    <style>
                        .w-numeric-value {
                            display: block !important;
                        }
                    </style>
                    <i class="fas fa-users" style="font-size: 70px;color:#4DB6E6">
                        <a href="{{route('users.index')}}" style="font-size: 17px;color:#4361EE"> Tài khoản theo tuần</a>
                    </i>
                    <br><br>
                    <p>
                        <a href="#" style="color:#4361EE">Có {{$useradmintuan}} Tài khoản quản trị</a>
                        <br>
                        <a href="#" style="color:#4361EE">Có {{$usercantuan}} Tài khoản ứng viên</a>
                        <br>
                        <a href="#" style="color:#4361EE">Có {{$userretuan}} Tài khoản nhà tuyển dụng</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget-two">
            <div class="widget-content">
                <div class="w-numeric-value">
                    <style>
                        .w-numeric-value {
                            display: block !important;
                        }
                    </style>
                    <i class="fas fa-users" style="font-size: 70px;color:#4DB6E6">
                        <a href="{{route('users.index')}}" style="font-size: 17px;color:#4361EE"> Tài khoản theo tháng</a>
                    </i>
                    <br><br>
                    <p>
                        <a href="#" style="color:#4361EE">Có {{$useradminthang}} Tài khoản quản trị</a>
                        <br>
                        <a href="#" style="color:#4361EE">Có {{$usercanthang}} Tài khoản ứng viên</a>
                        <br>
                        <a href="#" style="color:#4361EE">Có {{$userrethang}} Tài khoản nhà tuyển dụng</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin.layout.layout')
@section('title', 'Quản lý tài khoản công ty')
@section('route', 'Quản lý tài khoản công ty')
@section('user-menu', 'actives')
@section('main-content')
<br>
<div>
    {{-- <h6 class="key">Có: <i>{{count($user_recruitment->)}} tài khoản nhà tuyển dụng</i></h6>--}}
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
                            <th class="checkbox-column text-center"> #</th>
                            <th class="text-center">Tên doanh nghiệp</th>
                            <th class="text-center">Logo</th>
                            <th class="text-center">Số lượng tuyển dụng</th>
                            <th class="text-center">Tích</th>
                            <th class="text-center">File</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($user_recruitment)
                        @foreach($user_recruitment as $key => $item)
                        <tr>
                            <td class="checkbox-column text-center">{{$key+1}} </td>
                            <td class="text-center">{{$item->userRecruitment->name}}</td>
                            <td class="text-center">
                                <span>
                                    <img src="https://th.bing.com/th?q=FPT+Telecom+Logo&w=120&h=120&c=1&rs=1&qlt=90&cb=1&pid=InlineBlock&mkt=en-WW&cc=VN&setlang=vi&adlt=moderate&t=1&mw=247" width="60px" />
                                </span>
                            </td>
                            <td class="text-center">{{$item->userRecruitment->company_size}}</td>
                            <td>
                                @if($item->userRecruitment->verification == 1)
                                <div class="t-dot bg-success" data-toggle="tooltip" data-placement="top" onclick="onTick(<?= $item->userRecruitment->id ?>)" title="Vip" data-original-title="Normal"></div>
                                @else
                                <div class="t-dot bg-light" onclick="offTick(<?= $item->userRecruitment->id ?>)" data-toggle="tooltip" data-placement="top" title="No vip" data-original-title="Low"></div>
                                @endif
                            </td>
                            <td class="text-center">
                                @if(count($item->userFiles) > 0)
                                <a href="{{asset('storage/'.$item->userFiles[0]->file)}}">
                                    <i class="fas fa-file-archive" style="font-size: 22px"></i>
                                </a>
                                @else {{'null'}} @endif
                            </td>
                            <!-- <td>{{isset($item->user->email) ? $item->user->email : '[Đã xóa]'}}</td> -->
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li><a href="javascript:;" data-toggle="modal" onclick="return show(<?= $item->userRecruitment->id ?>)" data-target="#modalQuickView" class="bs-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal: modalQuickView -->
<div class="modal fade bd-example-modal-xl" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <h2 id="name-company" class="text-center mt-4 mb-4"></h2>
            <div class="modal-body">

                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>Mã số thuế</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày thành lập</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="show-info">
                                    <td id="tax_code"></td>
                                    <td id="phone"></td>
                                    <td id="date_start"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <b style="color: white;">Địa chỉ công ty:</b> <span id="address-info"></span>
                </div>
                <br>
                <div>
                    <b style="color: white;">Giới thiệu:</b> <span id="intro-info"></span>
                </div>
                <br>
                <div>
                    <b style="color: white;">Chi tiết:</b> <span id="detail-info"></span>
                </div>

            </div>
        </div>
    </div>
    @endsection
    @section('datatable-script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const show = (id) => {
            $.ajax({
                url: "{{route('show.recruitment')}}",
                type: "POST",
                cache: false,
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(response) {
                    // console.log(response['show']);
                    var options = {
                        year: 'numeric',
                        month: 'numeric',
                        day: '2-digit'
                    };
                    var date = new Date(response['show'].date_start);

                    var formattedDate = date.toLocaleDateString('en-US', options);
                    $("#tax_code").html(response['show'].tax_code);
                    $("#phone").html(response['show'].phone);
                    $("#date_start").html(formattedDate);
                    $("#address-info").html(response['show'].address);
                    $("#intro-info").html(response['show'].intro);
                    $("#detail-info").html(response['show'].detail);
                    $("#name-company").html(response['show'].name);
                }
            });
        }
        const onTick = (id) => {
            $.ajax({
                url: "{{route('on.tick')}}",
                type: "POST",
                cache: false,
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(response) {
                    if (response.status === 200) {
                        location.reload();
                    }
                }
            });
        }

        /**
         * Off tick
         */
        const offTick = (id) => {
            $.ajax({
                url: "{{route('off.tick')}}",
                type: "POST",
                cache: false,
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(response) {
                    if (response.status === 200) {
                        location.reload();
                    }
                }
            });
        }
    </script>
    @endsection
</div>
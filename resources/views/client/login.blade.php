@extends('client.layout.layout')
@section('title', 'Trang chủ')
@section('main-content')
        <!-- Titlebar -->
        <div id="titlebar" class="gradient">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Đăng nhập</h2>
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="index-1.html">Trang chủ</a></li>
                                <li>Đăng nhập</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3">
                    <div class="utf-login-register-page-aera margin-bottom-50">
                        <div class="utf-welcome-text-item">
                            <h3>Chào bạn! Đăng nhập để tiếp tục </h3>
                            <span> Bạn chưa có tài khoản <a href="register.html">Đăng ký!</a></span>
                        </div>
                        <form method="post" id="login-form">
                            <div class="utf-no-border">
                                <input type="text" class="utf-with-border" name="emailaddress" id="emailaddress" placeholder="Email của bạn" required/>
                            </div>
                            <div class="utf-no-border">
                                <input type="password" class="utf-with-border" name="Mật khẩu" id="password" placeholder="Password" required/>
                            </div>
                            <div class="checkbox margin-top-10">
                                <input type="checkbox" id="two-step">
                                <label for="two-step"><span class="checkbox-icon"></span> Nhớ mật khẩu</label>
                            </div>
                            <a href="forgot-password.html" class="forgot-password">Quên mật khẩu?</a>
                        </form>
                        <button class="button full-width utf-button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form">Đăng nhập <i class="icon-feather-chevron-right"></i></button>
                        <div class="utf-social-login-separator-item"><span>Đăng nhập bằng</span></div>
                        <div class="utf-social-login-buttons-block">
                            <button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Facebook</button>
                            <button class="google-login ripple-effect"><i class="icon-brand-google"></i> Google+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscribe Block Start -->
        <section class="utf_cta_area_item utf_cta_area2_block">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="utf_subscribe_block">
                            <div class="col-xl-8 col-md-7">
                                <div class="section-heading">
                                    <h2 class="utf_sec_title_item utf_sec_title_item2">Đăng ký Email!</h2>
                                    <p class="utf_sec_meta">Để nhận nhưng công việc phù hợp, và thông tin mới nhất từ chúng tôi.</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-5">
                                <div class="contact-form-action">
                                    <form method="post">
                                        <i class="icon-material-baseline-mail-outline"></i>
                                        <input class="form-control" type="email" placeholder="Địa chỉ email của bạn" required="">
                                        <button class="utf_theme_btn" type="submit">Đăng ký</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Subscribe Block End -->

@endsection
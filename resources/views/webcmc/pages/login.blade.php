@extends('webcmc.layouts.master')
@section('title')
    Mỹ thuật cmc | về chúng tôi
@endsection
@section('content')
    <div class="login-page">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 ed-pd-log">
                    <div class="form-log">
                        <div class="icon-user">
                            <i class="fa fa-user-o"></i>
                        </div>
                        <h4>Đăng nhập</h4>

                        <form action="admin/loginPost" method="POST">
                            @csrf
                            <div class="form-group">
                                <i class="fa fa-user-o"></i>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <i class="fa fa-lock"></i>
                                <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                            </div>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                            @if(session('thongbao'))
                                <div class="alert alert-danger">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            <div class="checkbx">
                                <label class="checkbox-1">Nhớ mật khẩu
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="#">Quên mật khẩu?</a>
                                <div class="clearfix"></div>
                            </div>
                            <p>Bạn chưa có tài khoản? <a href="register.php">Đăng ký tại đây</a></p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    
@endsection
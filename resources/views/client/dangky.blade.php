@extends('layout.louser')
@section('main')
<div style="color: black;" class="main_content">
    <div style="color: black;" class="login_register_wrap section">
        <div style="color: black;" class="container">
            <div style="color: black;" class="row justify-content-center">
                <div style="color: black;" class="col-xl-6 col-md-10">
                    <div style="color: black;" class="login_wrap">
                        <div style="color: black;" class="padding_eight_all bg-white">
                            <div style="color: black;" class="heading_s1">
                                <h3 style="color: black;">Đăng ký tài khoản</h3>
                            </div>
                            <div id="form-dk-error">

                            </div>
                            <form  action="{{route('client.postdangky')}}"  method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text"  style="color: black;" class="form-control" id="hoten" name="hoten" placeholder="Họ và tên">
                                    {{$errors->first('hoten')}}
                                </div>
                                <div class="form-group">
                                    <select id="gioitinh" name="gioitinh" class="form-select" aria-label="Default select example">
                                        <option selected value="">Giới tính</option>
                                        <option value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                        
                                      </select>
                                      {{$errors->first('gioitinh')}}
                                </div>
                                <div class="form-group">
                                    <input id="sdt" type="number" style="color: black;"  class="form-control" name="sdt" placeholder="Số điện thoại">
                                    {{$errors->first('sdt')}}
                                </div>
                                <div class="form-group">
                                    <input id="diachi" type="text" style="color: black;"  class="form-control" name="diachi" placeholder="Địa chỉ">
                                    {{$errors->first('diachi')}}
                                </div>
                                <div class="form-group">
                                    <input id="cmnd" type="text" style="color: black;"  class="form-control" name="cmnd" placeholder="CMND">
                                    {{$errors->first('cmnd')}}
                                </div>
                                <div  class="form-group">
                                    <input id="ngaysinh" type="date" style="color: black;"  class="form-control" name="ngaysinh" placeholder="Ngày sinh">
                                    {{$errors->first('ngaysinh')}}
                                </div>
                              
                                <div class="form-group">
                                    <input id="email" type="text" style="color: black;" class="form-control" name="email" placeholder="Email">
                                    {{$errors->first('email')}}
                                </div>
                                <div class="form-group">
                                    <input id="tendangnhap" type="text"  style="color: black;" class="form-control" name="tendangnhap" placeholder="Tên đăng nhập">
                                    {{$errors->first('tendangnhap')}}
                                </div>
                                <div class="form-group">
                                    <input id="password" class="form-control"  style="color: black;" type="password" name="password" placeholder="Mật khẩu">
                                    {{$errors->first('password')}}
                                </div>
                                <div class="form-group">
                                    <input id="password_c" class="form-control"  style="color: black;" type="password" name="password_c" placeholder="Xác nhận mất khẩu">
                                    {{$errors->first('password_c')}}
                                </div>
                                
                                <div class="form-group">
                                    <button id="btn-dangky" type="submit" class="btn btn-block btn-secondary" >Đăng kí</button>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

   
   
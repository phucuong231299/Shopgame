@extends('layout.loadmin')
@section('main')
<h5 class="mb-3">Thêm khách hàng</h5>

<form action="{{route('khachhang.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="hoten" class="form-label">Họ và tên</label>
      <input name="hoten" type="text" class="form-control" id="hoten" aria-describedby="hoten">
      {{$errors->first('hoten')}}
    </div>
    
    {{-- <div class="mb-3">
      <label for="privilege">giới tính <span class="text-danger font-weight-bold">*</span></label>
      <select class="custom-select form-control" id="gioitinh" name="gioitinh" >
        <option value="" style="text-align: center;" selected="selected">-- Chọn giới tính --</option>
        <option value="1">Nữ</option>
        <option value="0">Nam</option>
      </select>
      {{$errors->first('gioitinh')}}
    </div> --}}

    <div style="text-align: center;" class="mb-3">
      <div class="mb-3">
        <input class="form-check-input" type="radio" value="1" name="gioitinh" id="gioitinh">
        <label class="form-check-label" for="privilege">
          Nữ
        </label>
      </div>
      <div class="mb-3">
        <input class="form-check-input" type="radio" value="0" name="gioitinh" id="gioitinh" checked>
        <label class="form-check-label" for="privilege">
          Nam
        </label>
      </div>
      {{$errors->first('gioitinh')}}
  </div>

    <div class="mb-3">
      <label for="sdt" class="form-label">SĐT</label>
      <input type="text" class="form-control" id="sdt" name="sdt" >
      {{$errors->first('sdt')}}
    </div>
    <div class="mb-3">
      <label for="cmnd" class="form-label">CMND</label>
      <input type="text" class="form-control" id="cmnd" name="cmnd" >
      {{$errors->first('cmnd')}}
    </div>
    <div class="mb-3">
      <label for="ngaysinh" class="form-label">Ngày sinh</label>
      <input type="date" style="text-align: center;"class="form-control" id="ngaysinh" name="ngaysinh" >
      {{$errors->first('ngaysinh')}}
    </div>
    
    <div class="mb-3">
      <label for="diachi" class="form-label">Địa chỉ</label>
      <input type="text" class="form-control" id="diachi" name="diachi" >
      {{$errors->first('diachi')}}
    <div class="mb-3">
      <label for="file_uploads" class="form-label">Ảnh <span class="text-danger font-weight-bold">*</span></label>
      <input name="file_uploads" type="file" class="form-control" id="file_uploads" aria-describedby="file_uploads">
    </div>
     
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" id="email" name="email" >
      {{$errors->first('email')}}
    </div>
    <div class="mb-3">
      <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
      <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" >
      {{$errors->first('tendangnhap')}}
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Mật khẩu</label>
      <input type="text" class="form-control" id="password" name="password" >
      {{$errors->first('password')}}
    </div>
   
    <button type="submit" class="btn btn-primary">Xác nhận</button>
</form>
@endsection
@extends('layout.loadmin')
@section('main')
<form action="{{route('khachhang.update', $khachhang->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="TieuDe" class="form-label">Họ và tên</label>
      <input type="text" value="{{$khachhang->hoten}}" class="form-control" id="hoten" name="hoten" >
      {{$errors->first('hoten')}}
  </div>

  {{-- <div class="mb-3">
    <label for="gioitinh">Giới tính <span class="text-danger font-weight-bold">*</span></label>
    <select class="custom-select form-control " id="gioitinh" name="gioitinh" >
      <option value="">-- Choose --</option>
      <option value="0">Nam</option>
      <option value="1" selected="selected">Nữ</option>
    </select>
    {{$errors->first('gioitinh')}}
  </div> --}}
  <div style="text-align: center;" class="mb-3">
    <div class="mb-3">
      <input class="form-check-input" type="radio" value="1" name="gioitinh" id="gioitinh" checked>
      <label class="form-check-label" for="privilege">
        Nữ
      </label>
    </div>
    <div class="mb-3">
      <input class="form-check-input" type="radio" value="0" name="gioitinh" id="gioitinh" >
      <label class="form-check-label" for="privilege">
        Nam
      </label>
    </div>
    {{$errors->first('gioitinh')}}
</div>

  <div class="mb-3">
    <label for="sdt" class="form-label">SĐT</label>
    <input  value="{{$khachhang->sdt}}" type="text" class="form-control" id="sdt" name="sdt" >
    {{$errors->first('sdt')}}
  </div>
  <div class="mb-3">
    <label for="cmnd" class="form-label">CMND</label>
    <input  value="{{$khachhang->cmnd}}" type="text" class="form-control" id="cmnd" name="cmnd" >
    {{$errors->first('cmnd')}}
  </div>
  <div class="mb-3">
    <label for="ngaysinh" class="form-label">Ngày sinh</label>
    <input  value="{{$khachhang->ngaysinh}}" type="date" class="form-control" id="ngaysinh" name="ngaysinh" >
    {{$errors->first('ngaysinh')}}
  </div>
  
  <div class="mb-3">
    <label for="diachi" class="form-label">Địa chỉ</label>
    <input  value="{{$khachhang->diachi}}" type="text" class="form-control" id="diachi" name="diachi" >
    {{$errors->first('diachi')}}
  </div>

  <div class="mb-3">
    <label for="anh">Hình ảnh Khách hàng <span class="text-danger font-weight-bold">*</span></label>
    <img class="d-block" src="{{url('public/uploads')}}/{{$khachhang->anh}}"  width="30px"/>
    <input id="file_uploads" type="file" class="form-control" name="file_uploads" value="{{ $khachhang->anh }}" autocomplete="anh" />
</div>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input  value="{{$khachhang->email}}" type="email" class="form-control" id="email" name="email" >
    {{$errors->first('email')}}
  </div>
  <div class="mb-3">
    <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
    <input  value="{{$khachhang->tendangnhap}}" type="text" class="form-control" id="tendangnhap" name="tendangnhap" >
    {{$errors->first('tendangnhap')}}
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mật khẩu</label>
    <input  value="{{$khachhang->password}}" type="text" class="form-control" id="password" name="password" >
    {{$errors->first('password')}}
  </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
@extends('layout.loadmin')
@section('main')
<form action="{{route('nhanvien.update', $nhanvien->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="hoten" class="form-label">Họ và tên</label>
      <input type="text" value="{{$nhanvien->hoten}}" class="form-control" id="hoten" name="hoten" >
      {{$errors->first('hoten')}}
  </div>
  <div class="mb-3">
    <label for="privilege">giới tính <span class="text-danger font-weight-bold">*</span></label>
    <select class="custom-select form-control" id="gioitinh" name="gioitinh" >
      <option value="">-- Choose --</option>
      <option value="0">Nam</option>
      <option value="1" selected="selected">Nữ</option>
    </select>
    {{$errors->first('gioitinh')}}
  </div>

  <div class="mb-3">
    <label for="ngaysinh" class="form-label">Ngày sinh</label>
    <input  value="{{$nhanvien->ngaysinh}}" type="date" class="form-control" id="ngaysinh" name="ngaysinh" >
    {{$errors->first('ngaysinh')}}
  </div>
  <div class="mb-3">
    <label for="diachi" class="form-label">Địa chỉ</label>
    <input  value="{{$nhanvien->diachi}}" type="text" class="form-control" id="diachi" name="diachi" >
    {{$errors->first('diachi')}}
  </div>
  <div class="mb-3">
    <label for="sdt" class="form-label">SĐT</label>
    <input  value="{{$nhanvien->sdt}}" type="text" class="form-control" id="sdt" name="sdt" >
    {{$errors->first('sdt')}}
  </div>
  <div class="mb-3">
    <label for="cmnd" class="form-label">CMND</label>
    <input  value="{{$nhanvien->cmnd}}" type="text" class="form-control" id="cmnd" name="cmnd" >
    {{$errors->first('cmnd')}}
  </div>

  <div class="mb-3">
    <label for="anh">Hình ảnh nhân viên <span class="text-danger font-weight-bold">*</span></label>
    <img class="d-block" src="{{url('public/nhanvien')}}/{{$nhanvien->anh}}"  width="30px"/>
    <input id="file_uploads" type="file" class="form-control" name="file_uploads" value="{{ $nhanvien->anh }}" autocomplete="anh" />
</div>

  <div class="form-group">
    <label for="chucvu_id"><span class="text-danger font-weight-bold">*</span></label>
    <select id="chucvu_id" class="form-control custom-select" name="chucvu_id"  autofocus>
        <option value="">--Chọn chức vụ--</option>
        @foreach($chucvu as $value)
        <option value="{{ $value->id }}" {{($nhanvien->chucvu_id== $value->id)?'selected':'' }}>{{$value->tenchucvu}}</option>
        @endforeach
    </select>
    {{$errors->first('chucvu_id')}}
</div>

<div class="mb-3">
  <label for="email" class="form-label">Email</label>
  <input type="text" value="{{$nhanvien->email}}" class="form-control" id="email" name="email" >
  {{$errors->first('email')}}
</div>
  <div class="mb-3">
    <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
    <input  value="{{$nhanvien->tendangnhap}}" type="text" class="form-control" id="tendangnhap" name="tendangnhap" >
    {{$errors->first('tendangnhap')}}
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mật khẩu</label>
    <input  value="{{$nhanvien->password}}" type="text" class="form-control" id="password" name="password" >
    {{$errors->first('password')}}
  </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
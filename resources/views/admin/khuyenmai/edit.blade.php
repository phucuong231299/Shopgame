@extends('layout.loadmin')
@section('main')
<form action="{{route('khuyenmai.update', $khuyenmai->id)}}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="tenkhuyenmai" class="form-label">Tên Khuyến Mãi</label>
      <input value="{{$khuyenmai->tenkhuyenmai}}" name="tenkhuyenmai" type="text" class="form-control" id="tenkhuyenmai" aria-describedby="tenkhuyenmai">
      {{$errors->first('tenkhuyenmai')}}
    </div>
    <div class="mb-3">
      <label for="nsx" class="form-label">Ngày sản xuất</label>
      <input value="{{$khuyenmai->nsx}}" name="nsx" type="date" class="form-control" id="nsx" aria-describedby="nsx">
      {{$errors->first('nsx')}}
    </div>
    <div class="mb-3">
      <label for="hsd" class="form-label">Hạn sử dụng</label>
      <input value="{{$khuyenmai->hsd}}" name="hsd" type="date" class="form-control" id="hsd" aria-describedby="hsd">
      {{$errors->first('hsd')}}
    </div>
    <div class="mb-3">
      <label for="makhuyenmai" class="form-label">Mã Khuyến Mãi</label>
      <input value="{{$khuyenmai->makhuyenmai}}" name="makhuyenmai" type="text" class="form-control" id="makhuyenmai" aria-describedby="makhuyenmai">
      {{$errors->first('makhuyenmai')}}
    </div>
    <div class="mb-3">
      <label for="tiengiam" class="form-label">Số tiền giảm</label>
      <input value="{{$khuyenmai->tiengiam}}" name="tiengiam" type="text" class="form-control" id="tiengiam" aria-describedby="tiengiam">
      {{$errors->first('tiengiam')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
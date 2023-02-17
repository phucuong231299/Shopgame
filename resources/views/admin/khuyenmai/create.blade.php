@extends('layout.loadmin')
@section('main')
<form action="{{route('khuyenmai.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="tenkhuyenmai" class="form-label">tên khuyên mãi</label>
      <input name="tenkhuyenmai" type="text" class="form-control" id="tenkhuyenmai" aria-describedby="tenkhuyenmai">
      {{$errors->first('tenkhuyenmai')}}
    </div>
    <div class="mb-3">
      <label for="nsx" class="form-label">Ngày sản xuất</label>
      <input name="nsx" type="date" class="form-control" id="nsx" aria-describedby="nsx">
      {{$errors->first('nsx')}}
    </div>
    <div class="mb-3">
      <label for="hsd" class="form-label">Hạn sử dụng</label>
      <input name="hsd" type="date" class="form-control" id="hsd" aria-describedby="hsd">
      {{$errors->first('hsd')}}
    </div>
    <div class="mb-3">
      <label for="makhuyenmai" class="form-label">Mã khuyến mãi</label>
      <input name="makhuyenmai" type="text" class="form-control" id="makhuyenmai" aria-describedby="makhuyenmai">
      {{$errors->first('makhuyenmai')}}
    </div>
    <div class="mb-3">
      <label for="tiengiam" class="form-label">Số tiền giảm</label>
      <input name="tiengiam" type="text" class="form-control" id="tiengiam" aria-describedby="tiengiam">
      {{$errors->first('tiengiam')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection
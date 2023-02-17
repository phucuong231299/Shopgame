@extends('layout.loadmin')
@section('main')
<form action="{{route('tinh.update', $tinh->matinh)}}" method="POST">
    @csrf @method('PUT')
    
    <div class="mb-3">
      <label for="matinh" class="form-label">Mã Xã</label>
      <input value="{{$tinh->matinh}}" name="matinh" type="text" class="form-control" id="matinh" aria-describedby="matinh">
      {{$errors->first('matinh')}}
    </div>
    <div class="mb-3">
      <label for="tentinh" class="form-label">Tên Xã</label>
      <input value="{{$tinh->tentinh}}" name="tentinh" type="text" class="form-control" id="tentinh" aria-describedby="tentinh">
      {{$errors->first('tentinh')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
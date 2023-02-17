@extends('layout.loadmin')
@section('main')
<form action="{{route('loai.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="loai" class="form-label">Tên Loại</label>
      <input name="loai" type="text" class="form-control" id="loai" aria-describedby="loai">
      {{$errors->first('loai')}}
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection
@extends('layout.loadmin')
@section('main')
<form action="{{route('loai.update', $loai->id)}}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="loai" class="form-label">Tên Loại</label>
      <input value="{{$loai->loai}}" name="loai" type="text" class="form-control" id="loai" aria-describedby="loai">
      {{$errors->first('loai')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
@extends('layout.loadmin')
@section('main')
<form action="{{route('thang.update', $thang->id)}}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="thang" class="form-label">Bảo hành</label>
      <input value="{{$thang->thang}}" name="thang" type="text" class="form-control" id="thang" aria-describedby="thang">
      {{$errors->first('thang')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
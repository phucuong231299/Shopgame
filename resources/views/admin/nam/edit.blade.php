@extends('layout.loadmin')
@section('main')
<form action="{{route('nam.update', $nam->id)}}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="nam" class="form-label">Bảo hành</label>
      <input value="{{$nam->nam}}" name="nam" type="text" class="form-control" id="nam" aria-describedby="nam">
      {{$errors->first('nam')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
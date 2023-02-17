@extends('layout.loadmin')
@section('main')
<form action="{{route('tinhtrang.update', $tinhtrang->id)}}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="tinhtrang" class="form-label">Tình trạng</label>
      <input value="{{$tinhtrang->tinhtrang}}" name="tinhtrang" type="text" class="form-control" id="tinhtrang" aria-describedby="tinhtrang">
      {{$errors->first('tinhtrang')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
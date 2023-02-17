@extends('layout.loadmin')
@section('main')
<form action="{{route('hang.update', $hang->id)}}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="hang" class="form-label">Tên danh mục</label>
      <input value="{{$hang->hang}}" name="hang" type="text" class="form-control" id="hang" aria-describedby="hang">
      {{$errors->first('hang')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
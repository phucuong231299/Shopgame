@extends('layout.loadmin')
@section('main')
<form action="{{route('noisanxuat.update', $noisanxuat->id)}}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="noisanxuat" class="form-label">Tên danh mục</label>
      <input value="{{$noisanxuat->noisanxuat}}" name="noisanxuat" type="text" class="form-control" id="noisanxuat" aria-describedby="noisanxuat">
      {{$errors->first('noisanxuat')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
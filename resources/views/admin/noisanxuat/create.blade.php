@extends('layout.loadmin')
@section('main')
<form action="{{route('noisanxuat.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="noisanxuat" class="form-label">Nơi sản xuất</label>
      <input name="noisanxuat" type="text" class="form-control" id="noisanxuat" aria-describedby="noisanxuat">
      {{$errors->first('noisanxuat')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection
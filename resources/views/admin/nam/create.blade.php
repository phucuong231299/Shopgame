@extends('layout.loadmin')
@section('main')
<form action="{{route('nam.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="nam" class="form-label">Bảo hành</label>
      <input name="nam" type="text" class="form-control" id="nam" aria-describedby="nam">
      {{$errors->first('nam')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection
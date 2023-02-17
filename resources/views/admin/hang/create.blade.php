@extends('layout.loadmin')
@section('main')
<form action="{{route('hang.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="hang" class="form-label">Tên Hãng</label>
      <input name="hang" type="text" class="form-control" id="hang" aria-describedby="hang">
      {{$errors->first('hang')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection
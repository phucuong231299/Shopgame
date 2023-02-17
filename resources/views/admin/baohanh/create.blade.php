@extends('layout.loadmin')
@section('main')
<form action="{{route('baohanh.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="thoigianbaohanh" class="form-label">Bảo hành</label>
      <input name="thoigianbaohanh" type="text" class="form-control" id="thoigianbaohanh" aria-describedby="thoigianbaohanh">
      {{$errors->first('thoigianbaohanh')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection
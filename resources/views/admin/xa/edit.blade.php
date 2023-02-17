@extends('layout.loadmin')
@section('main')
<form action="{{route('baohanh.update', $baohanh->id)}}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="thoigianbaohanh" class="form-label">Bảo hành</label>
      <input value="{{$baohanh->thoigianbaohanh}}" name="thoigianbaohanh" type="text" class="form-control" id="thoigianbaohanh" aria-describedby="thoigianbaohanh">
      {{$errors->first('thoigianbaohanh')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
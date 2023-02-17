@extends('layout.loadmin')
@section('main')
<form action="{{route('chucvu.update', $chucvu->id)}}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="tenchucvu" class="form-label">Chức Vụ</label>
      <input value="{{$chucvu->tenchucvu}}" name="tenchucvu" type="text" class="form-control" id="tenchucvu" aria-describedby="tenchucvu">
      {{$errors->first('tenchucvu')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
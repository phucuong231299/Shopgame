@extends('layout.loadmin')
@section('main')
<form action="{{route('huyen.update', $huyen->mahuyen)}}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="mahuyen" class="form-label">Mã huyện</label>
      <input value="{{$huyen->mahuyen}}" name="mahuyen" type="text" class="form-control" id="mahuyen" aria-describedby="mahuyen">
      {{$errors->first('mahuyen')}}
    </div>
    <div class="mb-3">
      <label for="tenhuyen" class="form-label">Tên huyện</label>
      <input value="{{$huyen->tenhuyen}}" name="tenhuyen" type="text" class="form-control" id="tenhuyen" aria-describedby="tenhuyen">
      {{$errors->first('tenhuyen')}}
    </div>
    <div class="mb-3">
      <label for="matinh">Tên tĩnh <span class="text-danger font-weight-bold">*</span></label>
      <select id="matinh" class="form-control custom-select" name="matinh" required autofocus>
          <option value="">-- Chọn loại Tên tĩnh --</option>
          @foreach($tinh as $value)
              <option value="{{ $value->matinh }}" {{($huyen->matinh == $value->matinh)?'selected':'' }}>{{$value->tentinh}}</option>
          @endforeach
      </select>
   
  </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
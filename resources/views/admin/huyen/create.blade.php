@extends('layout.loadmin')
@section('main')
<form action="{{route('huyen.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="mahuyen" class="form-label">Mã Xã</label>
      <input name="mahuyen" type="text" class="form-control" id="mahuyen" aria-describedby="mahuyen">
      {{$errors->first('mahuyen')}}
    </div>
    <div class="mb-3">
      <label for="tenhuyen" class="form-label">Tên Xã</label>
      <input name="tenhuyen" type="text" class="form-control" id="tenhuyen" aria-describedby="tenhuyen">
      {{$errors->first('tenhuyen')}}
    </div>
    <div class="form-group">
      <label for="matinh"><span class="text-danger font-weight-bold">*</span></label>
      <select id="matinh" class="form-control custom-select" name="matinh" >
          <option value="">-- Chọn loại Tên Tĩnh --</option>
          @foreach($tinh as $value)
              <option value="{{ $value->matinh }}">{{ $value->tentinh }}</option>
          @endforeach
      </select>
      {{$errors->first('matinh')}}
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection
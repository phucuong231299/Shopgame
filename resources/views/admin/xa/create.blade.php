@extends('layout.loadmin')
@section('main')
<form action="{{route('xa.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="maxa" class="form-label">Mã Xã</label>
      <input name="maxa" type="text" class="form-control" id="maxa" aria-describedby="maxa">
      {{$errors->first('maxa')}}
    </div>
    <div class="mb-3">
      <label for="tenxa" class="form-label">Tên Xã</label>
      <input name="tenxa" type="text" class="form-control" id="tenxa" aria-describedby="tenxa">
      {{$errors->first('tenxa')}}
    </div>

    <div class="form-group">
      <label for="mahuyen"><span class="text-danger font-weight-bold">*</span></label>
      <select id="mahuyen" class="form-control custom-select" name="mahuyen" >
          <option value="">-- Chọn loại Tên Huyện --</option>
          @foreach($huyen as $value)
              <option value="{{ $value->mahuyen }}">{{ $value->tenhuyen }}</option>
          @endforeach
      </select>
      {{$errors->first('mahuyen')}}
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection
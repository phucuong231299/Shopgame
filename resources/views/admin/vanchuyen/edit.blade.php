@extends('layout.loadmin')
@section('main')
<form action="{{route('vanchuyen.update', $vanchuyen->id)}}" method="POST">
    @csrf @method('PUT')
    
    <div class="mb-3">
      <label for="tinh_id"><span class="text-danger font-weight-bold">*</span></label>
      <select id="tinh_id" class="form-control custom-select" name="tinh_id" required autofocus>
          <option value="">-- Chọn Tĩnh --</option>
          @foreach($tinh as $value)
              <option value="{{ $value->matinh }}" {{($vanchuyen->tinh_id== $value->matinh)?'selected':'' }}>{{$value->tentinh}}</option>
          @endforeach
      </select>
   
  </div>

  <div class="mb-3">
    <label for="huyen_id"><span class="text-danger font-weight-bold">*</span></label>
    <select id="huyen_id" class="form-control custom-select" name="huyen_id" required autofocus>
        <option value="">-- Chọn Huyện --</option>
        @foreach($huyen as $value)
            <option value="{{ $value->mahuyen }}" {{($vanchuyen->huyen_id== $value->mahuyen)?'selected':'' }}>{{$value->tenhuyen}}</option>
        @endforeach
    </select>
 
</div>

<div class="mb-3">
  <label for="xa_id"><span class="text-danger font-weight-bold">*</span></label>
  <select id="xa_id" class="form-control custom-select" name="xa_id" required autofocus>
      <option value="">-- Chọn Xã --</option>
      @foreach($xa as $value)
          <option value="{{ $value->maxa }}" {{($vanchuyen->xa_id== $value->maxa)?'selected':'' }}>{{$value->tenxa}}</option>
      @endforeach
  </select>

</div>

<div class="mb-3">
  <label for="sotien">Số tiền <span class="text-danger font-weight-bold">*</span></label>
  <input id="sotien" value="{{$vanchuyen->sotien}}" type="number" min="0" class="form-control" name="sotien" value="{{ old('sotien') }}" required autocomplete="gianhap" />
 
</div>


    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
@extends('layout.loadmin')
@section('main')
<form action="{{route('thang.store')}}" method="POST">
    @csrf

    
    <div class="form-group">
      <label for="thang">tháng <span class="text-danger font-weight-bold">*</span></label>
      <select id="thang" class="form-control custom-select" name="thang"  autofocus>
          <option value="">-- Chọn Tháng--</option>
       
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>

        
      </select>
  </div>

  <div class="form-group">
    <label for="nam_id">Năm <span class="text-danger font-weight-bold">*</span></label>
    <select id="nam_id" class="form-control custom-select" name="nam_id"  autofocus>
        <option value="">-- Chọn Năm --</option>
        @foreach($nam as $value)
            <option value="{{$value->id }}">{{ $value->nam }}</option>
        @endforeach
    </select>
</div>

    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection
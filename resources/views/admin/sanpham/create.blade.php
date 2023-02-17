@extends('layout.loadmin')
@section('main')
<form action="{{route('sanpham.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="tensp" class="form-label">Tên sản phẩm <span class="text-danger font-weight-bold">*</span></label>
      <input name="tensp" type="text" class="form-control" id="tensp" aria-describedby="tensp">
      {{$errors->first('tensp')}}
    </div>

    <div class="mb-3">
      <label for="file_uploads" class="form-label">Ảnh <span class="text-danger font-weight-bold">*</span></label>
      <input name="file_uploads" type="file" class="form-control" id="file_uploads" aria-describedby="file_uploads">
      {{$errors->first('file_uploads')}}
    </div>
  
    
    <div class="mb-3">
      <label for="soluong" class="form-label">Số lượng <span class="text-danger font-weight-bold">*</span></label>
      <input name="soluong" type="text" class="form-control" id="soluong" aria-describedby="soluong">
      {{$errors->first('soluong')}}
    </div>

    <div class="mb-3">
      <label for="gianhap" class="form-label">Giá nhập <span class="text-danger font-weight-bold">*</span></label>
      <input name="gianhap" type="text" class="form-control" id="gianhap" aria-describedby="gianhap">
      {{$errors->first('gianhap')}}
    </div>

    <div class="mb-3">
      <label for="giaxuat" class="form-label">Giá xuất <span class="text-danger font-weight-bold">*</span></label>
      <input name="giaxuat" type="text" class="form-control" id="giaxuat" aria-describedby="giaxuat">
      {{$errors->first('giaxuat')}}
    </div>

    <div class="form-group">
      <label for="loai_id"><span class="text-danger font-weight-bold">*</span></label>
      <select id="loai_id" class="form-control custom-select" name="loai_id" >
          <option value="">-- Chọn loại sản phẩm --</option>
          @foreach($loai as $value)
              <option value="{{ $value->id }}">{{ $value->loai }}</option>
          @endforeach
      </select>
      {{$errors->first('loai_id')}}
    </div>


    <div class="form-group">
      <label for="noisanxuat_id"><span class="text-danger font-weight-bold">*</span></label>
      <select id="noisanxuat_id" class="form-control custom-select" name="noisanxuat_id" >
      <option value>--Chọn nơi sản xuất--</option>
      @foreach ($noisanxuat as $item)
      <option value="{{$item->id}}">{{$item->noisanxuat}}</option>
      @endforeach
    </select>
    {{$errors->first('noisanxuat_id')}}
    </div>

    <div class="form-group">
      <label for="baohanh_id"><span class="text-danger font-weight-bold">*</span></label>
      <select id="baohanh_id" class="form-control custom-select" name="baohanh_id" >
        <option selected>--Chọn thời gian bảo hành--</option>
        @foreach ($baohanh as $item)
        <option value="{{$item->id}}">{{$item->thoigianbaohanh}}</option>
        @endforeach
      </select>
      {{$errors->first('baohanh_id')}}
      </div>

      <div class="form-group">
        <label for="hang_id"><span class="text-danger font-weight-bold">*</span></label>
        <select id="hang_id" class="form-control custom-select" name="hang_id" >
          <option selected>--Chọn hãng--</option>
          @foreach ($hang as $item)
          <option value="{{$item->id}}">{{$item->hang}}</option>
          @endforeach
        </select>
        {{$errors->first('hang_id')}}
        </div>
        
        <div class="mb-3">
          <label for="video" class="form-label">Video <span class="text-danger font-weight-bold">*</span></label>
          <input name="video" type="text" class="form-control" id="video" aria-describedby="video">
          {{$errors->first('video')}}
        </div>
         

        <div class="mb-3">
          <label for="chitiet" class="form-label">Chi tiết</label>
          <textarea class="form-control ckeditor" name="chitiet" id="chitiet" cols="10" rows="1"></textarea>
          <div class="invalid-feedback"></div>
        </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection
@extends('layout.loadmin')
@section('main')
<div class="card">
  <div class="card-body">
      <form action="{{route('sanpham.update', $sanpham->id)}}" method="POST" enctype="multipart/form-data">
          @csrf @method('PUT')
          <div class="mb-3">
            <label for="hinhanh">Hình ảnh sản phẩm <span class="text-danger font-weight-bold">*</span></label>
            <img class="d-block" src="{{url('public/uploads')}}/{{$sanpham->anh}}"  width="30px"/>
            <input id="file_uploads" type="file" class="form-control @error('file_uploads') is-invalid @enderror" name="file_uploads" value="{{ $sanpham->anh }}" autocomplete="hinhanh" />
        </div>
        <div class="mb-3">
            <label for="loai_id"><span class="text-danger font-weight-bold">*</span></label>
            <select id="loai_id" class="form-control custom-select @error('loai_id') is-invalid @enderror" name="loai_id" required autofocus>
                <option value="">-- Chọn loại nhãn hiệu --</option>
                @foreach($loai as $value)
                    <option value="{{ $value->id }}" {{($sanpham->loai_id== $value->id)?'selected':'' }}>{{$value->loai}}</option>
                @endforeach
            </select>
         
        </div>

        <div class="mb-3">
            <label for="noisanxuat_id"><span class="text-danger font-weight-bold">*</span></label>
            <select id="noisanxuat_id" class="form-control custom-select @error('noisanxuat_id') is-invalid @enderror" name="noisanxuat_id" required autofocus>
                <option value="">-- Chọn xuất xứ --</option>
                @foreach($noisanxuat as $value)
                <option value="{{ $value->id }}" {{($sanpham->noisanxuat_id== $value->id)?'selected':'' }}>{{$value->noisanxuat}}</option>
                @endforeach
            </select>
         
        </div>
        <div class="mb-3">
            <label for="baohanh_id"><span class="text-danger font-weight-bold">*</span></label>
            <select id="baohanh_id" class="form-control custom-select @error('baohanh_id') is-invalid @enderror" name="baohanh_id" required autofocus>
                <option value="">--Chọn thời gian bảo hành--</option>
                @foreach($baohanh as $value)
                <option value="{{ $value->id }}" {{($sanpham->baohanh_id== $value->id)?'selected':'' }}>{{$value->thoigianbaohanh}}</option>
                @endforeach
            </select>
     
        </div>
        <div class="mb-3">
            <label for="hang_id"><span class="text-danger font-weight-bold">*</span></label>
            <select id="hang_id" class="form-control custom-select" name="hang_id" required autofocus>
                <option value="">--Chọn danh mục sản phẩm--</option>
                @foreach($hang as $value)
                <option value="{{ $value->id }}" {{($sanpham->hang_id== $value->id)?'selected':'' }}>{{$value->hang}}</option>
                @endforeach
            </select>
          
        </div>

        <div class="mb-3">
            <label for="video" class="form-label">Video <span class="text-danger font-weight-bold">*</span></label>
            <input name="video" type="text" value="{{$sanpham->video}}" class="form-control" id="video" aria-describedby="video">
            {{$errors->first('video')}}
          </div>

        <div class="mb-3">
            <label for="chitiet" class="form-label">Chi tiết</label>
            <textarea  class="form-control ckeditor" name="chitiet" id="chitiet">{{$sanpham->chitiet}}</textarea>
            <div class="invalid-feedback"></div>
        </div>
          
          <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
  </div>
</div>

@endsection
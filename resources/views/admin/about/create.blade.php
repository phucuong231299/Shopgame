@extends('layout.loadmin')
@section('main')
<div class="card" >
    <div class="card-body">
        <form action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="mb-3">
              <label for="anh" class="form-label">Chọn ảnh</label>
              <input  type="file" class="form-control" name="anh" id="anh" required >
             
            </div>
            <div class="mb-3">
              <label for="tuade" class="form-label">Tựa đề</label>
              <textarea type="text" style="width: 100%;height: 150px;" name="tuade" id="tuade" cols="10" rows="1"></textarea>
              <div class="invalid-feedback"></div>
            </div>

            <div class="mb-3">
              <label for="noidung" class="form-label">Nội dung</label>
              <textarea type="text" style="width: 100%;height: 300px;" name="noidung" id="noidung" cols="10" rows="1"></textarea>
              <div class="invalid-feedback"></div>
            </div>

            <div class="mb-3">
              <select name="status" class="form-select" aria-label="Default select example">
                <option selected>Chọn status</option>
                <option value="0">Ản</option>
                <option value="1">Hiển thị</option> 
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>
</div>

@endsection

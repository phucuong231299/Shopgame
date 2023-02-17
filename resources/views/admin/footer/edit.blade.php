@extends('layout.loadmin')
@section('main')
<div class="card" >
    <div class="card-body">
        <form action="{{route('footer.update',$footer->id)}}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

           <div class="mb-3">
              <label for="gioithieu" class="form-label">Giới thiệu</label>
              <textarea type="text" style="width: 100%;height: 150px;" name="gioithieu" id="gioithieu" cols="10" rows="1">{{$footer->gioithieu}}</textarea>
              <div class="invalid-feedback"></div>
            </div>
            <div class="mb-3">
              <label for="diachi" class="form-label">Địa chỉ</label>
              <textarea type="text" style="width: 100%;height: 150px;" name="diachi" id="diachi" cols="10" rows="1">{{$footer->diachi}}</textarea>
              <div class="invalid-feedback"></div>
            </div>

            <div class="mb-3">
              <label for="muahangtragop" class="form-label">Mua hàng trả góp</label>
              <textarea type="text" style="width: 100%;height: 300px;" name="muahangtragop" id="muahangtragop" cols="10" rows="1">{{$footer->muahangtragop}}</textarea>
              <div class="invalid-feedback"></div>
            </div>

            <div class="mb-3">
              <label for="thoigianlamviec" class="form-label">Thời gian làm việc</label>
              <textarea type="text" style="width: 100%;height: 150px;" name="thoigianlamviec" id="thoigianlamviec" cols="10" rows="1">{{$footer->thoigianlamviec}}</textarea>
              <div class="invalid-feedback"></div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>
</div>

@endsection

@extends('layout.loadmin')
@section('main')
<div class="card" >
    <div class="card-body">
        <form action="{{route('about2.update',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
              <label for="ten" class="form-label">Chọn ảnh</label>
              <img class="d-block" src="{{url('public/about2')}}/{{$data->anh}}"  width="30px"/>
              <input  type="file" class="form-control" name="anh" id="anh" >
              {{$errors->first('ten')}}
            </div>

            <div class="mb-3">
              <label for="tuade" class="form-label">Tựa đề</label>
              <textarea type="text" style="width: 100%;height: 150px;" name="tuade" id="tuade" cols="10" rows="1">{{$data->tuade}}</textarea>
              <div class="invalid-feedback"></div>
            </div>

          

            <div class="mb-3">
              <label for="noidung" class="form-label">Nội dung</label>
              <textarea type="text" style="width: 100%;height: 300px;" name="noidung" id="noidung" cols="10" rows="1">{{$data->noidung}}</textarea>
              <div class="invalid-feedback"></div>
            </div>

           

          

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>
</div>

@endsection

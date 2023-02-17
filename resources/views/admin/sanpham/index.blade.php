@extends('layout.loadmin')
@section('main')

<h5 class="card-header">Sản phẩm</h5>
<a href="{{route('sanpham.create')}}" style="background-color: purple; color: white;" type="button" class="btn btn-secondary mb-3">Thêm mới</a>
<a href="{{route('sanpham.xuat')}}" style="background-color: purple; color: white;" type="button" class="btn btn-secondary mb-3">Xuất ra excel</a> 
<a href="#nhap" data-bs-toggle="modal" data-bs-target="#importModal" style="background-color: purple; color: white;" type="button" class="btn btn-secondary mb-3">Nhập từ excel</a> 
<form action="{{route('sanpham.index')}}" class="form-inline">
<div style="width: 200px;" class="form-group ">
  <input class="form-control" name="tukhoa" placeholder="Nhập tên sản phẩm">
 </div>
<button type="submit" style="background-color: purple; color: white;"  class="btn btn-secondary ">Tìm Kiếm</button>
</form>
<hr>
<div class="table">
<table class="table table-bordered mb-0">
    <thead>
      <tr>
        <th  width="15%">id</th>
        <th  width="15%">Tên sản phẩm</th>
        <th  width="10%">Ảnh</th>
        <th  width="10%">thư viện ảnh</th>
        <th  width="10%">Số lượng</th>
        <th  width="10%">Giá nhập</th>
        <th  width="10%">Giá xuất</th>
        <th  width="25%">Loại</th>
        <th  width="8%">Nơi sản xuất</th>
        <th  width="15%">Bảo hành</th>
        <th  width="5%">Hãng</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($sanpham as $item)
      <tr> 
        <td>{{$item->id}}</td>
        <td contenteditable data-id="{{ $item->id }}"  class="sua_tensp">{{$item->tensp}}</td>
        <td><img src="{{url('public/uploads')}}/{{$item->anh}}" width="50px"></td>
        <td><a href="{{route('listanh.index' ,$item->id)}}" > thêm ảnh </a> </td>
        <td contenteditable data-id="{{ $item->id }}" class="sua_soluong">{{$item->soluong}}</td>
        <td contenteditable data-id="{{ $item->id }}" class="sua_gianhap">{{number_format($item->gianhap)}}<u>đ</u></td>
        <td contenteditable data-id="{{ $item->id }}" class="sua_giaxuat">{{number_format($item->giaxuat)}}<u>đ</u></td>
        <td>{{$item->loai->loai}}</td>
        <td>{{$item->noisanxuat->noisanxuat}}</td>
        <td>{{$item->baohanh->thoigianbaohanh}}</td>  
        <td>{{$item->hang->hang}}</td>
        @if(Auth::guard('user')->user()->chucvu_id==1)
        <td><a href="{{route('sanpham.edit', $item->id)}}" style="background-color: purple; color: white;" type="button" class="btn btn-secondary">Sửa</a></td>
        <td><a onclick="return confirm('Bạn có muốn xóa {{$item->tensp}} ?')" href="{{route('sanpham.delete', $item->id)}}" style="background-color: purple; color: white;" type="button" class="btn btn-secondary">Xóa</a></td>
        @else
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div>{{$sanpham->appends(request()->all())->links()}}</div>
<form action="{{ route('sanpham.nhap') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
 <div class="modal-body">
  <div class="mb-0">
  <label for="file_excel" class="form-label">Chọn tập tin Excel</label>
  <input type="file" class="form-control" id="file_excel" name="file_excel" required />
  </div>
  </div>
 <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fal fa-times"></i> Hủy bỏ</button>
  <button type="submit" class="btn btn-danger"><i class="fal fa-upload"></i> Nhập dữ liệu</button>
  </div>
  </div>
  </div>
  </div>
  </form>
  @endsection
  @section('js')
  <script>
      $(document).ready(function() {
          $(document).on('blur', '.sua_tensp', function() {
              var id = $(this).data('id');
              var tensp_value = $(this).text();
              var _token = "{{csrf_token()}}";
              $.ajax({
                  url: "{{ route('sua.sp') }}",
                  method: 'POST',
                  data: {
                      id: id,
                      tensp_value: tensp_value,
                      _token: _token
                  },
                  success: function(data) {
                    location.reload();
                  }
              });
          });
          $(document).on('blur', '.sua_soluong', function() {
              var id = $(this).data('id');
              var soluong_value = $(this).text();
              var _token = "{{csrf_token()}}";
              $.ajax({
                  url: "{{ route('sua.sp') }}",
                  method: 'POST',
                  data: {
                      id: id,
                      soluong_value: soluong_value,
                      _token: _token
                  },
                  success: function(data) {
                    location.reload();
                  }
              });
          });
          $(document).on('blur', '.sua_gianhap', function() {
              var id = $(this).data('id');
              var gianhap_value = $(this).text();
              var _token = "{{csrf_token()}}";
              $.ajax({
                  url: "{{ route('sua.sp') }}",
                  method: 'POST',
                  data: {
                      id: id,
                      gianhap_value: gianhap_value,
                      _token: _token
                  },
                  success: function(data) {
                    location.reload();
                  }
              });
          });
          $(document).on('blur', '.sua_giaxuat', function() {
              var id = $(this).data('id');
              var giaxuat_value = $(this).text();
              var _token = "{{csrf_token()}}";
              $.ajax({
                  url: "{{ route('sua.sp') }}",
                  method: 'POST',
                  data: {
                      id: id,
                      giaxuat_value: giaxuat_value,
                      _token: _token
                  },
                  success: function(data) {
                    location.reload();
                  }
              });
          });
      })
  </script>
  @endsection
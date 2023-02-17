@extends('layout.loadmin')
@section('main')

<h5 class="card-header">Huyện</h5>
<a href="{{route('huyen.create')}}" style="background-color: purple; color: white;" type="button" class="btn btn-secondary mb-3">Thêm mới</a>
<a href="#nhap" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#importModal"><i class="fal fa-upload"></i> Nhập từ Excel</a>
<div class="table">
  <table id="ehuyenmple1" class="table table-bordered mb-0">
    <thead >
      <tr>
        <th scope="col">Mã huyện</th>
        <th scope="col">Tên huyện</th>
        <th scope="col">Tên tĩnh</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($huyen as $item)
      <tr>
        
        <td>{{$item->mahuyen}}</td>
        <td>{{$item->tenhuyen}}</td>
        <td>{{$item->tinh->tentinh}}</td>
        @if(Auth::guard('user')->user()->chucvu_id==1)
        <td><a href="{{route('huyen.edit', $item->mahuyen)}}" style="background-color: purple; color: white;" type="button" class="btn btn-secondary btn-sua">Sửa</a></td>
        <td><a onclick="return confirm('Bạn có muốn xóa {{$item->tenhuyen}} ?')" href="{{route('huyen.delete', $item->mahuyen)}}" style="background-color: purple; color: white;" type="button" class="btn btn-secondary">Xóa</a></td>
        @else
        @endif
      </tr>
      @endforeach
    </tbody>
</table>
</div>
 
<form action="{{ route('huyen.nhap') }}" method="post" enctype="multipart/form-data">
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
  {{-- @section('js')
  <script>
    $(document).ready(function () {
      $(document).on('click','.btn-sua',function(e){
        e.preventDefault();
        alert('asda');
      })
    });
  </script>
  @endsection --}}
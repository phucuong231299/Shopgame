@extends('layout.loadmin')
@section('main')

<h5 class="card-header">Nhân viên</h5>
<a href="{{route('nhanvien.create')}}" style="background-color: purple; color: white;" type="button" class="btn btn-secondary mb-3">Thêm mới</a>
<div class="table">
  <table class="table table-bordered mb-0">
    <thead>
      <tr>
        <th  width="10%">ID</th>
        <th  width="10%">Họ và tên</th>
        <th  width="10%">Giới tính</th>
        <th width="10%">Ngày sinh</th>
        <th width="10%">Địa chỉ</th>
        <th  width="10%">SĐT</th>
        <th width="10%">CMND</th>
        <th width="10%">Ảnh</th>
        <th width="10%">Quyền</th>
        @if(Auth::guard('user')->user()->chucvu_id==1)
        <th width="10%">Tên đăng nhập</th>
        @endif
      </tr>
    </thead>
    <tbody>
        @foreach ($nhanvien as $item)    
      <tr> 
        <td width="5%">{{$item->id}}</td>
        <td width="10%">{{$item->hoten}}</td>
        <td>
          @if ($item->gioitinh==0)
              Nam
              
          @else
              Nữ
          @endif
      </td>
        <td width="10%">{{$item->ngaysinh}}</td>
        <td width="10%">{{$item->diachi}}</td>
        <td width="10%">{{$item->sdt}}</td>
        <td width="10%">{{$item->cmnd}}</td>
        <td><img src="{{url('public/nhanvien')}}/{{$item->anh}}" width="50px"></td>
        <td width="10%">{{$item->chucvu->tenchucvu}}</td>
        
        @if(Auth::guard('user')->user()->chucvu_id==1)
        <td width="10%">{{$item->tendangnhap}}</td>
        <td width="10%"><a href="{{route('nhanvien.edit', $item->id)}}" style="background-color: purple; color: white;" type="button" class="btn btn-secondary">Sửa</a></td>
        <td width="5%"><a onclick="return confirm('Bạn có muốn xóa {{$item->hoten}} ?')" href="{{route('nhanvien.delete', $item->id)}}" style="background-color: purple; color: white;" type="button" class="btn btn-secondary">Xóa</a></td>
        @else
        @endif
      </tr>
      @endforeach
    </tbody>
    </tbody>
  </table>
</div>


@endsection
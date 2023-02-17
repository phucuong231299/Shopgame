@extends('layout.loadmin')
@section('main')
<div class="container">
    <h4>Thông tin nhân viên</h4>
<div class="heading_s1 mt-4">
    
    @if (Auth::guard('user')->user()->anh=='')
    <img style="width: 100px; border-radius:20px;" src="{{url('public/user/avatar.jpeg')}}" >
    @else
    <img style="width: 100px; border-radius:20px;" src="{{url('public/nhanvien')}}/{{Auth::guard('user')->user()->anh}}" >
    @endif
   
</div>

</div>
    <div class="main_content">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#thongtin">
                            Đổi thông tin
                        </button>

                        <form  method="post">
                          @csrf
                         
                           
                          <div class="form-group">
                              <label for="hoten" class="form-label">Họ và tên</label>
                                <input style="color: black;" disabled value="{{Auth::guard('user')->user()->hoten}}" type="text" required class="form-control" >
                            </div>
                            <div class="form-group">
                              <label for="diachi" class="form-label">Địa chỉ</label>
                                <input style="color: black;" disabled value="{{Auth::guard('user')->user()->diachi}}" class="form-control" required type="text" >
                            </div>
                            <div class="form-group">
                              <label for="sdt" class="form-label">SĐT</label>
                                <input style="color: black;" disabled value="{{Auth::guard('user')->user()->sdt}}" class="form-control" required type="number" >
                            </div>
                           
                          
                        </form>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gioitinh"  class="form-label">Giới tính: </label>
                           @if (Auth::guard('user')->user()->gioitinh==0)
                              <a style="color: black">Nam</a> 
                           
                            @else
                            <a style="color: black">Nữ</a> 
                            
                           @endif
                        </div>
                        <div class="form-group">
                            <label for="diachi" class="form-label">Ngày sinh</label>
                              <input style="color: black;" disabled value="{{Auth::guard('user')->user()->ngaysinh}}" class="form-control" required type="date" >
                        </div>
                        <div class="form-group">
                            <label for="diachi" class="form-label">CMND</label>
                              <input style="color: black;" disabled value="{{Auth::guard('user')->user()->cmnd}}" class="form-control" required type="text" >
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input style="color: black;" disabled value="{{Auth::guard('user')->user()->email}}" class="form-control" required type="text"  >
                          </div>

                    </div>
                    <!-- Button trigger modal -->
                   
                
                <!-- Modal -->
                    <div class="modal fade" id="thongtin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Đổi thông tin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="thongtin-error">
                                </div>
                                <form action="{{route('user.update', $user->id)}}" method="POST" id="upload-form" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <label for="file_anh">Ảnh đại diện<span class="text-danger font-weight-bold">*</span></label>
                                            <input id="file_anh" type="file" class="form-control "  name="file_anh" value="{{ old('file_anh') }}"  autocomplete="file_anh" />

                                        </div>
                                   
                                        <div class="form-group">
                                            <label for="TieuDe" class="form-label">Họ và tên</label>
                                            <input id="hoten" type="text" value="{{$user->hoten}}" class="form-control" id="hoten" name="hoten" required>
                                            {{$errors->first('hoten')}}
                                        </div>
                        
                                        <div class="form-group">
                                        <label for="gioitinh">Giới tính <span class="text-danger font-weight-bold">*</span></label>
                                        <select  id="gioitinh" class="custom-select form-control @error('gioitinh') is-invalid @enderror" id="gioitinh" name="gioitinh" required>
                                            <option value="">-- Choose --</option>
                                            <option value="0">Nam</option>
                                            <option value="1" selected="selected">Nữ</option>
                                        </select>
                                        {{$errors->first('gioitinh')}}
                                        </div>
                                        <div class="form-group">
                                            <label for="sdt" class="form-label">SĐT</label>
                                            <input id="sdt"  value="{{$user->sdt}}" type="text"  class="form-control" id="sdt" name="sdt" required >
                                            {{$errors->first('sdt')}}
                                        </div>
                                        <div class="form-group">
                                            <label for="cmnd" class="form-label">CMND</label>
                                            <input  id="cmnd" value="{{$user->cmnd}}" type="text"  class="form-control" id="cmnd" name="cmnd" required>
                                            {{$errors->first('cmnd')}}
                                        </div>
                                        <div class="form-group">
                                            <label for="ngaysinh" class="form-label">Ngày sinh</label>
                                            <input id="ngaysinh" value="{{$user->ngaysinh}}" type="date"  class="form-control" id="ngaysinh" name="ngaysinh" required>
                                            {{$errors->first('ngaysinh')}}
                                        </div>
                            
                                        <div class="form-group">
                                            <label for="diachi" class="form-label">Địa chỉ</label>
                                            <input id="diachi" value="{{$user->diachi}}" type="text"  class="form-control" id="diachi" name="diachi" required>
                                            {{$errors->first('diachi')}}
                                        </div>
                                        <div class="form-group">
                                            <label for="diachi" class="form-label">Email</label>
                                            <input id="email" value="{{$user->email}}" type="email"  class="form-control" id="diachi" name="email" required>
                                            {{$errors->first('email')}}
                                        </div>
                                        
                                    <button id="btn-doithongtin" type="submit" class="btn btn-primary">Lưu</button>
                        
                                  </form>
                                
                            </div>
                        </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
       $(document).ready(function () {
           $('#upload-form').on('submit',function(e){
               e.preventDefault();
               $.ajax({
                   type: "POST",
                   url: "{{route('admin.update')}}",
                   data: new FormData(this),
                   dataType: 'JSON',
                   contentType:false,
                   cache:false,
                   processData:false,
                   success: function (response) {
                    if(response.error){
                        
                        var _html_loi='<div class="alert alert-danger" role="alert"><button class="close" data-bs-dismiss="alert" aria-hidden="true">&times;</button>';
                        for(let error1 of response.error){
                            _html_loi+=` <li>${error1}</li>`;
                        }
                        _html_loi+='</div>';
                        $('#thongtin-error').html(_html_loi);

                    }
                    else{
                        $('#thongtin').modal('hide');
                        alert('Cập nhật thành công')
                        location.reload();
                    }
                   }
               });
           })
           
       });
    </script>
@endsection
 
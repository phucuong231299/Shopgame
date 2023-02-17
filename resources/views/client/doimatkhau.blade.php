@extends('layout.louser')
@section('main')
    <div style="color: black;" class="main_content">
        <div style="color: black;" class="login_register_wrap section">
            <div style="color: black;" class="container">
                <div style="color: black;" class="row justify-content-center">
                    <div style="color: black;" class="col-xl-6 col-md-10">
                        <div style="color: black;" class="login_wrap">
                            <div style="color: black;" class="padding_eight_all bg-white">
                                <div style="color: black;" class="heading_s1">
                                    <h3 style="color: black;">Đổi mật khẩu</h3>
                                </div>
                                <div id="doimatkhau-error"></div>
                                <form id="form-doimatkhau" action="{{route('client.postdoimatkhau')}}" method="POST">
                                  @csrf
                                
                                    <div class="form-group">
                                        <input style="color: black;" class="form-control"  type="password" name="password_cu" placeholder="Nhập mật khẩu cũ">
                                    </div>
                                    
                                    <div class="form-group">
                                        <input style="color: black;" class="form-control"  type="password" name="password_moi" placeholder="Mật khẩu mới">
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <input style="color: black;" class="form-control"  type="password" name="password_xacnhan" placeholder="Xác nhận Mật khẩu">
                                        
                                    </div>

                                    {{-- <div class="login_footer form-group">
                                        <a href="{{route('home.quenmatkhau')}}">Quên mật khẩu?</a>
                                    </div> --}}

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-secondary" >Đổi mật khẩu</button>
                                    </div>
                                </form>
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
            $('#form-doimatkhau').on('submit',function(e){
                e.preventDefault();
                var action=$(this).attr('action');
                var data=$(this).serialize();
                
                $.post(action,data,function(res){
                    if(res.code==200){
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: res.message,
                        showConfirmButton: false,
                        timer: 3000
                        });
                        location.replace("{{route('client.index')}}");
                    }
                    else{
                        var html='';
                       
                            html+='<div class="alert alert-danger" role="alert">'+res.error+'</div>';

                        
                        $('#doimatkhau-error').html(html);
                    }
                })
            })

        </script>
        
    @endsection
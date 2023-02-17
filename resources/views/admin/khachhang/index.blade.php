@extends('layout.loadmin')
@section('main')
    <h5 class="card-header">Khách hàng</h5>
    <?php
    $message = Session::get('message');
    if ($message) {
        echo '<span class="text-alert">' . $message . '</span>';
        Session::put('message', null);
    }
    ?>
    <div class="card-body">
        <a href="{{ route('khachhang.create') }}" style="background-color: purple; color: white;" type="button"
            class="btn btn-secondary mb-3">Thêm mới</a>
        <div class>
            <ul id="thongbaoloi"></ul>
            <table class="table table-bordered table-hover mb-0">
                <thead>
                    <tr>
                        <th width="1%">ID</th>
                        <th width="20%">Họ và tên</th>
                        <th width="5%">Giới tính</th>
                        <th width="10%">SĐT</th>
                        <th width="10%">CMND</th>
                        <th width="20%">Ngày sinh</th>
                        <th width="30%">Địa chỉ</th>
                        <th width="10%">Ảnh</th>
                        <th width="10%">email</th>
                        @if (Auth::guard('user')->user()->chucvu_id == 1)
                        <th width="10%">Tên đăng nhập</th>
                        @endif
                    </tr>
                </thead>
                @foreach ($khachhang as $item)
                    <tr>
                        <td width="5%">{{ $item->id }}</td>
                        <td contenteditable data-id="{{ $item->id }}" id="hoten" class="sua_hoten" width="10%">
                            {{ $item->hoten }} <span id="error_hoten"></span></td>
                        <td>
                            @if ($item->gioitinh == 0)
                                Nam
                            @else
                                Nữ
                            @endif
                        </td>
                        <td contenteditable data-id="{{ $item->id }}" class="sua_sdt" width="10%">
                            {{ $item->sdt }}  </td>
                        <td contenteditable data-id="{{ $item->id }}" class="sua_cmnd" width="10%">
                            {{ $item->cmnd }} </td>
                        <td width="10%">{{ $item->ngaysinh }}</td>
                        <td contenteditable data-id="{{ $item->id }}" class="sua_diachi" width="10%">
                            {{ $item->diachi }}</td>
                        <td><img src="{{ url('public/khachhang') }}/{{ $item->anh }}" width="50px"></td>
                        <td width="10%">{{ $item->email }}</td>
                      
                        {{-- <td>{{$item->password}}</td> --}}
                        @if (Auth::guard('user')->user()->chucvu_id == 1)
                        <td contenteditable data-id="{{ $item->id }}" class="sua_tendangnhap" width="10%">
                            {{ $item->tendangnhap }}</td>
                            <td width="5%"><a href="{{ route('khachhang.edit', $item->id) }}"
                                    style="background-color: purple; color: white;" type="button"
                                    class="btn btn-secondary">Sửa</a></td>
                            <td width="5%"><a onclick="return confirm('Bạn có muốn xóa {{ $item->hoten }} ?')"
                                    href="{{ route('khachhang.delete', $item->id) }}"
                                    style="background-color: purple; color: white;" type="button"
                                    class="btn btn-secondary">Xóa</a></td>
                        @else
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $(document).on('blur', '.sua_hoten', function() {
                var id = $(this).data('id');
                var hoten_value = $(this).text();
                var _token = "{{ csrf_token() }}";
                $.ajax({
                    url: "{{ route('sua.hotenkh') }}",
                    method: 'POST',
                    data: {
                        id: id,
                        hoten_value: hoten_value,
                        _token: _token
                    },
                    success: function(data) {
                        if (data.code == 200) {
                            $('#thongbaoloi').html('');
                            const Msg = Swal.mixin({
                                position: 'center',
                                icon: 'success',
                                title: 'Cập nhật thành công',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            //end
                            Msg.fire({

                                type: 'success',
                                title: 'Cập nhật thành công',

                            });

                        } else {
                            let mess = '';
                            for (let error of data.error) {
                                mess += '';
                                mess +=
                                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                mess += '<strong>' + error + '';

                                mess += ' </div>';
                                mess += '';
                            }
                            $('#thongbaoloi').html(mess);



                        }
                    }
                });

            });
            $(document).on('blur', '.sua_sdt', function() {
                var id = $(this).data('id');
                var sdt_value = $(this).text();
                var _token = "{{ csrf_token() }}";
                $.ajax({
                    url: "{{ route('sua.sdtkh') }}",
                    method: 'POST',
                    data: {
                        id: id,
                        sdt_value: sdt_value,
                        _token: _token
                    },
                    success: function(data) {
                        if (data.code == 200) {
                            $('#thongbaoloi').html('');
                            const Msg = Swal.mixin({
                                position: 'center',
                                icon: 'success',
                                title: 'Cập nhật thành công',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            //end
                            Msg.fire({

                                type: 'success',
                                title: 'Cập nhật thành công',

                            });

                        } else {
                            let mess = '';
                            for (let error of data.error) {
                                mess += '';
                                mess +=
                                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                mess += '<strong>' + error + '';

                                mess += ' </div>';
                                mess += '';
                            }
                            $('#thongbaoloi').html(mess);



                        }
                    }
                });
            });
            $(document).on('blur', '.sua_cmnd', function() {
                var id = $(this).data('id');
                var cmnd_value = $(this).text();
                var _token = "{{ csrf_token() }}";
                $.ajax({
                    url: "{{ route('sua.cmndkh') }}",
                    method: 'POST',
                    data: {
                        id: id,
                        cmnd_value: cmnd_value,
                        _token: _token
                    },
                    success: function(data) {
                        if (data.code == 200) {
                            $('#thongbaoloi').html('');
                            const Msg = Swal.mixin({
                                position: 'center',
                                icon: 'success',
                                title: 'Cập nhật thành công',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            //end
                            Msg.fire({

                                type: 'success',
                                title: 'Cập nhật thành công',

                            });

                        } else {
                            let mess = '';
                            for (let error of data.error) {
                                mess += '';
                                mess +=
                                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                mess += '<strong>' + error + '';

                                mess += ' </div>';
                                mess += '';
                            }
                            $('#thongbaoloi').html(mess);



                        }
                    }
                });
            });
            $(document).on('blur', '.sua_diachi', function() {
                var id = $(this).data('id');
                var diachi_value = $(this).text();
                var _token = "{{ csrf_token() }}";
                $.ajax({
                    url: "{{ route('sua.diachikh') }}",
                    method: 'POST',
                    data: {
                        id: id,
                        diachi_value: diachi_value,
                        _token: _token
                    },
                    success: function(data) {
                        if (data.code == 200) {
                            $('#thongbaoloi').html('');
                            const Msg = Swal.mixin({
                                position: 'center',
                                icon: 'success',
                                title: 'Cập nhật thành công',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            //end
                            Msg.fire({

                                type: 'success',
                                title: 'Cập nhật thành công',

                            });

                        } else {
                            let mess = '';
                            for (let error of data.error) {
                                mess += '';
                                mess +=
                                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                mess += '<strong>' + error + '';

                                mess += ' </div>';
                                mess += '';
                            }
                            $('#thongbaoloi').html(mess);



                        }
                    }
                });
            });
            $(document).on('blur', '.sua_tendangnhap', function() {
                var id = $(this).data('id');
                var tendangnhap_value = $(this).text();
                var _token = "{{ csrf_token() }}";
                $.ajax({
                    url: "{{ route('sua.tendangnhapkh') }}",
                    method: 'POST',
                    data: {
                        id: id,
                        tendangnhap_value: tendangnhap_value,
                        _token: _token
                    },
                    success: function(data) {
                        if (data.code == 200) {
                            $('#thongbaoloi').html('');
                            const Msg = Swal.mixin({
                                position: 'center',
                                icon: 'success',
                                title: 'Cập nhật thành công',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            //end
                            Msg.fire({

                                type: 'success',
                                title: 'Cập nhật thành công',

                            });

                        } else {
                            let mess = '';
                            for (let error of data.error) {
                                mess += '';
                                mess +=
                                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                mess += '<strong>' + error + '';

                                mess += ' </div>';
                                mess += '';
                            }
                            $('#thongbaoloi').html(mess);



                        }
                    }
                });
            });
        })
    </script>
@endsection

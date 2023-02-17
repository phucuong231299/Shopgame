@extends('layout.loadmin')
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header style="text-align: center" class="panel-heading">
                   THÊM THƯ VIỆN ẢNH
                </header>
                <br>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>

                <form action=" {{ route('insert.listanh', $sanpham_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                            <input type="file" id="file" class="form-control" name="file[]" accept="image/*" multiple>
                            <span id="error_listanh"></span>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="uploads" name="taianh" value="Tải ảnh" class="btn btn-success">
                        </div>
                    </div>
                </form>
                <div class="panel-body">
                    <input type="hidden" value="{{ $sanpham_id }}" name="sanpham_id" class="sanpham_id">
                    <form>
                        @csrf
                        <div id="load_listanh">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Tên hình ảnh</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    @endsection
    @section('js')
        <script>
            $(document).ready(function() {
                load_listanh();

                function load_listanh() {
                    var sanpham_id = $('.sanpham_id').val();
                    var _token = $('input[name="_token"]').val();
                    // alert(sanpham_id);
                    $.ajax({
                        url: "{{ route('them.listanh') }}",
                        method: "POST",
                        data: {
                            sanpham_id: sanpham_id,
                            _token: _token
                        },
                        success: function(data) {
                            $('#load_listanh').html(data);
                        }
                    });
                }


                $('#file').change(function() {
                    var error = '';
                    var files = $('#file')[0].files;
                    if (files.length > 3) {
                        error += '<p>bạn chọn tối đa chỉ được 3 ảnh</p>';
                    } else if (files.length == '') {
                        error += '<p>bạn không được bỏ trống trường này</p>';
                    } else if (files.size > 2000000) {
                        error += '<p>file ảnh không được lớn hơn 2MB</p>';
                    }

                    if (error == '') {

                    } else {
                        $('#file').val('');
                        $('#error_listanh').html('<span class="text-danger">' + error + '</span>');
                        return false;
                    }
                });

                $(document).on('blur', '.edit_tenanh', function() {
                    var id = $(this).data('id');
                    var gal_text = $(this).text();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('sua.tenanh') }}",
                        method: "POST",
                        data: {
                            id: id,
                            gal_text: gal_text,
                            _token: _token
                        },
                        success: function(data) {
                            load_listanh();
                            $('#error_listanh').html(
                                '<span class="text-danger">Cập nhật tên hình ảnh thành công</span>'
                                );
                        }
                    });
                });
                $(document).on('click', '.delete-listanh', function() {
                    var id = $(this).data('id');
                    var _token = $('input[name="_token"]').val();
                    if (confirm('Bạn muốn xóa hình ảnh này không?')) {
                        $.ajax({
                            url: "{{ route('xoa.anh') }}",
                            method: "POST",
                            data: {
                                id: id,
                                _token: _token
                            },
                            success: function(data) {
                                load_listanh();
                                $('#error_listanh').html(
                                    '<span class="text-danger">Cập nhật tên hình ảnh thành công</span>'
                                    );
                            }
                        });
                    }
                });
            });
        </script>
    @endsection

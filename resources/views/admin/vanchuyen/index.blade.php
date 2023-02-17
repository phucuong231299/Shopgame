@extends('layout.loadmin')
@section('main')
    <h5 class="card-header">Vận chuyển</h5>
    {{-- <a href="{{ route('vanchuyen.create') }}" style="background-color: purple; color: white;" type="button"
        class="btn btn-primary">Thêm mới</a> --}}

    <form>
        @csrf
        <div class="mb-3">
            <label for="tinh">Tĩnh <span class="text-danger font-weight-bold">*</span></label>
            <select class="custom-select form-control chon tinh" id="tinh" name="tinh">
                <option value="">-- Chọn tĩnh --</option>
                @foreach ($tinh as $value)
                    <option value="{{ $value->matinh }}">{{ $value->tentinh }}</option>
                @endforeach
            </select>
            {{ $errors->first('tinh') }}
        </div>

        <div class="mb-3">
            <label for="huyen">Huyện <span class="text-danger font-weight-bold">*</span></label>
            <select class="custom-select form-control huyen chon" id="huyen" name="huyen">
                <option value="">-- Chọn Huyện --</option>
                {{-- @foreach ($huyen as $value)
      <option value="{{ $value->mahuyen }}">{{ $value->tenhuyen }}</option>
  @endforeach --}}
            </select>
            {{ $errors->first('huyen') }}
        </div>

        <div class="mb-3">
            <label for="xa">Xã <span class="text-danger font-weight-bold">*</span></label>
            <select class="custom-select form-control xa" id="xa" name="xa">
                <option value="">-- Chọn Xã --</option>
                {{-- @foreach ($xa as $value)
      <option value="{{ $value->maxa }}">{{ $value->tenxa }}</option>
  @endforeach --}}
            </select>
            {{ $errors->first('xa') }}
        </div>

        <div class="mb-3">
            <label for="sotien" class="form-label">Số tiền <span class="text-danger font-weight-bold">*</span></label>
            <input name="sotien" type="number" class="form-control sotien" id="sotien" aria-describedby="sotien">
            {{ $errors->first('sotien') }}
        </div>

        <button style="background-color: purple; color: white;" type="button" class="btn btn-primary themvanchuyen">Thêm phí
            vận chuyển</button>
    </form>

    <ul id="thongbaoloi"></ul>
    <div id="load_vanchuyen">

        {{-- <div class="table">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tĩnh</th>
                        <th scope="col">Huyện</th>
                        <th scope="col">Xã</th>
                        <th scope="col">số tiền</th>

                    </tr>
                </thead>
                @foreach ($vanchuyen as $item)
                    <tr>

                        <td>{{ $item->id }}</td>
                        <td>{{ $item->tinh->tentinh }}</td>
                        <td>{{ $item->huyen->tenhuyen }}</td>
                        <td>{{ $item->xa->tenxa }}</td>
                        <td>{{ $item->sotien }}</td>
                        @if (Auth::guard('user')->user()->chucvu_id == 1)
                            <td><a href="{{ route('vanchuyen.edit', $item->id) }}"
                                    style="background-color: purple; color: white;" type="button"
                                    class="btn btn-secondary">Sửa</a></td>
                            <td><a onclick="return confirm('Bạn có muốn xóa {{ $item->vanchuyen }} ?')"
                                    href="{{ route('vanchuyen.delete', $item->id) }}"
                                    style="background-color: purple; color: white;" type="button"
                                    class="btn btn-primary">Xóa</a></td>
                        @else
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> --}}
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            fetch_vanchuyen();
            function fetch_vanchuyen() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('hien.vanchuyen') }}",
                    method: 'POST',
                    data: {
                        _token: _token
                    },
                    success: function(data) {
                        $('#load_vanchuyen').html(data);
                    }
                });
            }
            $(document).on('blur', '.sotien_sua', function() {
                var id = $(this).data('id');
                var sotien_value = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('sua.vanchuyen') }}",
                    method: 'POST',
                    data: {
                        id: id,
                        sotien_value: sotien_value,
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
                            location.reload();
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
            $('.themvanchuyen').click(function() {
                var tinh = $('.tinh').val();
                var huyen = $('.huyen').val();
                var xa = $('.xa').val();
                var sotien = $('.sotien').val();
                var _token = $('input[name="_token"]').val();
                // alert(tinh);
                // alert(huyen);
                // alert(xa);
                // alert(sotien);
                $.ajax({
                    url: "{{ route('them.vanchuyen') }}",
                    method: 'POST',
                    data: {
                        tinh: tinh,
                        huyen: huyen,
                        xa: xa,
                        sotien: sotien,
                        _token: _token
                    },
                    success: function(data) {
                        fetch_vanchuyen();
                    }
                });
            });
            $('.chon').change(function() {
                var action = $(this).attr('id');
                var matinh = $(this).val();
                var _token = $('input[name="_token"]').val();
                var $result = '';
                // alert(action);
                // alert(matinh);
                // alert(_token);
                if (action == 'tinh') {
                    result = 'huyen';
                } else {
                    result = 'xa';
                }
                $.ajax({
                    url: "{{ route('chon.vanchuyen') }}",
                    method: 'POST',
                    data: {
                        action: action,
                        matinh: matinh,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        })
    </script>
@endsection

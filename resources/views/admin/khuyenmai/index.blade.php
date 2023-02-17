@extends('layout.loadmin')
@section('main')
    <h5 class="card-header">Khuyến Mãi</h5>
    <a href="{{ route('khuyenmai.create') }}" style="background-color: purple; color: white;" type="button"
        class="btn btn-secondary mb-3">Thêm mới</a>
    <ul id="thongbaoloi"></ul>
    <div class="table">
        <table class="table table-bordered mb-0">
            <thead>
                <tr>
                    <th scope="col">Tên Khuyến mãi</th>
                    <th scope="col">Ngày sản xuất</th>
                    <th scope="col">Hạn sử dụng</th>
                    <th scope="col">Mã Khuyến mãi</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Số tiền giảm</th>
                    <th scope="col">Hết hạng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($khuyenmai as $item)
                    <tr>
                        <td>{{ $item->tenkhuyenmai }}</td>
                        <td>{{ $item->nsx }}</td>
                        <td>{{ $item->hsd }}</td>
                        <td>{{ $item->makhuyenmai }}</td>
                        <td>

                            <form action="   {{ route('khuyenmai.sua', $item->id) }}">
                                @csrf @method('PUT')
                                <select class="custom-select form-control" id="status" name="status">
                                    @if ($item->status == 1)
                                        <option value="{{ $item->status }}">Đang hoạt động</option>
                                        <option value="0">Ngừng hoạt động</option>
                                    @else
                                        <option value="{{ $item->status }}">Ngừng hoạt động</option>
                                        <option value="1">Hoạt động</option>
                                    @endif
                                </select>
                                <button type="submit" style="background-color: purple; color: white;"
                                    class="btn btn-secondary">Cập nhật</button>
                            </form>
                        </td>
                        <td contenteditable data-id="{{ $item->id }}" class="sua_tiengiam">
                            {{ number_format($item->tiengiam) }}<u>đ</u></td>
                        <td>
                            @if ($item->hsd >= $today)
                                <span style="color: green">Còn hạng</span>
                            @else
                                <span style="color: red">Hết hạng</span>
                            @endif


                        </td>
                        @if (Auth::guard('user')->user()->chucvu_id == 1)
                            <td><a href="{{ route('khuyenmai.edit', $item->id) }}"
                                    style="background-color: purple; color: white;" type="button"
                                    class="btn btn-secondary">Sửa</a></td>
                            <td><a onclick="return confirm('Bạn có muốn xóa {{ $item->tenkhuyenmai }} ?')"
                                    href="{{ route('khuyenmai.delete', $item->id) }}"
                                    style="background-color: purple; color: white;" type="button"
                                    class="btn btn-secondary">Xóa</a></td>
                        @else
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $(document).on('blur', '.sua_tiengiam', function() {
                var id = $(this).data('id');
                var tiengiam_value = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('sua.khuyenmai') }}",
                    method: 'POST',
                    data: {
                        id: id,
                        tiengiam_value: tiengiam_value,
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
        })
    </script>
@endsection

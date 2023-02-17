@extends('layout.loadmin')
@section('main')
    <h5 class="card-header">Tên Loại</h5>
    <a href="{{ route('loai.create') }}" style="background-color: purple; color: white;" type="button"
        class="btn btn-secondary">Thêm mới</a>
        <form action="{{route('loai.index')}}" class="form-inline">
            <div style="width: 200px;" class="form-group ">
              <input class="form-control" name="tukhoa" placeholder="Nhập tên loại">
             </div>
            <button type="submit" style="background-color: purple; color: white;"  class="btn btn-secondary ">Tìm Kiếm</button>
            </form>
            <ul id="thongbaoloi"></ul>
    <div class="table">
        <table class="table table-bordered mb-0">
            <thead>
                <tr>
                    
                    <th scope="col">Tên Loại</th>
                    <th scope="col">Trạng thái</th>
                    
                </tr>
            </thead>
            @foreach ($loai as $item)
                <tr>
                    
                    <td contenteditable data-id="{{ $item->id }}" class="sua_loai">{{ $item->loai }}</td>
                    <td>
                        <form action="{{ route('loai.sua', $item->id) }}">
                            @csrf @method('PUT')
                            <select class="custom-select form-control" id="trangthai" name="trangthai">
                                @if ($item->trangthai == 0)
                                    <option value="{{$item->trangthai}}">hiển thị</option>
                                    <option value="1">không hiển thị</option>
                                @else
                                    <option value="{{$item->trangthai}}">không hiển thị</option>
                                    <option value="0">hiển thị</option>
                                @endif
                            </select>
                            <button type="submit" style="background-color: purple; color: white;" class="btn btn-secondary">Cập nhật</button>
                        </form>
                    </td>
                    @if (Auth::guard('user')->user()->chucvu_id == 1)
                        {{-- <td><a href="{{ route('loai.edit', $item->id) }}" style="background-color: purple; color: white;"
                                type="button" class="btn btn-secondary">Sửa</a></td> --}}
                        <td><a onclick="return confirm('Bạn có muốn xóa {{ $item->loai }} ?')"
                                href="{{ route('loai.delete', $item->id) }}"
                                style="background-color: purple; color: white;" type="button"
                                class="btn btn-secondary">Xóa</a></td>
                    @else
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>{{$loai->appends(request()->all())->links()}}</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $(document).on('blur', '.sua_loai', function() {
            var id = $(this).data('id');
            var loai_value = $(this).text();
            var _token = "{{csrf_token()}}";
            $.ajax({
                url: "{{ route('sua.loai') }}",
                method: 'POST',
                data: {
                    id: id,
                    loai_value: loai_value,
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

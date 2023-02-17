@extends('layout.loadmin')
@section('main')

<h5 class="card-header">Tên Hãng</h5>
<a href="{{route('hang.create')}}" style="background-color: purple; color: white;" type="button" class="btn btn-secondary">Thêm mới</a>
<ul id="thongbaoloi"></ul>
<div class="table">
  <table class="table table-bordered mb-0">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tên Hãng</th>
       
      </tr>
    </thead>
        @foreach ($hang as $item)
      <tr>
        
        <td>{{$item->id}}</td>
        <td contenteditable data-id="{{ $item->id }}" class="sua_hang">{{$item->hang}}</td>
        @if(Auth::guard('user')->user()->chucvu_id==1)
        {{-- <td><a href="{{route('hang.edit', $item->id)}}" style="background-color: purple; color: white;" type="button" class="btn btn-secondary">Sửa</a></td> --}}
        <td><a onclick="return confirm('Bạn có muốn xóa {{$item->hang}} ?')" href="{{route('hang.delete', $item->id)}}" style="background-color: purple; color: white;" type="button" class="btn btn-secondary">Xóa</a></td>
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
            $(document).on('blur', '.sua_hang', function() {
                var id = $(this).data('id');
                var hang_value = $(this).text();
                var _token = "{{csrf_token()}}";
                $.ajax({
                    url: "{{ route('sua.hang') }}",
                    method: 'POST',
                    data: {
                        id: id,
                        hang_value: hang_value,
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
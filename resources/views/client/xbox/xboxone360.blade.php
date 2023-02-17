@extends('layout.lousergame')
@section('main')
    <br>
    <h1 class="title page-title">MÁY XBOX ONE | XBOX 360 </h1>
    {{-- <div class="main_content"> --}}
    <div class="row">
        @foreach ($sanpham as $item)
        @if ($item->soluong>=1 &&$item->hang->id==3 &&$item->loai->id==13)
                <div class="row row-cols-1 row-cols-md-3 g-4" style="width: 350px;">
                    <div class="col">
                        <div class="card h-100">
                            @if ($item->soluong >= 1)
                                <a href="{{route('client.chitiet',$item->id)}}" type="button" class="btn btn-outline-light chitiet-sanpham">
                                    <img src="{{ url('public/uploads') }}/{{ $item->anh }}" style="text-align:center;"
                                        style="text-align:center; width: 250px; height: 300px;" class="card-center"
                                        alt="Phone"></a>
                                </a>
                                <div class="modal fade" id="modal-chitiet" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="body">




                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ Route('homeuser.tuido', $item->id) }}"
                                                    class="btn btn-secondary btn-block"><i class="bi bi-bag-plus"></i>Thêm
                                                    vào túi đồ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="{{Route('client.chitietsanpham', $item->id)}}"></a> --}}
                                <div class="card-body">
                                    <p style="text-align:center;" class="card-title">{{ $item->tensp }} </p>
                                    <p class="text-danger" style="text-align:center;font-size:25px;"
                                        class="text-dark"><strong>{{ number_format($item->giaxuat) }}<u>đ</u></p>
                                    </strong>
                                    <a href="{{ Route('client.chitietsanpham', $item->id) }}"
                                        class="btn btn-secondary btn-block"><i class="bi bi-bag-plus"></i>Mua ngay</a>
                                @else
                                    {{-- <div class="alert alert-danger alert-dismissible" v-if="stock_warning"><i class="fa fa-exclamation-circle"></i> Sản phẩm đánh dấu *** không có đủ số lượng trong kho!
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div> --}}
                                    <img src="{{ url('public/uploads') }}/{{ $item->anh }}" style="text-align:center;"
                                        style="text-align:center; width: 250px; height: 300px;" class="card-center"
                                        alt="Phone">

                                    <div class="card-body">
                                        <p style="text-align:center;" class="card-title">{{ $item->tensp }} </p>
                                        <p class="text-danger"
                                            style="font-family:Arial; text-align:center;font-size:25px;"
                                            class="text-dark"><strong>Hết Hàng</p></strong>
                            @endif
                        </div>
                        {{-- <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div> --}}

                    </div>
                </div>
    </div>
    @endif
    @endforeach
    </div>
    {{-- </div> --}}
@endsection
@section('js')
    <script>
        $(document).on('click', '.chitiet-sanpham', function(e) {
            e.preventDefault();
            let url=$(this).attr('href');
            $.ajax({
              type: "GET",
              url: url,
              success: function (response) {
                $('#body').html(response);
                $('#modal-chitiet').modal('show');
              }
            });
        });
    </script>
@endsection

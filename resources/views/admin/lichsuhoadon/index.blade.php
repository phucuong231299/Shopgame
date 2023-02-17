@extends('layout.loadmin')
@section('main')
    <div class="main_content">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive shop_cart_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td class="product-name">Mã đơn hàng</td>
                                        <td class="product-name">Tên khách hàng</td>
                                        <td class="product-name">Nhân viên nhận đơn</td>
                                        <td class="product-name">Ngày đặt</td>
                                        <td class="product-price">Tình trạng</td>
                                        <td class="product-subtotal">Tổng Cộng</td>


                                    </tr>
                                </thead>
                                <tbody>
                                    @if (Auth::guard('user')->user()->chucvu_id == 1)
                                        @foreach ($hoadon as $item)
                                            <tr>

                                                <th>{{ $item->id }}</th>
                                                <td>{{ $item->khachhang->hoten }}</td>
                                                @if (isset($item->nhanvien->hoten))
                                                    <td>{{ $item->nhanvien->hoten }}</td>
                                                @else
                                                    <form action="{{ route('lichsu.update', $item->id) }}" method="POST">
                                                        @csrf @method('PUT')
                                                        <td><button type="submit" class="btn btn-primary">nhận đơn</button>
                                                        </td>
                                                    </form>
                                                @endif
                                                <td>{{ $item->ngaydat }}</td>
                                                <td>{{ $item->tinhtrang->tinhtrang }}</td>
                                                <td>{{ number_format($item->tongcong) }}<u>đ</u></td>
                                                <td><a href="{{ route('lichsu.show', $item->id) }}" type="button"
                                                        class="btn btn-primary">xem</a></td>
                                        @endforeach
                                    @endif
                                    @if (Auth::guard('user')->user()->chucvu_id == 3)
                                    @foreach ($hoadon as $item)
                                        <tr>

                                            <th>{{ $item->id }}</th>
                                            <td>{{ $item->khachhang->hoten }}</td>
                                            @if (isset($item->nhanvien->hoten))
                                                <td>{{ $item->nhanvien->hoten }}</td>
                                            @else
                                                <form action="{{ route('lichsu.update', $item->id) }}" method="POST">
                                                    @csrf @method('PUT')
                                                    <td><button type="submit" class="btn btn-primary">nhận đơn</button>
                                                    </td>
                                                </form>
                                            @endif
                                            <td>{{ $item->ngaydat }}</td>
                                            <td>{{ $item->tinhtrang->tinhtrang }}</td>
                                            <td>{{ number_format($item->tongcong) }}<u>đ</u></td>
                                            <td><a href="{{ route('lichsu.show', $item->id) }}" type="button"
                                                    class="btn btn-primary">xem</a></td>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider"></div>
                        <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div>{{ $hoadon->appends(request()->all())->links() }}</div>
@endsection

@extends('layout.louser')
@section('main')

    <div class="main_content">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive shop_cart_table">
                            @if ($hoadon->count('id') == 0)
                                <p style="text-align: center;" class="title page-title"> <img
                                        src="{{ url('public/khachhang') }}/empty-cart.png" width="200"> </p>
                            @else
                                <table style="color: white;" class="table">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Mã đơn hàng</th>
                                            <th class="product-price">Khách hàng</th>
                                            <th class="product-quantity">Ngày đặt hàng</th>
                                            <th class="product-remove">Tình trạng</th>
                                            <th class="product-subtotal">Giảm giá</th>
                                            <th class="product-subtotal">Phí vận chuyển</th>
                                            <th class="product-subtotal">Tổng tiền</th>
                                            <th class="product-remove"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($hoadon as $item)
                                            @if ($item->count('id'))
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->khachhang->hoten }}</td>
                                                    <td>{{ $item->ngaydat }}</td>
                                                    <td>{{ $item->tinhtrang->tinhtrang }}</td>
                                                    <td>
                                                        {{ number_format($item->phi_khuyenmai) }}<u>đ</u>
                                                    </td>
                                                    <td>
                                                        {{ number_format($item->phi_vanchuyen) }}<u>đ</u>
                                                    </td>
                                                    <td>{{ number_format($item->tongcong) }}<u>đ</u></td>
                                                    <td><a class="btn btn-secondary"
                                                            href="{{ route('hoadon.chitiet', $item->id) }}">Xem</a></td>

                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>

                                </table>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

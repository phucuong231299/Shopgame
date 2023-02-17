@extends('layout.louser')
@section('main')

    <div class="checkout-section cart-section">

        <div class="section-body">

            <div class="main_content">
                <div class="section">
                    <div class="container">
                        <h4 class="title section-title">Túi Đồ</h4>
                        <div class="row">
                            @if ($tuido->soluong == 0)
                                <p style="text-align: center;" class="title page-title"> <img
                                        src="{{ url('public/khachhang') }}/empty-cart.png" width="200"> </p>
                                <br>
                              
                            @else
                                <div class="col-12">

                                    <div class="table-responsive">
                                        <table style="color: white; margin: auto;"
                                            class="table table-bordered align-middle">
                                            <thead>
                                                <tr>
                                                    <td class="text-center td-hinhanh">Hình ảnh</td>
                                                    <td class="text-center td-sanpham">Tên sản phẩm</td>
                                                    <td class="text-center td-dongia">Đơn giá</td>
                                                    <td class="text-center td-soluong">Số lượng</td>
                                                    <td class="text-center td-tongcong">Tổng cộng</td>
                                                    <td class="text-center td-xoa">Xóa</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tuido->tuido as $item)
                                                    <tr>
                                                        <td style="text-align: center;" class="product-thumbnail"><img
                                                                src="{{ url('public/uploads') }}/{{ $item['anh'] }}"
                                                                title="{{ $item['tensp'] }}"></td>
                                                        <td style="text-align: center;" class="product-name"
                                                            data-title="Product"><a
                                                                style="color: white;">{{ $item['tensp'] }}</a>
                                                        </td>
                                                        <td style="text-align: center;" class="product-price"
                                                            data-title="Price">{{ number_format($item['gia']) }}<u>đ</u>
                                                        </td>
                                                        <td class="product-quantity" data-title="Quantity">


                                                            <div style="  color: black; margin: auto;"
                                                                class="quantity sticky-top">

                                                                <p style=" color: white;" name="soluong">
                                                                    {{ $item['soluong'] }}</p>


                                                            </div>

                                                        </td>
                                                        <td style="text-align: center;" class="product-subtotal"
                                                            data-title="Total">
                                                            {{ number_format($item['soluong'] * $item['gia']) }}<u>đ</u>
                                                        </td>

                                                        <td style="text-align: center;" class="product-remove"
                                                            data-title="Remove"><a
                                                                onclick="return confirm('Bạn có muốn xóa {{ $item['tensp'] }}')"
                                                                href="{{ route('homeuser.tuido.xoa', $item['id']) }}"><i
                                                                    style="color: white;">X</i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">


        <div class="row">
            <div class="col-md-6">

                <div class="heading_s1">
                    <h4>Thông tin cá nhân</h4>
                </div>
                <form method="post">
                    <div class="form-group">
                        <input value="{{ Auth::guard('khachhang')->user()->hoten }}" type="text" required
                            class="form-control" name="fname" placeholder="First name">
                    </div>

                    <div class="form-group">
                        <input value="{{ Auth::guard('khachhang')->user()->diachi }}" type="text" class="form-control"
                            name="billing_address" required="" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input value="{{ Auth::guard('khachhang')->user()->sdt }}" type="text" class="form-control"
                            name="billing_address2" required="" placeholder="Phone number">
                    </div>


                    <div class="form-group">
                        <input value="{{ Auth::guard('khachhang')->user()->email }}" class="form-control" required
                            type="text" name="email" placeholder="Email address">
                    </div>
                    {{-- <div class="form-group create-account">
                        <input class="form-control" required type="password" placeholder="Password" name="password">
                    </div> --}}
                    <div class="ship_detail">
                        <div class="form-group">
                            <div class="chek-form">

                            </div>
                        </div>

                    </div>
                    <div class="heading_s1">
                        <h4>Xác nhận hóa đơn</h4>
                    </div>
                    <div class="form-group mb-0">
                        <textarea rows="5" class="form-control" placeholder="Thêm ghi chú cho hóa đơn"></textarea>
                    </div>
                </form>

            </div>
            <div class="col-md-6">
                <div style="background-color: #171e22;" class="order_review">
                    <div class="heading_s1">
                        <h4>Thanh toán</h4>
                        <br>
                        <div class="right">
                            <form method="post">
                                @csrf
                                <div class="checkout-section shipping-payment">
                                    <div class="section-shipping" v-if="shipping_required">
                                    </div>

                                    <div class="section-payment">
                                        <div class="title section-title">Phương thức thanh toán</div>
                                        <div class="section-body">

                                            <div v-for="shipping_method in shipping_methods">
                                                <div class="shippings">
                                                    <div class="ship-wrapper">
                                                        <p v-html="shipping_method.title"></p>

                                                        @if (Session::get('phi'))
                                                            <input type="hidden" name="order_phi" class="order_phi"
                                                                value="{{ Session::get('phi') }}">
                                                        @else
                                                            <input type="hidden" name="order_phi" class="order_phi"
                                                                value="20000">
                                                        @endif

                                                        @if (Session::get('coupon'))
                                                            @foreach (Session::get('coupon') as $cou)
                                                                <input type="hidden" name="order_coupon"
                                                                    class="order_coupon"
                                                                    value=" {{ $cou['tiengiam'] }}">
                                                            @endforeach
                                                        @else
                                                            <input type="hidden" name="order_coupon" class="order_coupon"
                                                                value="0">
                                                        @endif



                                                        <div v-for="payment_method in payment_methods">
                                                            <div class="radio payment_method">
                                                                <label>
                                                                    <input class="payment_methods" v-on:change="save()"
                                                                        value="0" type="radio" name="payment_method" />
                                                                    <i class="bi bi-paypal"></i>
                                                                    <a>Chuyển khoản PayPal</a>
                                                                    <div class="col-md-12">
                                                                        @if (Session::get('coupon'))
                                                                        @php
                                                                        $vnd_to_usd = Session::get('phi')?($tuido->gia+Session::get('phi')-$cou['tiengiam'])/22869:$tuido->gia
                                                                        @endphp
                                                                        @else
                                                                        @php
                                                                        $vnd_to_usd = Session::get('phi')?($tuido->gia+Session::get('phi'))/22869:$tuido->gia
                                                                        @endphp
                                                                        @endif
                                                                        <div id="paypal-button"></div>
                                                                    <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}" name="">
                                                                    </div>
                                                                    <br>
                                                                    <br>
                                                                    <input class="payment_methods" v-on:change="save()"
                                                                        value="1" type="radio" name="payment_method" />
                                                                    <i class="bi bi-cash-stack"></i>
                                                                    <a>Thanh toán khi nhận hàng</a>
                                                                    <span
                                                                        v-html="payment_method.title + (payment_method.terms ? '(' + payment_method.terms + ')' : '') "></span>
                                                                </label>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4>Hóa đơn của bạn</h4>
                                    <br>
                                </div>
                                <div class="table-responsive order_table">
                                    <table style="color: white;" class="table">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Toàn bộ</th>
                                            </tr>
                                        </thead>
                                        @foreach ($tuido->tuido as $item)
                                            <tbody>
                                                <tr>
                                                    <td class="product-subtotal">{{ $item['tensp'] }}<span
                                                            class="product-qty"> x {{ $item['soluong'] }}</span></td>
                                                    <td class="product-subtotal">
                                                        {{ number_format($item['gia'] * $item['soluong']) }}<u>đ</u></td>
                                                </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            @if (Session::get('coupon'))
                                                <tr>
                                                    <td class="product-subtotal"><strong>Giảm Giá :</strong></td>
                                                    <td class="product-subtotal">
                                                        @foreach (Session::get('coupon') as $cou)
                                                            {{ number_format($cou['tiengiam']) }}<u>đ</u>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endif

                                            @if (Session::get('phi'))
                                                <tr>
                                                    <td class="product-subtotal"><strong>Phí vận chuyển linh hoạt :</strong>
                                                    </td>
                                                    <td class="product-subtotal">

                                                        {{ number_format(Session::get('phi')) }}<u>đ</u>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="product-subtotal"><strong>Tổng tiền :</strong></th>
                                                    <td class="product-subtotal">
                                                        @if (Session::get('coupon'))
                                                            {{ number_format($tuido->gia - $cou['tiengiam'] + Session::get('phi')) }}<u>đ</u>
                                                        @else
                                                            {{ number_format($tuido->gia + Session::get('phi')) }}<u>đ</u>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif

                                            </tr>

                                        </tfoot>
                                    </table>
                                </div>
                                <input type="button" value="Xác nhận đơn hàng" name="send_order"
                                    class="btn btn-secondary btn-block send_order">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.send_order').click(function() {
                var order_phi = $('.order_phi').val();
                var order_coupon = $('.order_coupon').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('hoadon.tao') }}",
                    method: 'POST',
                    data: {
                        order_phi: order_phi,
                        order_coupon: order_coupon,
                        _token: _token
                    },
                    success: function() {
                        const Msg = Swal.mixin({
                                position: 'center',
                                icon: 'success',
                                title: 'Vui lòng kiểm tra email trước khi nhân hàng!',
                                showConfirmButton: false,
                                timer: 4000
                            })
                            //end
                            Msg.fire({

                                type: 'success',
                                title: 'Thanh Toán thành công',

                            });
                        location.replace("{{route('hoadon.thanhcong')}}");
                    }

                });
            });
        });
    </script>
@endsection

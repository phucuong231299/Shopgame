@extends('layout.louser')
@section('main')

    <div id="checkout-cart" class="container">
        <div class="row">
            <div id="content" class="col-sm-12">
                <br>
                <h1 class="title page-title">Giỏ hàng </h1>
                @if ($tuido->soluong == 0)
                    <p style="text-align: center;" class="title page-title"> <img
                            src="{{ url('public/khachhang') }}/empty-cart.png" width="200"> </p>
                    <br>
                    <div class="buttons clearfix">
                        <div class="product_price"><a href="{{ route('client.index') }}"
                                class="btn btn-secondary btn-block">Hãy đến mua hàng</a></div>
                    </div>
                @else
                    <div class="cart-page">

                        <div class="table-responsive">
                            <table style="color: white; margin: auto;" class="table table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <td class="text-center td-image">Hình ảnh</td>
                                        <td class="text-center td-name">Tên sản phẩm</td>
                                        <td class="text-center td-qty">Đơn giá</td>
                                        <td class="text-center td-price">Số lượng</td>
                                        <td class="text-center td-total">Tổng cộng</td>
                                        <td class="text-center td-xoa">Xóa</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tuido->tuido as $item)
                                        <tr>
                                            <td style="text-align: center;" class="product-thumbnail"><a
                                                    href="{{ Route('client.chitietsanpham', $item['id']) }}"><img
                                                        src="{{ url('public/uploads') }}/{{ $item['anh'] }}"
                                                        title="{{ $item['tensp'] }}"></a></td>
                                            <td style="text-align: center;" style="color: white;" class="product-name"
                                                data-title="Product"><a style="color: white;"
                                                    href="{{ Route('client.chitietsanpham', $item['id']) }}">{{ $item['tensp'] }}</a>
                                            </td>
                                            <td style="text-align: center;" class="product-price" data-title="Price">
                                                {{ number_format($item['gia']) }}<u>đ</u></td>
                                            <td class="product-quantity" data-title="Quantity">


                                                <div style="  color: black; margin: auto;" class="quantity sticky-top">
                                                    <a type="button"
                                                        href="{{ route('homeuser.tuido.giam', $item['id']) }}"
                                                        class="minus">-</a>
                                                    <input style=" color: white;" type="number" min="1"
                                                        value="{{ $item['soluong'] }}" name="soluong" title="Qty"
                                                        class="qty" size="4">
                                                    <a type="button"
                                                        href="{{ route('homeuser.tuido.tang', $item['id']) }}"
                                                        class="plus">+</a>

                                                </div>

                                            </td>
                                            <td style="text-align: center;" class="product-subtotal" data-title="Total">
                                                {{ number_format($item['soluong'] * $item['gia']) }}<u>đ</u></td>

                                            <td style="text-align: center;" class="product-remove" data-title="Remove"><a
                                                    onclick="return confirm('Bạn có muốn xóa {{ $item['tensp'] }}')"
                                                    href="{{ route('homeuser.tuido.xoa', $item['id']) }}"><i
                                                        style="color: white;">X</i></a></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <a href="{{ route('homeuser.tuido.xoatatca') }}" class="btn btn-secondary" type="submit">Xóa tất
                            cả</a>
                        <div class="cart-bottom">
                            <div class="panels-total">
                                <div class="cart-panels">
                                    <h2 class="title">Bạn muốn làm gì tiếp theo?</h2>
                                    <p style="color: white;">Chọn nếu bạn muốn sử dụng Điểm thưởng; mã Giảm giá (Coupon
                                        code); Phí vận chuyển (Transport).</p>
                                    <div class="panel-group" id="accordion">
                                        <div class="panel panel-default panel-coupon">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><a href="#collapse-coupon"
                                                        class="accordion-toggle" data-toggle="collapse"
                                                        style="color: white;" data-parent="#accordion">Sử dụng Mã khuyến mãi
                                                        <i class="fa fa-caret-down"></i></a></h4>
                                            </div>
                                            <div id="collapse-coupon" class="panel-collapse collapse">
                                                <div class="panel-body form-group">

                                                    <form method="POST" action="{{ route('check_coupon') }}" autocomplete="off">
                                                        @csrf
                                                        <div class="input-group">
                                                            <input type="text" name="coupon"
                                                                placeholder="Nhập mã giảm giá tại đây"
                                                                class="form-control" />
                                                            <span class="input-group-btn">
                                                                <input type="submit" name="check_coupon"
                                                                    value="Gửi thông tin"
                                                                    class="btn btn-secondary check_coupon" />
                                                                @if (Session::get('coupon'))
                                                                    <a href="{{ route('xoa_coupon') }}"
                                                                        class="btn btn-secondary" type="submit">Xóa mã giảm
                                                                        giá</a>
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="panel-group" id="accordion">
                                        <div class="panel panel-default panel-coupon">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><a href="" class="accordion-toggle"
                                                        data-toggle="collapse" style="color: white;"
                                                        data-parent="#accordion">Chọn nơi vận chuyển <i
                                                            class="fa fa-caret-down"></i></a></h4>
                                            </div>
                                            <div id="collapse-coupon" class="panel-collapse collapse">
                                                <div class="panel-body form-group">

                                                    <form>
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="tinh">Tĩnh <span
                                                                    class="text-danger font-weight-bold">*</span></label>
                                                            <select class="custom-select form-control chon tinh" id="tinh"
                                                                name="tinh">
                                                                <option value="">-- Chọn tĩnh --</option>
                                                                @foreach ($tinh as $value)
                                                                    <option value="{{ $value->matinh }}">
                                                                        {{ $value->tentinh }}</option>
                                                                @endforeach
                                                            </select>
                                                            {{ $errors->first('tinh') }}
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="huyen">Huyện <span
                                                                    class="text-danger font-weight-bold">*</span></label>
                                                            <select class="custom-select form-control huyen chon" id="huyen"
                                                                name="huyen">
                                                                <option value="">-- Chọn Huyện --</option>
                                                                {{-- @foreach ($huyen as $value)
                                                      <option value="{{ $value->mahuyen }}">{{ $value->tenhuyen }}</option>
                                                  @endforeach --}}
                                                            </select>
                                                            {{ $errors->first('huyen') }}
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="xa">Xã <span
                                                                    class="text-danger font-weight-bold">*</span></label>
                                                            <select class="custom-select form-control xa" id="xa" name="xa">
                                                                <option value="">-- Chọn Xã --</option>
                                                                {{-- @foreach ($xa as $value)
                                                      <option value="{{ $value->maxa }}">{{ $value->tenxa }}</option>
                                                  @endforeach --}}
                                                            </select>
                                                            {{ $errors->first('xa') }}
                                                        </div>



                                                        <button type="button"
                                                            class="btn btn-secondary themvanchuyen tinhvanchuyen">Thêm phí
                                                            vận chuyển</button>
                                                    </form>
                                                    <br>
                                                    @if (Session::get('phi'))
                                                        <a href="{{ route('xoa_phi') }}" class="btn btn-secondary"
                                                            type="submit">Xóa phí vận chuyển</a>
                                                    @endif

                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="cart-total">
                                <table style="color: white;" class="table table-bordered">
                                    <tr>


                                        <td class="text-right"><strong>Tổng tiền tạm tính: </strong></td>
                                        <td class="text-right">{{ number_format($tuido->gia) }}<u>đ</u></td>
                                    </tr>


                                    @if (Session::get('coupon'))
                                        <tr>
                                            <td class="text-right"><strong>Giảm giá :</strong></td>
                                            <td class="text-right">
                                                @foreach (Session::get('coupon') as $cou)
                                                    {{ number_format($cou['tiengiam']) }}<u>đ</u>

                                            </td>

                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-right"><strong>Tổng tiền sau khi giảm giá :</strong></td>
                                        <td class="text-right">
                                            {{ number_format($tuido->gia - $cou['tiengiam']) }}<u>đ</u></td>
                                    </tr>
                @endif
                @if (Session::get('phi'))
                    <tr>
                        <td class="text-right"><strong>Phí vận chuyển linh hoạt:</strong></td>
                        <td class="text-right">
                            {{ number_format(Session::get('phi')) }}<u>đ</u>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Tổng tiền hóa đơn :</strong></td>


                        @if (Session::get('coupon'))
                            <td class="text-right">
                                {{ number_format($tuido->gia - $cou['tiengiam'] + Session::get('phi')) }}<u>đ</u></td>
                        @else
                            <td class="text-right">{{ number_format($tuido->gia + Session::get('phi')) }}<u>đ</u>
                            </td>
                        @endif
                    </tr>
                @endif

                </table>
            </div>
        </div>
        <table style="text-align: center;" class="table table-bordered">
            <tr>
                <td class="text-right">
                    <div class="text-center"><a href="{{ route('client.index') }}"
                            class="btn btn-secondary"><span>Tiếp
                                tục mua
                                hàng</span></a></div>
                </td>
                @if (Session::get('phi'))
                    <td class="text-right">
                        <div class="text-center"><a href="{{ route('hoadon.create') }}"
                                class="btn btn-secondary"><span>Thanh toán</span></a></div>
                    </td>
                @endif
            </tr>
        </table>
    </div>
    </div>
    @endif
    </div>
    </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
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
                    url: "{{ route('chon.vanchuyenhome') }}",
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
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.tinhvanchuyen').click(function() {
                var matinh = $('.tinh').val();
                var mahuyen = $('.huyen').val();
                var maxa = $('.xa').val();
                var _token = $('input[name="_token"]').val();
                if (matinh == '' && mahuyen == '' && maxa == '') {
                    Swal.fire(
                        'Chú ý?',
                        'hãy chọn địa chỉ giao hàng',
                        'question'
                    )
                } else {
                    $.ajax({
                        url: "{{ route('tinh.vanchuyen') }}",
                        method: 'POST',
                        data: {
                            matinh: matinh,
                            mahuyen: mahuyen,
                            maxa: maxa,
                            _token: _token
                        },
                        success: function() {
                            location.reload();
                        }

                    });
                }
            });
        });
    </script>
@endsection

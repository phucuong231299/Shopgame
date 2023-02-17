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
                                        
                                        <td class="product-name">#</td>
                                        <td class="product-price">tên sản phẩm</td>
                                        <td class="product-quantity">giá bán</td>
                                        <td class="product-subtotal">số lượng</td>
                                        <td class="product-subtotal">Phí vận chuyển</td>
                                        <td class="product-subtotal">Giảm giá</td>
                                        <td class="product-remove">giá tiền</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hoadon_chitiet as $item)
                                        <tr>
                                    
                                        <td> <img src="{{url('public/uploads')}}/{{$item->sanpham->anh}}" style="width: 50px;" title="{{$item->sanpham->tensp}}"></td>
                                       
                                        <td>{{$item->sanpham->tensp}}</td>
                                        <td>{{number_format($item->sanpham->giaxuat)}}<u>đ</u></td>
                                        <td>{{$item->soluong}}</td>
                                        <td>{{number_format($item->phi_vanchuyen)}}<u>đ</u></td>
                                        <td>{{number_format($item->phi_khuyenmai)}}<u>đ</u></td>
                                        <td>  {{number_format(($item->giatien)+($item->phi_vanchuyen)-($item->phi_khuyenmai))}}<u>đ</u></td>
                                        </tr>
                                        @endforeach

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
 @endsection
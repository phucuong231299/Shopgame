@extends('layout.louser');
@section('main')


        <div class="main_content">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                          <table style="color: white;" class="table">
                                <tbody>
                                  <tr  >
                                    <td width=150px>Mã đơn hàng:</td>
                                    <td>{{$hoadon->id}}</td>
                                  </tr> 
                                  <tr>
                                    <td>Tên khách hàng:</td>
                                    <td>{{$hoadon->khachhang->hoten}}</td>
                                  </tr> 
                                  <tr>
                                    <td>Địa chỉ:</td>
                                    <td>{{$hoadon->khachhang->diachi}}</td>
                                  </tr>
                                  <tr>
                                    <td>SĐT:</td>
                                    <td>{{$hoadon->khachhang->sdt}}</td>
                                  </tr>
                                  <tr>
                                    <td>Email:</td>
                                    <td>{{$hoadon->khachhang->email}}</td>
                                  </tr>
                                </tbody>
                                
                            </table>
                            
                            @if (isset($hoadon->nhanvien_id))
                            <table style="color: white;" class="table">
                                <tbody>
                                  <tr>
                                    <td width=150px>Tên nhân viên giao hàng:</td>
                                    <td>{{$hoadon->nhanvien->hoten}}</td>
                                  </tr> 
                                  <tr>
                                    <td>SĐT:</td>
                                    <td>{{$hoadon->nhanvien->sdt}}</td>
                                  </tr>
                                  <tr>
                                    <td>Email:</td>
                                    <td>{{$hoadon->nhanvien->email}}</td>
                                  </tr>
                                  <tr>
                                      <td>Tình trạng đơn hàng</td>
                                    <td style="color:red;">{{$hoadon->tinhtrang->tinhtrang}}</td>
                                </tr>
                                </tbody>
                                
                            </table>
                            @endif
                            <br>
                            <div class="table-responsive shop_cart_table">
                                
                              <table style="color: white;" class="table">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Hình ảnh</th>
                                            <th class="product-thumbnail">Sản phẩm</th>
                                            <th class="product-center">Đơn giá</th>
                                            <th class="product-price">Số lượng</th>
                                            <th class="product-quantity">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($hoadon_chitiet as $item)
                                       
                                        <tr>
                                            <td  ><img width="50px" src="{{url('public/uploads')}}/{{$item->sanpham->anh}}"></td>
                                            <td  >{{$item->sanpham->tensp}}</td>
                                            
                                            <td  >{{number_format($item->sanpham->giaxuat)}}<u>đ</u></td>
                                            <td  >{{$item->soluong}}</td>
                                            <td>{{number_format(($item->soluong*$item->sanpham->giaxuat)+($item->phi_vanchuyen)-($item->phi_khuyenmai))}}<u>đ</u></td>
                                        
                                        </tr>
                                        @endforeach
                                       
                                        
                                    </tbody>
                                  
                                </table>
                               
                              
                                
                            </div>

                        </div>
                    </div>
                  
                </div>
            </div>
        </div> 
@endsection

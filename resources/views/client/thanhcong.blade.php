@extends('layout.louser')
@section('main')

<div  style="text-align: center;" class="thanhcong">
    <img src="{{url('public/khachhang')}}/icon-thanh-cong.png"width="150">
    <br>
    <br>
<h1> ĐẶT Hàng thành công </h1>
<h5> quý khách vui lòng kiểm tra mail trước khi nhận hàng và thanh toán ! </h5>

  <div class="buttons clearfix">
    <div class="product_price"><a href="{{route('client.index')}}"
            class="btn btn-secondary ">Tiếp tục mua hàng</a></div>
    </div>
   
</div>
@endsection
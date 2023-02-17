<div style="width: 600px; margin: 0 auto;">
    <div style="text-align: center;">
        <img src="{{url('public/khachhang')}}/console_logo.png"width="200">
        <h2>Xin chào thành viên {{$kh->hoten}}</h2>
        <h3>Bạn đã đăng ký thành công tài khoản tại Game console shop của chúng tôi xin vui lòng kích hoạt tài khoản của bạn</h3>
        <p>
            <a href="{{route('client.kichhoat',['khachhang'=>$kh->id,'token'=>$kh->token])}}" style="display: inline-block;background-color: #6c757d;color:#fff;padding: 7px 25px; font-weight: bold">
                kích hoạt tài khoản
            </a>
        </p>
    </div>
</div>
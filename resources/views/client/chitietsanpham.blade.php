@extends('layout.louser')
@section('main')
    <style>
        /* .card-wrapper{
                                                                                    max-width: 1100px;
                                                                                    margin: 0 auto;
                                                                                } */
        .img-display {
            overflow: hidden;
        }

        .img-showcase {
            display: flex;
            width: 100%;
            transition: all 0.5s ease;
        }

        .img-showcase img {
            min-width: 100%;
        }

        .img-select {
            display: flex;
        }

        .img-item {
            margin: 0.3rem;
        }

        .img-item:nth-child(1),
        .img-item:nth-child(2),
        .img-item:nth-child(3) {
            margin-right: 0;
        }

        .img-item:hover {
            opacity: 0.8;
        }

        .product-content {
            padding: 2rem 1rem;
        }

        .product-title {
            font-size: 3rem;
            text-transform: capitalize;
            font-weight: 700;
            position: relative;
            color: #12263a;
            margin: 1rem 0;
        }

        .product-title::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 4px;
            width: 80px;
            background: #12263a;
        }

        .product-link {
            text-decoration: none;
            text-transform: uppercase;
            font-weight: 400;
            font-size: 0.9rem;
            display: inline-block;
            margin-bottom: 0.5rem;
            background: #256eff;
            color: #fff;
            padding: 0 0.3rem;
            transition: all 0.5s ease;
        }

        .product-link:hover {
            opacity: 0.9;
        }

        .product-rating {
            color: #ffc107;
        }

        .product-price {
            margin: 1rem 0;
            font-size: 1rem;
            font-weight: 700;
        }

        .purchase-info {
            margin: 1.5rem 0;
        }

        .purchase-info input,
        .purchase-info .btn {
            border: 1.5px solid #ddd;
            border-radius: 25px;
            text-align: center;
            padding: 0.45rem 0.8rem;
            outline: 0;
            margin-right: 0.2rem;
            margin-bottom: 1rem;
        }

        .purchase-info input {
            width: 60px;
        }

        .purchase-info .btn {
            cursor: pointer;
            color: #fff;
        }

        .purchase-info .btn:first-of-type {
            background: #256eff;
        }

        .purchase-info .btn:last-of-type {
            background: #f64749;
        }

        .purchase-info .btn:hover {
            opacity: 0.9;
        }

        .social-links {
            display: flex;
            align-items: center;
        }

        @media screen and (min-width: 992px) {
            .card {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-gap: 1.5rem;
            }

            .product-imgs {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

        }

    </style>
    <div class="ajax_quick_view">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                <!-- card left -->
                <div class="product-imgs">
                    <div class="img-display">
                        <div class="img-showcase">

                            <img src="{{ url('public/uploads') }}/{{ $sanpham->anh }}" alt="console">
                            @if ($sanpham->listanh->count() == 0)
                                <img src="{{ url('public/uploads') }}/trang.jpg" alt="console">

                                <img src="{{ url('public/uploads') }}/trang.jpg" alt="console">

                                <img src="{{ url('public/uploads') }}/trang.jpg" alt="console">
                            @else
                                @foreach ($listanh as $item)
                                    <img src="{{ url('public/uploads/listanh') }}/{{ $item->anh }}" alt="console">
                                @endforeach
                            @endif


                        </div>
                    </div>
                    <div class="img-select">
                        <div class="img-item">
                            <a href="#" data-id="1">
                                <img style="height: 150px; width: 650px"
                                    src="{{ url('public/uploads') }}/{{ $sanpham->anh }}" alt="console">
                            </a>
                        </div>
                        <?php $t = 2; ?>

                        @if ($sanpham->listanh->count() == 0)
                            <div class="img-item">
                                <a href="#" data-id="2">
                                    <img style="height: 150px; width: 650px" src="{{ url('public/uploads') }}/trang.jpg"
                                        alt="console">
                                </a>
                            </div>
                            <div class="img-item">
                                <a href="#" data-id="3">
                                    <img style="height: 150px; width: 650px" src="{{ url('public/uploads') }}/trang.jpg"
                                        alt="console">
                                </a>
                            </div>
                            <div class="img-item">
                                <a href="#" data-id="4">
                                    <img style="height: 150px; width: 650px" src="{{ url('public/uploads') }}/trang.jpg"
                                        alt="console">
                                </a>
                            </div>
                        @else
                            @foreach ($listanh as $item)
                                <div class="img-item">
                                    <a href="#" data-id="{{ $t }}">
                                        <img style="height: 150px; width: 650px"
                                            src="{{ url('public/uploads/listanh') }}/{{ $item->anh }}" alt="console">
                                    </a>
                                </div>
                                <?php $t++; ?>
                            @endforeach
                        @endif
                    </div>
                    {!! $sanpham->video !!}

                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product-content">
                    <h2 style="color: white" class="product-title">{{ $sanpham->tensp }}</h2>

                    <ul class="product-meta">

                        <li> Nhà sản xuất: <a style="color: white" href="#">{{ $sanpham->hang->hang }}</a> </li>
                    </ul>
                    <ul class="product-meta">
                        <li> Thời gian bảo hành:<a style="color: white"> {{ $sanpham->baohanh->thoigianbaohanh }}</a>
                        </li>
                    </ul>

                    <div class="product_price">
                        <span style="font-size: 350%; color: white">{{ number_format($sanpham->giaxuat) }}<u>đ</u></span>
                    </div>
                    <div class="product_price"><a style=" font-size: 20px; height: 50px;"
                            href="{{ Route('homeuser.tuido', $sanpham->slug) }}" class="btn btn-secondary btn-block">Thêm
                            vào giỏ hàng</a></div>

                    <div style="color: white" class="product-meta ">

                        {!! $sanpham->chitiet !!}
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="site-wrap">

        <div class="site-section block-3 site-blocks-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 site-section-heading text-center pt-4">
                        <h2>Sản phẩm khác</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 block-3">
                        <div class="nonloop-block-3 owl-carousel">
                            {{-- ps5 --}}
                            @if ($sanpham->hang->id == 1 && $sanpham->loai->id == 55)
                                @foreach ($sp1 as $item)
                                    @if ($item->hang->id == 1 && $item->loai->id == 1)
                                        <div class="item">
                                            <div class="item-entry">
                                                <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                    class="product-item md-height bg-gray d-block">
                                                    <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                        alt="Image" class="img-fluid">
                                                </a>
                                                <h2 class="item-title"><a
                                                        href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                                </h2>
                                                <strong
                                                    class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                    </p></strong>
                                            </div>
                                        </div>
                                    @else
                                    @endif
                                @endforeach
                            @endif
                            @if ($sanpham->hang->id == 1 && $sanpham->loai->id == 1)
                                @foreach ($sp1 as $item)
                                    @if ($item->hang->id == 1 && $item->loai->id == 55)
                                        <div class="item">
                                            <div class="item-entry">
                                                <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                    class="product-item md-height bg-gray d-block">
                                                    <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                        alt="Image" class="img-fluid">
                                                </a>
                                                <h2 class="item-title"><a
                                                        href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                                </h2>
                                                <strong
                                                    class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                    </p></strong>
                                            </div>
                                        </div>
                                    @else
                                    @endif
                                @endforeach
                            @endif

                                        {{-- ps4 --}}
                            @if ($sanpham->hang->id == 1 && $sanpham->loai->id == 55)
                            @foreach ($sp1 as $item)
                                @if ($item->hang->id == 1 && $item->loai->id == 4)
                                    <div class="item">
                                        <div class="item-entry">
                                            <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                class="product-item md-height bg-gray d-block">
                                                <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                    alt="Image" class="img-fluid">
                                            </a>
                                            <h2 class="item-title"><a
                                                    href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                            </h2>
                                            <strong
                                                class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                </p></strong>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                        @endif
                        @if ($sanpham->hang->id == 1 && $sanpham->loai->id == 4)
                        @foreach ($sp1 as $item)
                            @if ($item->hang->id == 1 && $item->loai->id == 55)
                                <div class="item">
                                    <div class="item-entry">
                                        <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                            class="product-item md-height bg-gray d-block">
                                            <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                alt="Image" class="img-fluid">
                                        </a>
                                        <h2 class="item-title"><a
                                                href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                        </h2>
                                        <strong
                                            class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                            </p></strong>
                                    </div>
                                </div>
                            @else
                            @endif
                        @endforeach
                    @endif
                        

                            {{-- nintendo --}}
                            @if ($sanpham->hang->id == 2 && ($sanpham->loai->id == 10 || $sanpham->loai->id == 11 || $sanpham->loai->id == 12))
                                @foreach ($sp1 as $item)
                                    @if ($item->hang->id == 2 && $item->loai->id == 56)
                                        <div class="item">
                                            <div class="item-entry">
                                                <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                    class="product-item md-height bg-gray d-block">
                                                    <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                        alt="Image" class="img-fluid">
                                                </a>
                                                <h2 class="item-title"><a
                                                        href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                                </h2>
                                                <strong
                                                    class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                    </p></strong>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if ($sanpham->hang->id == 2 && $sanpham->loai->id == 56)
                                @foreach ($sp1 as $item)
                                    @if ($item->hang->id == 2 && ($item->loai->id == 10 || $item->loai->id == 11 || $item->loai->id == 12))
                                        <div class="item">
                                            <div class="item-entry">
                                                <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                    class="product-item md-height bg-gray d-block">
                                                    <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                        alt="Image" class="img-fluid">
                                                </a>
                                                <h2 class="item-title"><a
                                                        href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                                </h2>
                                                <strong
                                                    class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                    </p></strong>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            {{-- xbox --}}
                            @if ($sanpham->hang->id == 3 && $sanpham->loai->id == 15)
                                @foreach ($sp1 as $item)
                                    @if ($item->hang->id == 3 && $item->loai->id == 57)
                                        <div class="item">
                                            <div class="item-entry">
                                                <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                    class="product-item md-height bg-gray d-block">
                                                    <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                        alt="Image" class="img-fluid">
                                                </a>
                                                <h2 class="item-title"><a
                                                        href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                                </h2>
                                                <strong
                                                    class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                    </p></strong>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if ($sanpham->hang->id == 3 && $sanpham->loai->id == 57)
                                @foreach ($sp1 as $item)
                                    @if ($item->hang->id == 3 && $item->loai->id == 15)
                                        <div class="item">
                                            <div class="item-entry">
                                                <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                    class="product-item md-height bg-gray d-block">
                                                    <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                        alt="Image" class="img-fluid">
                                                </a>
                                                <h2 class="item-title"><a
                                                        href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                                </h2>
                                                <strong
                                                    class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                    </p></strong>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            @if ($sanpham->hang->id == 4 && ($sanpham->loai->id == 32 || $sanpham->loai->id == 33 || $sanpham->loai->id == 34 || $sanpham->loai->id == 35 || $sanpham->loai->id == 36 || $sanpham->loai->id == 37 || $sanpham->loai->id == 38 || $sanpham->loai->id == 46 ||$sanpham->loai->id == 47 || $sanpham->loai->id == 48 || $sanpham->loai->id == 49))
                                @foreach ($sp1 as $item)
                                    @if ($item->hang->id == 4 && $item->loai->id == 3)
                                        <div class="item">
                                            <div class="item-entry">
                                                <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                    class="product-item md-height bg-gray d-block">
                                                    <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                        alt="Image" class="img-fluid">
                                                </a>
                                                <h2 class="item-title"><a
                                                        href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                                </h2>
                                                <strong
                                                    class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                    </p></strong>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if ($sanpham->hang->id == 4 && $sanpham->loai->id == 3)
                            @foreach ($sp1 as $item)
                                @if ($item->hang->id == 4 && ($item->loai->id == 32 || $item->loai->id == 33 || $item->loai->id == 34 || $item->loai->id == 35 || $item->loai->id == 36 || $item->loai->id == 37 || $item->loai->id == 38 || $item->loai->id == 46 ||$item->loai->id == 47 || $item->loai->id == 48 || $item->loai->id == 49))
                                    <div class="item">
                                        <div class="item-entry">
                                            <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                class="product-item md-height bg-gray d-block">
                                                <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                    alt="Image" class="img-fluid">
                                            </a>
                                            <h2 class="item-title"><a
                                                    href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                            </h2>
                                            <strong
                                                class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                </p></strong>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                            {{-- @if ($sanpham->hang->id == 3 && $sanpham->loai->id == 57)
                            @foreach ($sp1 as $item)
                                @if ($item->hang->id == 3 && $item->hang->id == 15)
                                    <div class="item">
                                        <div class="item-entry">
                                            <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                class="product-item md-height bg-gray d-block">
                                                <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                    alt="Image" class="img-fluid">
                                            </a>
                                            <h2 class="item-title"><a
                                                    href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                            </h2>
                                            <strong
                                                class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                </p></strong>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif --}}
                            {{-- @if ($sanpham->hang->id == 1)
                                @foreach ($sp1 as $item)
                                    @if ($item->hang->id == 1 && $item->loai->id == 55)
                                        <div class="item">
                                            <div class="item-entry">
                                                <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                    class="product-item md-height bg-gray d-block">
                                                    <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                        alt="Image" class="img-fluid">
                                                </a>
                                                <h2 class="item-title"><a
                                                        href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                                </h2>
                                                <strong
                                                    class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                    </p></strong>
                                            </div>
                                        </div>
                                        @else
                                    @endif
                                @endforeach
                            @else
                                @if ($sanpham->hang->id == 2)

                                    @foreach ($sp1 as $item)
                                        @if ($item->hang->id == 2 && $item->loai->id == 56)
                                            <div class="item">
                                                <div class="item-entry">
                                                    <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                        class="product-item md-height bg-gray d-block">
                                                        <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                            alt="Image" class="img-fluid">
                                                    </a>
                                                    <h2 class="item-title"><a
                                                            href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                                    </h2>
                                                    <strong
                                                        class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                        </p></strong>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    @if ($sanpham->hang->id == 3)

                                        @foreach ($sp1 as $item)
                                            @if ($item->hang->id == 3 && $item->loai->id == 57)
                                                <div class="item">
                                                    <div class="item-entry">
                                                        <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                            class="product-item md-height bg-gray d-block">
                                                            <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                                alt="Image" class="img-fluid">
                                                        </a>
                                                        <h2 class="item-title"><a
                                                                href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                                        </h2>
                                                        <strong
                                                            class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                            </p></strong>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        @if ($sanpham->hang->id == 4)

                                            @foreach ($sp1 as $item)
                                                @if ($item->hang->id == 4 && ($item->loai->id == 32 || $item->loai->id == 33 || $item->loai->id == 34 || $item->loai->id == 35 || $item->loai->id == 36 || $item->loai->id == 37 || $item->loai->id == 38))
                                                    <div class="item">
                                                        <div class="item-entry">
                                                            <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                                class="product-item md-height bg-gray d-block">
                                                                <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                                    alt="Image" class="img-fluid">
                                                            </a>
                                                            <h2 class="item-title"><a
                                                                    href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                                            </h2>
                                                            <strong
                                                                class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                                </p></strong>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            @if ($sanpham->hang->id == 5)
                                                @foreach ($sp1 as $item)
                                                    @if ($item->hang->id == 5 && ($item->loai->id == 51 || $item->loai->id == 52 || $item->loai->id == 53 || $item->loai->id == 54))
                                                        <div class="item">
                                                            <div class="item-entry">
                                                                <a href="{{ Route('client.chitietsanpham', $item->slug) }}"
                                                                    class="product-item md-height bg-gray d-block">
                                                                    <img src="{{ url('public/uploads') }}/{{ $item->anh }}"
                                                                        alt="Image" class="img-fluid">
                                                                </a>
                                                                <h2 class="item-title"><a
                                                                        href="{{ Route('client.chitietsanpham', $item->slug) }}">{{ $item->tensp }}</a>
                                                                </h2>
                                                                <strong
                                                                    class="item-price">{{ number_format($item->giaxuat) }}<u>đ</u>
                                                                    </p></strong>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            @endif --}}
                        </div>
                    </div>
                    <div style="background-color: white; width: 1550px;text-align: center;" class="comment">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0"
                                                nonce="fpY9tMpK"></script>
                        <div class="fb-comments"
                            data-href="https://developers.facebook.com/docs/plugins/{{ $url }}" data-width=""
                            data-numposts="5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage() {
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

            document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        }

        window.addEventListener('resize', slideImage);
    </script>
@endsection
@section('js')
    <script>

    </script>
@endsection

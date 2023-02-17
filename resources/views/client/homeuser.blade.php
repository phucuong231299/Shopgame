@extends('layout.louser')
@section('main')
    <div class="banner_section layout_padding">
        <div class="container">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="video_text">Nintendo Switch</h1>
                                <h1 class="controller_text">controller</h1>
                                <p class="banner_text">Nintendo Switch là tên gọi chính thức cho thế hệ máy chơi game tiếp theo của Nintendo. Một chiếc máy chơi game có thể gắn vào TV để dùng như một máy console và khi ra ngoài có thể mang theo để chơi trên một cái tablet cảm ứng cùng với bộ tay cầm không dây dạng module tháo ráp rất độc đáo.
                                </p>
                              
                            </div>
                            <div class="col-md-6">
                                <div class="image_1"><img 
                                        src="{{ url('public/teamplate_fontend') }}/images/img-1.png"></div>
                            </div>
                        </div>
                    </div>
                    @foreach ($bia as $item)
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="video_text">{!!$item->tuade!!}</h1>
                                <h1 class="controller_text">{!!$item->tomtat!!}</h1>
                                <p class="banner_text">{!!$item->noidung!!}</p>
                                  
                            </div>
                            <div class="col-md-6">
                                <div  class="image_1">
                                    <img  src="{{url('public/bia')}}/{{$item->anh}}"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="video_text">Video games</h1>
                                <h1 class="controller_text">controller</h1>
                                <p class="banner_text">There are many variations of passages of Lorem Ipsum
                                    available, but the majority have suffered alteration in some form, by injected
                                    humour, or randomised words which don't look even slightly believable</p>
                                  
                            </div>
                            <div class="col-md-6">
                                <div class="image_1"><img
                                        src="{{ url('public/teamplate_fontend') }}/images/xbox-series-x-00-1400x1400.jpg">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- banner section end -->
    <!-- product section start -->
    <div class="product_section layout_padding">
        <div class="container">
            <div class="product_text"><span style="color:white;">Sản phẩm sắp ra mắt</span></div>

            <div class="product_section_2">
                <div class="row">
                    @foreach ($slide as $item)
                    <div class="col-md-6">
                        @if ($item->status==1)
                      <div class="image_2"><img src="{{url('public/slide')}}/{{$item->anh}}"></div>
                      @endif
                        <div class="price_text">Giá tạm tính <span style="color: white;">{{$item->giatien}}$</span></div>
                        <h1 style="color: white;" class="game_text">{{$item->tensp}}</h1>
                        <p style="color: white;" class="long_text">Phiên bản {{$item->phienban}}</p>
                    </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="image_2"><img src="{{ url('public/about') }}/{{ $about->anh }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <h1 class="about_text">{{$about->tuade}}</h1>
                    <p class="lorem_text">{{$about->noidung}}</p>
                    @foreach ($loai as $item)
                        @if ($item->id == 11)
                            <div class="shop_bt_2"><a href="{{ route('client.show', ['slug' => $item->slug]) }}">Shop
                                    Now</a></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="video_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="video_text_2">{{ $about2->tuade }}</h1>
                    <p class="banner_text_2">{{ $about2->noidung }}</p>
                    @foreach ($loai as $item)
                        @if ($item->id == 50)
                            <div class="shop_bt"><a href="{{ route('client.view', ['slug' => $item->slug]) }}">Shop
                                    Now</a></div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-6">
                    <div class="image_4"><img src="{{ url('public/about2') }}/{{ $about2->anh }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="email_box">
                        <div class="input_main">
                            <div class="container">
                                <form action="/action_page.php">
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="Name" name="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="Email" name="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="Phone Numbar" name="Email">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="main_bt"><a href="?">SEND</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image_6"><img src="{{ url('public/teamplate_fontend') }}/images/img-6.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

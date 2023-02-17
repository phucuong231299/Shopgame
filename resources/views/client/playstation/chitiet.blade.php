
<div class="ajax_quick_view">
    <div class="row">
        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
            <div class="product-image">
                <div class="product_img_box">
                  <img src="{{url('public/uploads')}}/{{$sanpham->anh}}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="pr_detail">
                <div class="product_description">
                    <br>
                    <h4 class="product_title"><a style="color: white;" href="">{{$sanpham->tensp}}</a></h4>
                    <ul class="product-meta">
                    
                        <li>Nhà sản xuất: <a style="color: white" href="#">{{$sanpham->hang->hang}}</a></li>
                    </ul>
                  
                    <div style="color: red" class="product_price">
                        <span class="price">{{number_format($sanpham->giaxuat)}}<u>đ</u></span>
                        
                    </div>
                    <br>
    
                    <br>
                    <ul class="product-meta">
                        <li>Thời gian bảo hành:<br>
                            {{$sanpham->baohanh->thoigianbaohanh}}</li>
                    </ul>
                    <div class="product-meta">
                    
                       
                    </div>
                    
                    
                </div>

            </div>
        </div>
        
    </div>
    
</div>


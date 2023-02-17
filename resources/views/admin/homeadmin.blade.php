@extends('layout.loadmin')
@section('main')
@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$sp->count()}}</h3>

                <p>Tổng sản phẩm</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('sanpham.index')}}" class="small-box-footer">Chi tiết<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$dh->count()}}<sup style="font-size: 20px"></sup></h3>

                <p>Đơn hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{route('lichsu.index')}}" class="small-box-footer">Chi tiết<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$kh->count()}}</h3>

                <p>Khách hàng đăng kí</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('khachhang.index')}}" class="small-box-footer">Chi tiết<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$nv->count()}}</h3>
                <p>Nhân viên</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('nhanvien.index')}}" class="small-box-footer">Chi tiết<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
        </div>
      
        <div id="donut"></div>
        <div class="panel panel-default">
        
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Khách hàng</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Nhân viên giao hàng</th>
                <th scope="col">Tổng tiền</th>
              </tr>
            </thead>
            <tbody>
             
              <?php $stt=1; ?>
              @foreach ($dh as $d)
              <tr>
                <th >{{$stt}}</th>
                <td>{{$d->khachhang->hoten}}</td>
                <td>{{$d->id}}</td>
                <td>{{$d->ngaydat}}</td>
                @if(isset($d->nhanvien->hoten))
                <td>{{$d->nhanvien->hoten}}</td>   
                @else
                <td>Chưa nhận đơn</td>
                @endif
                <td>{{number_format($d->tongcong)}}</td>
              </tr>
              <?php $stt++; ?>
              @endforeach
              
            </tbody>
          </table>
         
        </div>

        <!-- Button trigger modal -->


<!-- Modal -->




        @if (isset($dh1))
        <div style="width: auto;" class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div style="width: auto;" class="inner">
                <p>Tổng doanh thu</p>
                <h3 style="width: auto;">{{number_format($dh1->sum('tongcong'))}}.VND   </h3> 
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('sanpham.index')}}"  class="small-box-footer">Chi tiết<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        @endif
         
          <table class="table">
           
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sp as $item)
              @if ($item->soluong==0)
              <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->tensp}}</td>
                <td>{{$item->soluong}}</td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
      </div>
  @endsection
  @section('js')
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
      <script>
                
         var chart= Morris.Bar({
            element: 'chart',
            parseTime:false,
            data: [
              0,0
            ],
            xkey: 'ngaydat',
            ykeys: ['sum','tongcong','id'],
            labels: ['Danh thu','Tổng tiền','id']
          });

          
       


        $('#form_danhthu').on('submit',function(e){
          e.preventDefault();
          var ngay=$(this).serialize();
          $.get("{{route('admin.index')}}?"+ngay,function(res){
            chart.setData(res.dh);
            

          });
        })

      </script>
     
  @endsection

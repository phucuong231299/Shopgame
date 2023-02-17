<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đơn hàng</title>
    <style>
        body{
            font-family: "DejaVu Sans";
        }
        table{
            width: 100%;
            border: 3px solid #333;
            margin-bottom: 25px;
            border-collapse: collapse;
        }
        table tr th,
        table tr td{
            border: 1px;
            padding: 10px;
            box-sizing: border-box;
            text-align: left;
        }


    </style>
</head>
<body>
    <div >
        <div style="text-align: center;">
            
            <h2 style="color: red">Hóa đơn</h2>
            <h3>Cám ơn bạn đã đặt hàng tại shop của chúng tôi</h3>
            <table >
                <tr>
                    <td>Họ và tên người đặt hàng: </td>
                    <td>{{$kh->hoten}}</td>
                </tr>
                <tr>
                    <td>Địa chỉ: </td>
                    <td>{{$kh->diachi}}</td>
                </tr>
                <tr>
                    <td>SĐT: </td>
                    <td>{{$kh->sdt}}</td>
                </tr>
                
            </table>
            <table >
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tuido->tuido as $stt=> $item)
                    <tr>
                        <td>{{$stt++}}</td>
                        <td>{{$item['tensp']}}</td>
                        <td>{{number_format($item['gia'])}}</td>
                        <td>{{$item['soluong']}}</td>
                        <td>{{number_format($item['gia']*$item['soluong'])}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>  
            <table >
                <thead>
                    <tr>
                        <th>Phí vận chuyển</th>
                        <th>Giảm giá</th>
       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{ number_format(Session::get('phi')) }}<u>đ</u>
                        </td>
                        <td>
                            @if (Session::get('coupon'))
                            @foreach (Session::get('coupon') as $cou)
                                {{ number_format($cou['tiengiam']) }}<u>đ</u>
                            @endforeach
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            
          
                <h2 style="color: red;">Tổng tiền :    {{ number_format($tuido->gia + Session::get('phi')) }}</h2>
            
        
        </div>


    </div>
</body>
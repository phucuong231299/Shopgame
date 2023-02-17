<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\helper\tuido;
use App\Models\loai;
use App\Models\sanpham;
use App\Models\khuyenmai;
use App\Models\vanchuyen;
use App\Models\hoadon;
use App\Models\hoadon_chitiet;
use App\Models\tinh;
use App\Models\huyen;
use App\Models\xa;
use Session;
use Carbon\Carbon;
class tuido_controller extends Controller
{
    public function them(tuido $tuido, $slug){
        
        $sanpham=sanpham::where('slug',$slug)->first();
        $tuido->them($sanpham);
        return redirect()->back();
        
    }
    public function capnhattang(tuido $tuido, $id){
       
        $tuido->capnhattang($id);
        return redirect()->back();
    }
    public function capnhatgiam(tuido $tuido, $id){
       
        $tuido->capnhatgiam($id);
        return redirect()->back();
    }

    public function xoa(tuido $tuido, $id){
        $tuido->xoa($id);
        return redirect()->back();
    }

    public function xoatatca(tuido $tuido){
        $tuido->xoatatca();
        session()->forget('phi');
        session()->forget('coupon');
        return redirect('/tuido');
    }

    public function index(){
        $loai=loai::where('trangthai',0)->orderBy('loai','ASC')->get();
        $vanchuyen=vanchuyen::all();
        $sanpham=sanpham::all();
        $tinh=tinh::all();
        $xa=xa::all();
        $huyen=huyen::all();
        return view('client.tuido',compact('vanchuyen','sanpham','loai','tinh','huyen','xa'));
    }
    public function chonvanchuyenhome(Request $request){
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "tinh") {
                $chon_huyen = huyen::where('matinh', $data['matinh'])->orderby('mahuyen', 'ASC')->get();
                $output .= '<option>-- Chọn Huyện --</option>';
                foreach ($chon_huyen as $item) {
                    $output .= '<option value="' . $item->mahuyen . '">' . $item->tenhuyen . '</option>';
                }
            } else {
                $chon_xa = xa::where('mahuyen', $data['matinh'])->orderby('maxa', 'ASC')->get();
                $output .= '<option>-- Chọn Xã --</option>';
                foreach ($chon_xa as $item) {
                    $output .= '<option value="' . $item->maxa . '">' . $item->tenxa . '</option>';
                }
            }
        }
        echo $output;
    }
    public function tinhvanchuyen(Request $request){
        $data = $request->all();
        if($data['matinh']){
            $vanchuyen = vanchuyen::where('tinh_id',$data['matinh'])->where('huyen_id',$data['mahuyen'])->where('xa_id',$data['maxa'])->get();
            if($vanchuyen){
                $count_vanchuyen = $vanchuyen->count();
                if($count_vanchuyen>0){
                    foreach($vanchuyen as $item){
                        Session::put('phi',$item->sotien);
                        Session::save();
                    }
                }else
                {
                    Session::put('phi',20000);
                    Session::save();
                }
            }
          
        }
    }
    public function xoa_vanchuyen(Request $request){
        session()->forget('phi');
        return redirect()->back();
    }
    public function khuyenmai(Request $request, tuido $tuido)
    {
        $today = Carbon::now();

        $data=$request->all();
        $khuyenmai= khuyenmai::where('makhuyenmai',$data['coupon'])->where('status',1)->where('hsd','>=',$today)->first();
        if($khuyenmai){
            $count_khuyenmai =$khuyenmai->count();
        if($count_khuyenmai>0){
            $khuyenmai_session=Session::get('coupon');
            if($khuyenmai_session==true){
                $is_avaiable=0;
                if($is_avaiable==0){
                    $cou[]=array(
                        'makhuyenmai'=> $khuyenmai->makhuyenmai,
                        'tiengiam'=>$khuyenmai->tiengiam,
                    );

                    Session::put('coupon',$cou);
                }
            }
            else{
                $cou[]=array(
                    'makhuyenmai'=> $khuyenmai->makhuyenmai,
                    'tiengiam'=>$khuyenmai->tiengiam,
                );

                Session::put('coupon',$cou);
            }
            Session::save();
            return redirect()->back()->with('yes','Nhập mã giảm giá thành công');
        }
        }
        else{
            return redirect()->back()->with('no','mã giảm giá không đúng, hoặc đã hết hạn');
        }
    }
}

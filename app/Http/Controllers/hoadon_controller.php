<?php

namespace App\Http\Controllers;

use App\Models\hoadon;
use App\Models\khuyenmai;
use App\Models\loai;
use App\Models\vanchuyen;
use App\Models\hoadon_chitiet;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\helper\tuido;
use Session;
use Auth;
use App\Models\sanpham;
use Illuminate\Support\Facades\mail;


class hoadon_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('khachhang_middleware');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function thanhcong()
    {
        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.thanhcong', compact('loai'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.tinhtien', compact('loai'));
    }
    public function tao(Request $request, tuido $tuido)
    {
        $data = $request->all();
        $khachhang = Auth::guard('khachhang')->user()->id;
        $hoadon = new hoadon;
        $hoadon->khachhang_id = $khachhang;
        $hoadon->ngaydat = Carbon::now();
        $hoadon->tinhtrang_id = 1;
        $hoadon->phi_khuyenmai = $data['order_coupon'];
        $hoadon->phi_vanchuyen = $data['order_phi'];
        $hoadon->tongcong = $data['order_phi'] ? $tuido->gia + $data['order_phi'] - $data['order_coupon'] : $tuido->gia;
        if ($hoadon->save()) {


            foreach ($tuido->tuido as $sanpham_id => $item) {
                $hoadon_chitiet = new hoadon_chitiet;
                $soluong = $item['soluong'];
                $gia = $item['gia'];
                $hoadon_chitiet->hoadon_id = $hoadon->id;
                $hoadon_chitiet->sanpham_id = $sanpham_id;
                $hoadon_chitiet->soluong = $soluong;
                $hoadon_chitiet->giatien = $gia * $soluong;
                if ($hoadon_chitiet->save()) {
                    $sanpham = sanpham::find($sanpham_id);
                    if ($sanpham->soluong >= $soluong) {
                        $sanpham->soluong -= $soluong;
                        $sanpham->save();
                    } else {
                        $xoahoadon = hoadon::find($hoadon->id);
                        $xoahoadon->delete();
                        return redirect()->back()->with('no', 'số lượng không đủ');
                    }
                }
            }
            $kh = Auth::guard('khachhang')->user();
            Mail::send('client.email.xacnhanhoadon', compact('kh'), function ($email) use ($kh) {
                $email->subject('ShopMobile - Đặt hàng thành công');
                $email->to($kh->email, $kh->hoten);
            });

            session()->forget('phi');
            session()->forget('coupon');
            session()->forget('tuido');
            return redirect('/hoadon/thanhcong');
        }
    }
    public function kiemtra_hoadon(tuido $tuido)
    {
        if ($tuido->items != null) {

            if ($this->kiemtra($tuido)) {
                return response()->json([
                    'data' => $tuido,
                ]);
            } else {
                $error = '';
                foreach ($tuido->items as $sanpham_id => $item) {
                    $sp = sanpham::find($sanpham_id);
                    if ($item['soluong'] > $sp->soluong) {
                        $error .= 'Số lượng sản phẩm ' . $sp->tensp . ' chỉ còn ' . $sp->soluong . '<br>';
                    }
                }
                return response()->json([
                    'error' => $error,
                ]);
            }
        } else {
            return response()->json([
                'error' => 'Đơn hàng trống',
            ]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tuido $tuido)
    {
    }
    public function lichsu()
    {
        $id = Auth::guard('khachhang')->user()->id;

        $hoadon = hoadon::where('khachhang_id', $id)->orderby('id', 'DESC')->get();
        $hoadon_chitiet = hoadon_chitiet::all();
        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.lichsuhoadon', compact('hoadon', 'loai', 'hoadon_chitiet'));
    }
    public function chitiet($id)
    {
        $hoadon_chitiet = hoadon_chitiet::where('hoadon_id', $id)->orderby('hoadon_id', 'DESC')->get();
        $hoadon = hoadon::find($id);
        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.lichsuhoadon_chitiet', compact('hoadon_chitiet', 'hoadon', 'loai'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hoadon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function show(hoadon $hoadon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hoadon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function edit(hoadon $hoadon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hoadon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hoadon $hoadon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hoadon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function destroy(hoadon $hoadon)
    {
        //
    }
}

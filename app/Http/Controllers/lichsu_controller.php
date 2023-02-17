<?php

namespace App\Http\Controllers;

use App\Models\khuyenmai;
use App\Models\hoadon;
use App\Models\hoadon_chitiet;
use Illuminate\Http\Request;
use Auth;
use App\Models\khachhang;
use App\Models\nhanvien;
class lichsu_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoadon=hoadon::orderby('id','DESC')->paginate(10);
        return view('admin.lichsuhoadon.index',compact('hoadon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hoadon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $khuyenmai=khuyenmai::all();
        $hoadon_chitiet=hoadon_chitiet::where('hoadon_id',$id)->get();
        return view('admin.lichsuhoadon.chitiet',compact('hoadon_chitiet','khuyenmai'));
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
    public function update(Request $request, $id)
    {
        $hoadon=hoadon::find($id);
        $hoadon->nhanvien_id=Auth::user()->id;
        $hoadon->save();
        return redirect()->back();
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

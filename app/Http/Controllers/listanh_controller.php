<?php

namespace App\Http\Controllers;

use App\Models\sanpham;
use App\Models\loai;
use App\Models\noisanxuat;
use App\Models\baohanh;
use App\Models\hang;
use Illuminate\Http\Request;
use App\Imports\SanphamImport;
use App\Models\xuat_sanpham;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use App\Models\listanh;
use File;
use Excel;

class listanh_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sanpham_id)
    {
        $sanpham_id = $sanpham_id;
        return view('admin.listanh.themlistanh', compact('sanpham_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function chon(Request $request)
    {

        $sanpham_id = $request->sanpham_id;
        $listanh = listanh::where('sanpham_id', $sanpham_id)->get();
        $listanh_count = $listanh->count();
        $output = '   <form>
        ' . csrf_field() . '
        <table class="table">
        <thead>
            <tr>
                <th>Thứ tự</th>
                <th>Tên hình ảnh</th>
                <th>Hình ảnh</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
        ';
        if ($listanh_count > 0) {
            $i = 0;
            foreach ($listanh as $item) {
                $i++;
                $output .= '
              
                <tr>
                <td>' . $i . '</td>
                <td contenteditable class="edit_tenanh" data-id="' . $item->id . '" >' . $item->tenanh . '</td>
                <td><img src="' . url('public/uploads/listanh/' . $item->anh) . '" class="img-thumbnail" width="120" height="120" ></td>
                <td>
                    <button type="button" data-id="' . $item->id . '" class="btn btn-secondary delete-listanh ">Xóa</button>
                </td>
            </tr>
           
                ';
            }
        } else {
            $output .= ' <tr>
            <td colspan="4">Sản phầm chưa có thư viện ảnh</td>
        </tr>
            ';
        }
        $output .= ' </tbody>
        </table>
        </form>
        ';
        echo $output;
    }

    public function sua(Request $request)
    {
        $id = $request->id;
        $gal_text = $request->gal_text;
        $listanh = listanh::find($id);
        $listanh-> tenanh = $gal_text;
        $listanh->save();
    }
    public function xoa(Request $request){
        $id =$request->id;
        $listanh = listanh::find($id);
        unlink('public/uploads/listanh/'.$listanh->anh);
        $listanh->delete();
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

    public function insert(Request $request, $sanpham_id)
    {
        $get_img = $request->file('file');
        if ($get_img) {
            foreach ($get_img as $item) {
                $get_name_img = $item->getClientOriginalName();
                $name_img = current(explode('.', $get_name_img));
                $new_img = $name_img . rand(0, 99) . '.' . $item->getClientOriginalExtension();
                $item->move('public/uploads/listanh', $new_img);
                $listanh = new listanh();
                $listanh->tenanh = $new_img;
                $listanh->anh = $new_img;
                $listanh->sanpham_id = $sanpham_id;
                $listanh->save();
            }
        }
        Session::put('message', 'Thêm ảnh thành công');
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\listanh  $listanh
     * @return \Illuminate\Http\Response
     */
    public function show(listanh $listanh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\listanh  $listanh
     * @return \Illuminate\Http\Response
     */
    public function edit(listanh $listanh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\listanh  $listanh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, listanh $listanh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\listanh  $listanh
     * @return \Illuminate\Http\Response
     */
    public function destroy(listanh $listanh)
    {
        //
    }
}

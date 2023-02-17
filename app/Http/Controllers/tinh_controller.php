<?php

namespace App\Http\Controllers;

use App\Models\tinh;
use App\Imports\TinhImport;
use Excel;


use Illuminate\Http\Request;

class tinh_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tinh = tinh::all();
        return view('admin.tinh.index', compact('tinh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tinh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'matinh.required' => 'Thời gian bảo hành không được bỏ trống',
            'tentinh.unique' => 'Thời gian bảo hành đã được sử dụng',
        ];
        $request->validate([
            'matinh' => 'required|max:100|unique:tinh',

        ], $messages);
        $tinh = new tinh;
        $tinh->matinh = $request->matinh;
        $tinh->tentinh = $request->tentinh;
        $tinh->save();
        return redirect('admin/tinh');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tinh  $tinh
     * @return \Illuminate\Http\Response
     */
    public function show(tinh $tinh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tinh  $tinh
     * @return \Illuminate\Http\Response
     */
    public function edit($matinh)
    {
        $tinh = tinh::find($matinh);

        return view('admin.tinh.edit', compact('tinh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tinh  $tinh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $matinh)
    {
        $messages = [
            'matinh.required' => 'Thời gian bảo hành không được bỏ trống',

        ];
        $request->validate([
            'matinh' => 'required|max:100',

        ], $messages);
        $tinh = tinh::find($matinh);
        $tinh->matinh = $request->matinh;
        $tinh->tentinh = $request->tentinh;
        $tinh->save();
        return redirect('admin/tinh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tinh  $tinh
     * @return \Illuminate\Http\Response
     */
    public function destroy(tinh $tinh)
    {
        //
    }
    public function delete($matinh)
    {
        $tinh = tinh::find($matinh);
        if ($tinh->delete()) {
            return redirect()->back();
        }
    }
    public function postNhap(Request $request)
    {
        Excel::import(new TinhImport, $request->file('file_excel'));

        return redirect('admin/tinh');
    }

}

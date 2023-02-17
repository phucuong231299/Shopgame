<?php

namespace App\Http\Controllers;

use App\Models\huyen;
use App\Models\tinh;
use App\Imports\HuyenImport;
use Illuminate\Http\Request;
use Excel;

class huyen_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $huyen = huyen::all();
        $tinh = tinh::all();
        return view('admin.huyen.index', compact('huyen', 'tinh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tinh = tinh::all();
        return view('admin.huyen.create', compact('tinh'));
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
            'mahuyen.required' => 'Thời gian bảo hành không được bỏ trống',
            'mahuyen.unique' => 'Thời gian bảo hành đã được sử dụng',
        ];
        $request->validate([
            'mahuyen' => 'required|max:100|unique:huyen',

        ], $messages);
        $huyen = new huyen;
        $huyen->mahuyen = $request->mahuyen;
        $huyen->tenhuyen = $request->tenhuyen;
        $huyen->matinh = $request->matinh;
        $huyen->save();
        return redirect('admin/huyen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\huyen  $huyen
     * @return \Illuminate\Http\Response
     */
    public function show(huyen $huyen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\huyen  $huyen
     * @return \Illuminate\Http\Response
     */
    public function edit($mahuyen)
    {
        $huyen = huyen::find($mahuyen);
        $tinh = tinh::all();
        return view('admin.huyen.edit', compact('huyen', 'tinh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\huyen  $huyen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mahuyen)
    {
        $messages = [
            'mahuyen.required' => 'Thời gian bảo hành không được bỏ trống',

        ];
        $request->validate([
            'mahuyen' => 'required|max:100',

        ], $messages);
        $huyen = huyen::find($mahuyen);
        $huyen->mahuyen = $request->mahuyen;
        $huyen->tenhuyen = $request->tenhuyen;
        $huyen->matinh = $request->matinh;
        $huyen->save();
        return redirect('admin/huyen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\huyen  $huyen
     * @return \Illuminate\Http\Response
     */
    public function destroy(huyen $huyen)
    {
        //
    }
    public function delete($mahuyen)
    {
        $huyen = huyen::find($mahuyen);
        if ($huyen->delete()) {
            return redirect()->back();
        }
    }
    public function postNhap(Request $request)
    {
        Excel::import(new HuyenImport, $request->file('file_excel'));

        return redirect('admin/huyen');
    }
}

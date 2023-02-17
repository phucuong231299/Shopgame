<?php

namespace App\Http\Controllers;

use App\Models\thang;
use App\Models\nam;
use Illuminate\Http\Request;

class thang_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thang=thang::all();
        return view('admin.thang.index',compact('thang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nam=nam::all();
        return view('admin.thang.create',compact('nam'));
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
            'thang.required' => 'Thời gian bảo hành không được bỏ trống',
            'thang.unique' => 'Thời gian bảo hành đã được sử dụng',
        ];
        $request->validate([
            'thang'=>'required|max:100|unique:thang',

        ],$messages);
        $thang=new thang;
        $thang->thang=$request->thang;
        $thang->nam_id=$request->nam_id;
        $thang->save();
        return redirect('admin/thang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\thang  $thang
     * @return \Illuminate\Http\Response
     */
    public function show(thang $thang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\thang  $thang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thang=thang::find($id);

        return view('admin.thang.edit',compact('thang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\thang  $thang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'thang.required' => 'Thời gian bảo hành không được bỏ trống',

        ];
        $request->validate([
            'thang'=>'required|max:100',

        ],$messages);
        $thang=thang::find($id);
        $thang->thang=$request->thang;
        $thang->save();
        return redirect('admin/thang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\thang  $thang
     * @return \Illuminate\Http\Response
     */
    public function destroy(thang $thang)
    {
        //
    }
    public function delete($id)
    {
        $thang=thang::find($id);
        if($thang->delete()){
            return redirect()->back();
        }
    }
}

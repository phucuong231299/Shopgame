<?php

namespace App\Http\Controllers;

use App\Models\footer;
use Illuminate\Http\Request;

class footer_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.footer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $footer=[
            'gioithieu'=>$request->gioithieu,
            'diachi'=>$request->diachi,
            'muahangtragop'=>$request->muahangtragop,
            'thoigianlamviec'=>$request->thoigianlamviec,
        ];
        if(footer::create($footer)){
            return redirect('admin/slide');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function show(footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $footer=footer::find($id);
        return view('admin.footer.edit',compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $footer=footer::find($id);
        $footer=[
            'gioithieu'=>$request->gioithieu,
            'diachi'=>$request->diachi,
            'muahangtragop'=>$request->muahangtragop,
            'thoigianlamviec'=>$request->thoigianlamviec,
        ];
        if(footer::create($footer)){
            return redirect('admin/slide');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function destroy(footer $footer)
    {
        //
    }
}

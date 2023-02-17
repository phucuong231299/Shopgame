<?php

namespace App\Http\Controllers;

use App\Models\nam;
use App\Models\thang;
use Illuminate\Http\Request;

class nam_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nam=nam::all();
        $thang=thang::all();
        return view('admin.nam.index',compact('nam','thang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nam.create');
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
            'nam.required' => 'Thời gian bảo hành không được bỏ trống',
            'nam.unique' => 'Thời gian bảo hành đã được sử dụng',
        ];
        $request->validate([
            'nam'=>'required|max:100|unique:nam',

        ],$messages);
        $nam=new nam;
        $nam->nam=$request->nam;
        $nam->save();
        return redirect('admin/nam');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nam  $nam
     * @return \Illuminate\Http\Response
     */
    public function show(nam $nam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nam  $nam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nam=nam::find($id);

        return view('admin.nam.edit',compact('nam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nam  $nam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'nam.required' => 'Thời gian bảo hành không được bỏ trống',

        ];
        $request->validate([
            'nam'=>'required|max:100',

        ],$messages);
        $nam=nam::find($id);
        $nam->nam=$request->nam;
        $nam->save();
        return redirect('admin/nam');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nam  $nam
     * @return \Illuminate\Http\Response
     */
    public function destroy(nam $nam)
    {
        //
    }
    public function delete($id)
    {
        $nam=nam::find($id);
        if($nam->delete()){
            return redirect()->back();
        }
    }
}

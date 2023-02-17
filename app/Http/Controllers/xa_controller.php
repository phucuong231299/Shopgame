<?php

namespace App\Http\Controllers;

use App\Models\xa;
use App\Models\huyen;
use App\Imports\XaImport;
use Illuminate\Http\Request;
use Excel;
class xa_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $huyen=huyen::all();
        $xa=xa::all();
        return view('admin.xa.index',compact('xa','huyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $huyen=huyen::all();
        return view('admin.xa.create',compact('huyen'));
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
            'maxa.required' => 'Mã xã không được bỏ trống',
            'maxa.unique' => 'Mã xã đã được sử dụng',
        ];
        $request->validate([
            'maxa'=>'required|max:100|unique:xa',

        ],$messages);
        $xa=new xa;
        $xa->maxa=$request->maxa;
        $xa->tenxa=$request->tenxa;
        $xa->mahuyen=$request->mahuyen;
        $xa->save();
        return redirect('admin/xa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\xa  $xa
     * @return \Illuminate\Http\Response
     */
    public function show(xa $xa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\xa  $xa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $xa=xa::find($id);

        return view('admin.xa.edit',compact('xa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\xa  $xa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'maxa.required' => 'Mã xã không được bỏ trống',

        ];
        $request->validate([
            'maxa'=>'required|max:100',

        ],$messages);
        $xa=xa::find($id);
        $xa->maxa=$request->maxa;
        $xa->tenxa=$request->tenxa;
        $xa->mahuyen=$request->mahuyen;
        $xa->save();
        return redirect('admin/xa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\xa  $xa
     * @return \Illuminate\Http\Response
     */
    public function destroy(xa $xa)
    {
        //
    }
    public function delete($id)
    {
        $xa=xa::find($id);
        if($xa->delete()){
            return redirect()->back();
        }
    }
    public function postNhap(Request $request)
    {
        Excel::import(new XaImport, $request->file('file_excel'));

        return redirect('admin/xa');
    }
}

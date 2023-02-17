<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bia;
use Illuminate\Support\Str;
use File;

class bia_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('anh')){
            $file=$request->anh;
            $ex=$request->anh->extension();
            $file_name=time().''.Str::slug($request->ten).''.'.'.$ex;
            $file->move(public_path('bia'),$file_name);
        }
        $bia=[
            'anh'=>$file_name,
            'tuade'=>$request->tuade,
            'tomtat'=>$request->tomtat,
            'noidung'=>$request->noidung,
            'status'=>$request->status,
        ];
        //$request->merge(['anh'=>$file_name]);
        if(bia::create($bia)){
            return redirect('admin/slide');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bia  $bia
     * @return \Illuminate\Http\Response
     */
    public function show(bia $bia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bia  $bia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=bia::find($id);
        return view('admin.bia.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bia  $bia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->has('anh')){
            $file=$request->anh;
            $ex=$request->anh->extension();
            $file_name=time().''.$request->tensp.''.'.'.$ex;
            $file->move(public_path('bia'),$file_name);

            $bia=bia::find($id);
            File::delete('public/bia/'.$bia->anh);
            //$request->merge(['anh'=>$file_name]);
        }
        $anhcu=bia::find($id);
        $bia=[
            'anh'=>$request->has('anh')?$file_name:$anhcu->anh,
            'tuade'=>$request->tuade,
            'tomtat'=>$request->tomtat,
            'noidung'=>$request->noidung,
            'status'=>$request->status, 
        ];
        if(bia::find($id)->update($bia)){
            return redirect('admin/slide');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bia  $bia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bia=bia::find($id);
        $duongdan = 'public/bia';
        File::delete($duongdan.'/'.$bia->anh);
        $bia->delete();
        return redirect()->back()->with('yes','Xóa bia thành công');
    }
}

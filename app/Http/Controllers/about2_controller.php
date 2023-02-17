<?php

namespace App\Http\Controllers;

use App\Models\about2;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class about2_controller extends Controller
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
        return view('admin.about2.create');
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
            $file->move(public_path('about2'),$file_name);
        }
        $about2=[
            'anh'=>$file_name,
            'tuade'=>$request->tuade,
            'noidung'=>$request->noidung,
            'status'=>$request->status,
        ];
        //$request->merge(['anh'=>$file_name]);
        if(about2::create($about2)){
            return redirect('admin/slide');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\about2  $about2
     * @return \Illuminate\Http\Response
     */
    public function show(about2 $about2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\about2  $about2
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=about2::find($id);
        return view('admin.about2.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\about2  $about2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->has('anh')){
            $file=$request->anh;
            $ex=$request->anh->extension();
            $file_name=time().''.$request->tensp.''.'.'.$ex;
            $file->move(public_path('about2'),$file_name);

            $about2=about2::find($id);
            File::delete('public/about2/'.$about2->anh);
            //$request->merge(['anh'=>$file_name]);
        }
        $anhcu=about2::find($id);
        $about2=[
            'anh'=>$request->has('anh')?$file_name:$anhcu->anh,
            'tuade'=>$request->tuade,
            'noidung'=>$request->noidung,
        ];
        if(about2::find($id)->update($about2)){
            return redirect('admin/slide');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\about2  $about2
     * @return \Illuminate\Http\Response
     */
    public function destroy(about2 $about2)
    {
        //
    }
}

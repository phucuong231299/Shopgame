<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class about_controller extends Controller
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
        return view('admin.about.create');
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
            $file->move(public_path('about'),$file_name);
        }
        $about=[
            'anh'=>$file_name,
            'tuade'=>$request->tuade,
            'noidung'=>$request->noidung,
            'status'=>$request->status,
        ];
        //$request->merge(['anh'=>$file_name]);
        if(about::create($about)){
            return redirect('admin/slide');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function show(about $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=about::find($id);
        return view('admin.about.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->has('anh')){
            $file=$request->anh;
            $ex=$request->anh->extension();
            $file_name=time().''.$request->tensp.''.'.'.$ex;
            $file->move(public_path('about'),$file_name);

            $about=about::find($id);
            File::delete('public/about/'.$about->anh);
            //$request->merge(['anh'=>$file_name]);
        }
        $anhcu=about::find($id);
        $about=[
            'anh'=>$request->has('anh')?$file_name:$anhcu->anh,
            'tuade'=>$request->tuade,
            'noidung'=>$request->noidung,
        ];
        if(about::find($id)->update($about)){
            return redirect('admin/slide');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(about $about)
    {
        //
    }
}

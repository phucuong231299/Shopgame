<?php

namespace App\Http\Controllers;

use App\Models\slide;
use Illuminate\Http\Request;
use App\Models\bia;
use App\Models\about;
use App\Models\about2;
use App\Models\footer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use File;

class slide_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide=slide::paginate(10);
        $bia=bia::paginate(10);
        $about=about::paginate(10);
        $about2=about2::paginate(10);
        $footer=footer::paginate(10);
        return view('admin.slide.index',compact('slide','bia','about','about2','footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
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
            $file->move(public_path('slide'),$file_name);
        }
        $slide=[
            'anh'=>$file_name,
            'status'=>$request->status,
        ];
        //$request->merge(['anh'=>$file_name]);
        if(slide::create($slide)){
            return redirect('admin/slide');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data=slide::find($id);
        return view('admin.slide.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->has('anh')){
            $file=$request->anh;
            $ex=$request->anh->extension();
            $file_name=time().''.$request->tensp.''.'.'.$ex;
            $file->move(public_path('slide'),$file_name);

            $slide=slide::find($id);
            File::delete('public/slide/'.$slide->anh);
            //$request->merge(['anh'=>$file_name]);
        }
        $anhcu=slide::find($id);
        $slide=[
            'anh'=>$request->has('anh')?$file_name:$anhcu->anh,
            'status'=>$request->status, 
        ];
        if(slide::find($id)->update($slide)){
            return redirect('admin/slide');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide=slide::find($id);
        $duongdan = 'public/slide';
        File::delete($duongdan.'/'.$slide->anh);
        $slide->delete();
        return redirect()->back()->with('yes','Xóa slide thành công');
    }
}

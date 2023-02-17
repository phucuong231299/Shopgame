<?php

namespace App\Http\Controllers;

use App\Models\nhanvien;
use App\Models\chucvu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class chucvu_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chucvu = chucvu::all();
        return view('admin.chucvu.index', compact('chucvu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chucvu.create');
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
            'tenchucvu.required' => 'Tên chức vụ không được bỏ trống',

        ];
        $request->validate([
            'tenchucvu' => 'required|max:100|unique:chucvu',

        ], $messages);

        $chucvu = new chucvu;
        $chucvu->tenchucvu = $request->tenchucvu;
        $chucvu->save();
        return redirect('admin/chucvu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function show(chucvu $chucvu)
    {
        //
    }
    public function sua_chucvu(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'chucvu_value' => 'required|string|max:255',

            ],
            [
                'chucvu_value.required' => 'Tên chức vụ không được bỏ trống',


            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        } else {
            $chucvu = chucvu::find($request->id);

            $chucvu->tenchucvu = $data['chucvu_value'];
            $chucvu->save();
            return response()->json([
                'code' => 200,
                'mess' => 'Cập nhật thành công.'
            ]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chucvu = chucvu::find($id);

        return view('admin.chucvu.edit', compact('chucvu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'tenchucvu.required' => 'Tên chức vụ không được bỏ trống',

        ];
        $request->validate([
            'tenchucvu' => 'required|max:100',

        ], $messages);
        $chucvu = chucvu::find($id);
        $chucvu->tenchucvu = $request->tenchucvu;
        $chucvu->save();
        return redirect('admin/chucvu');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(chucvu::find($id)->nhanvien->count()){
            return redirect()->route('chucvu.index')->with('no','không thể xóa chức vụ vì có nhân viên đảm nhiệm');
        }else{
            $chucvu = chucvu::find($id);
            if ($chucvu->delete()) {
                return redirect()->back();
            }
        }
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\loai;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class loai_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loai = loai::search()->orderby('id', 'asc')->paginate(10);
        return view('admin.loai.index', compact('loai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.loai.create');
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
            'loai.required' => 'Loại sản phẩm không được bỏ trống',

        ];
        $request->validate([
            'loai' => 'required|max:100|unique:loai',

        ], $messages);
        $loai = new loai;
        $loai->loai = $request->loai;
        $loai->slug = str::slug($loai->loai);
        $loai->save();
        return redirect('admin/loai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\loai  $loai
     * @return \Illuminate\Http\Response
     */
    public function show(loai $loai)
    {
        //
    }
    public function sua_loai(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'loai_value' => 'required|string|max:255',

            ],
            [
                'loai_value.required' => 'Tên loại không được bỏ trống',


            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        } else {
            $loai = loai::find($request->id);

            $loai->loai = $data['loai_value'];
            $loai->save();
            return response()->json([
                'code' => 200,
                'mess' => 'Cập nhật thành công.'
            ]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loai  $loai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loai = loai::find($id);
        return view('admin.loai.edit', compact('loai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\loai  $loai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'loai.required' => 'Loại sản phẩm không được bỏ trống',

        ];
        $request->validate([
            'loai' => 'required|max:100',

        ], $messages);
        $loai = loai::find($id);
        $loai->loai = $request->loai;
        $loai->slug = str::slug($loai->loai);
        $loai->save();
        return redirect('admin/loai');
    }
    public function sua(Request $request, $id)
    {
        $loai = loai::find($id);
        $loai->trangthai = $request->trangthai;
        $loai->save();
        return redirect('admin/loai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\loai  $loai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        if (loai::find($id)->sanpham->count()) {
            return redirect()->route('loai.index')->with('no', 'không thể xóa loại sản phẩm vì có sản phẩm');
        } else {
            $loai = loai::find($id);
            if ($loai->delete()) {
                return redirect()->back();
            }
        }
    }
}

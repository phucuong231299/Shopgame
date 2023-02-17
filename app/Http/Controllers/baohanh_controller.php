<?php

namespace App\Http\Controllers;

use App\Models\baohanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class baohanh_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baohanh = baohanh::paginate(2);
        return view('admin.baohanh.index', compact('baohanh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.baohanh.create');
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
            'thoigianbaohanh.required' => 'Thời gian bảo hành không được bỏ trống',
            'thoigianbaohanh.unique' => 'Thời gian bảo hành đã được sử dụng',
        ];
        $request->validate([
            'thoigianbaohanh' => 'required|max:100|unique:baohanh',

        ], $messages);
        $baohanh = new baohanh;
        $baohanh->thoigianbaohanh = $request->thoigianbaohanh;
        $baohanh->save();
        return redirect('admin/baohanh');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\baohanh  $baohanh
     * @return \Illuminate\Http\Response
     */
    public function show(baohanh $baohanh)
    {
        //
    }
    public function sua_bh(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'bh_value' => 'required|string|max:255',

            ],
            [
                'bh_value.required' => 'Thời gian bảo hành không được bỏ trống',


            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        } else {

            $baohanh = baohanh::find($request->id);

            $baohanh->thoigianbaohanh = $data['bh_value'];
            $baohanh->save();
            return response()->json([
                'code' => 200,
                'mess' => 'Cập nhật thành công.'
            ]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\baohanh  $baohanh
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baohanh = baohanh::find($id);

        return view('admin.baohanh.edit', compact('baohanh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\baohanh  $baohanh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'thoigianbaohanh.required' => 'Thời gian bảo hành không được bỏ trống',

        ];
        $request->validate([
            'thoigianbaohanh' => 'required|max:100',

        ], $messages);
        $baohanh = baohanh::find($id);
        $baohanh->thoigianbaohanh = $request->thoigianbaohanh;
        $baohanh->save();
        return redirect('admin/baohanh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\baohanh  $baohanh
     * @return \Illuminate\Http\Response
     */
    public function destroy(baohanh $baohanh)
    {
        //
    }
    public function delete($id)
    {
        if (baohanh::find($id)->sanpham->count()) {
            return redirect()->route('hang.index')->with('no', 'không thể xóa sản phẩm sản phẩm vì có sản phẩm');
        } else {
            $baohanh = baohanh::find($id);
            if ($baohanh->delete()) {
                return redirect()->back();
            }
        }
    }
}

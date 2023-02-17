<?php

namespace App\Http\Controllers;

use App\Models\hang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class hang_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hang = hang::all();
        return view('admin.hang.index', compact('hang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hang.create');
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
            'hang.required' => 'Hãng không được bỏ trống',

        ];
        $request->validate([
            'hang' => 'required|max:100|unique:hang',

        ], $messages);
        $hang = new hang;
        $hang->hang = $request->hang;
        $hang->save();
        return redirect('admin/hang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hang  $hang
     * @return \Illuminate\Http\Response
     */
    public function show(hang $hang)
    {
        //
    }
    public function sua_hang(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'hang_value' => 'required|string|max:255',

            ],
            [
                'hang_value.required' => 'Tên hãng không được bỏ trống',


            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        } else {
            $hang = hang::find($request->id);

            $hang->hang = $data['hang_value'];
            $hang->save();
            return response()->json([
                'code' => 200,
                'mess' => 'Cập nhật thành công.'
            ]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hang  $hang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hang = hang::find($id);
        return view('admin.hang.edit', compact('hang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hang  $hang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'hang.required' => 'Hãng không được bỏ trống',

        ];
        $request->validate([
            'hang' => 'required|max:100',

        ], $messages);
        $hang = hang::find($id);
        $hang->hang = $request->hang;
        $hang->save();
        return redirect('admin/hang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hang  $hang
     * @return \Illuminate\Http\Response
     */
    public function destroy(hang $hang)
    {
        //
    }
    public function delete($id)
    {
        if (hang::find($id)->sanpham->count()) {
            return redirect()->route('hang.index')->with('no', 'không thể xóa hãng sản phẩm vì có sản phẩm');
        } else {
            $hang = hang::find($id);
            if ($hang->delete()) {
                return redirect()->back();
            }
        }
    }
}

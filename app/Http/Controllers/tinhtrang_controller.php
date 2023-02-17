<?php

namespace App\Http\Controllers;

use App\Models\tinhtrang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class tinhtrang_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tinhtrang=tinhtrang::all();
        return view ('admin.tinhtrang.index', compact('tinhtrang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tinhtrang.create');
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
            'tinhtrang.required' => 'Tình trạng không được bỏ trống',
        ];
        $request->validate([
            'tinhtrang'=>'required|max:100|unique:tinhtrang',

        ],$messages);
        $tinhtrang= new tinhtrang;
        $tinhtrang->tinhtrang=$request->tinhtrang;
        $tinhtrang->save();
        return redirect('admin/tinhtrang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tinhtrang  $tinhtrang
     * @return \Illuminate\Http\Response
     */
    public function show(tinhtrang $tinhtrang)
    {
        //
    }
    public function sua_tinhtrang(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'tinhtrang_value' => 'required|string|max:255',

            ],
            [
                'tinhtrang_value.required' => 'Tình trạng không được bỏ trống',


            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        } else {
            $tinhtrang = tinhtrang::find($request->id);

            $tinhtrang->tinhtrang = $data['tinhtrang_value'];
            $tinhtrang->save();
            return response()->json([
                'code' => 200,
                'mess' => 'Cập nhật thành công.'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tinhtrang  $tinhtrang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tinhtrang=tinhtrang::find($id);
        return view('admin.tinhtrang.edit', compact('tinhtrang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tinhtrang  $tinhtrang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'tinhtrang.required' => 'Tình trạng không được bỏ trống',
        ];
        $request->validate([
            'tinhtrang'=>'required|max:100',

        ],$messages);
        $tinhtrang=tinhtrang::find($id);
        $tinhtrang->tinhtrang=$request->tinhtrang;
        $tinhtrang->save();
        return redirect('admin/tinhtrang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tinhtrang  $tinhtrang
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
     
        $tinhtrang=tinhtrang::find($id);
        if ($tinhtrang->delete()){
            return redirect()->back();
        }  
    }
}

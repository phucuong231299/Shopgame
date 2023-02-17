<?php

namespace App\Http\Controllers;

use App\Models\noisanxuat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class noisanxuat_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noisanxuat = noisanxuat::all();
        return view('admin.noisanxuat.index', compact('noisanxuat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.noisanxuat.create');
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
            'noisanxuat.required' => 'Nơi sản xuất không được bỏ trống',
        ];
        $request->validate([
            'noisanxuat' => 'required|max:100|unique:noisanxuat',

        ], $messages);
        $noisanxuat = new noisanxuat;
        $noisanxuat->noisanxuat = $request->noisanxuat;
        $noisanxuat->save();
        return redirect('admin/noisanxuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\noisanxuat  $noisanxuat
     * @return \Illuminate\Http\Response
     */
    public function show(noisanxuat $noisanxuat)
    {
        //
    }
    public function sua_nsx(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'nsx_value' => 'required|string|max:255',

            ],
            [
                'nsx_value.required' => 'Nơi sản xuất không được bỏ trống',


            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        } else {
            $noisanxuat = noisanxuat::find($request->id);

            $noisanxuat->noisanxuat = $data['nsx_value'];
            $noisanxuat->save();
            return response()->json([
                'code' => 200,
                'mess' => 'Cập nhật thành công.'
            ]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\noisanxuat  $noisanxuat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noisanxuat = noisanxuat::find($id);
        return view('admin.noisanxuat.edit', compact('noisanxuat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\noisanxuat  $noisanxuat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'noisanxuat.required' => 'Nơi sản xuất không được bỏ trống',
        ];
        $request->validate([
            'noisanxuat' => 'required|max:100',

        ], $messages);
        $noisanxuat = noisanxuat::find($id);
        $noisanxuat->noisanxuat = $request->noisanxuat;
        $noisanxuat->save();
        return redirect('admin/noisanxuat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\noisanxuat  $noisanxuat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function delete($id)
    {

        $noisanxuat = noisanxuat::find($id);
        if ($noisanxuat->delete()) {
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\tinh;
use App\Models\huyen;
use App\Models\xa;
use App\Models\vanchuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class vanchuyen_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vanchuyen = vanchuyen::all();
        $tinh = tinh::all();
        $huyen = huyen::all();
        $xa = xa::all();
        return view('admin.vanchuyen.index', compact('vanchuyen', 'tinh', 'huyen', 'xa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tinh = tinh::orderby('matinh', 'ASC')->get();
        $huyen = huyen::all();
        $xa = xa::all();
        return view('admin.vanchuyen.create', compact('tinh', 'huyen', 'xa'));
    }

    public function chon(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "tinh") {
                $chon_huyen = huyen::where('matinh', $data['matinh'])->orderby('mahuyen', 'ASC')->get();
                $output .= '<option>-- Chọn Huyện --</option>';
                foreach ($chon_huyen as $item) {
                    $output .= '<option value="' . $item->mahuyen . '">' . $item->tenhuyen . '</option>';
                }
            } else {
                $chon_xa = xa::where('mahuyen', $data['matinh'])->orderby('maxa', 'ASC')->get();
                $output .= '<option>-- Chọn Xã --</option>';
                foreach ($chon_xa as $item) {
                    $output .= '<option value="' . $item->maxa . '">' . $item->tenxa . '</option>';
                }
            }
        }
        echo $output;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }
    public function hien(Request $request)
    {
        $vanchuyen = vanchuyen::orderby('id', 'DESC')->get();
        $output = '';
        $output .= '<div class="table-responsive">
        <table class="table table-bordered">
            <thread> 
                <tr>
                    <th> Tên Tĩnh </th>
                    <th> Tên huyện </th>
                    <th> Tên xã </th>
                    <th> Phí vấn chuyển </th>
                </tr>
            </thread>
            <tbody>
            ';
        foreach ($vanchuyen as $item) {
            $output .= '
            <tr>
                <td>' . $item->tinh->tentinh . '</td>
                <td>' . $item->huyen->tenhuyen . '</td>
                <td>' . $item->xa->tenxa . '</td>
                <td contenteditable data-id="' . $item->id . '" class="sotien_sua">' . number_format($item->sotien) . '<u>đ</u></td>
            </tr>
            ';
        }
        $output .= '
            </tbody>

            </table>
            </div>
            ';

        echo $output;
    }
    public function them(Request $request)
    {
        $data = $request->all();
        $vanchuyen = new vanchuyen();
        $vanchuyen->tinh_id = $data['tinh'];
        $vanchuyen->huyen_id = $data['huyen'];
        $vanchuyen->xa_id = $data['xa'];
        $vanchuyen->sotien = $data['sotien'];
        $vanchuyen->save();
    }
    public function sua(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'sotien_value' => 'required|numeric',

            ],
            [
                'sotien_value.required' => 'Số tiền không được bỏ trống',
                'sotien_value.numeric' => 'Số tiền phải là kiểu số '


            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        } else {
            $vanchuyen = vanchuyen::find($request->id);

            $vanchuyen->sotien = $data['sotien_value'];
            $vanchuyen->save();
            return response()->json([
                'code' => 200,
                'mess' => 'Cập nhật thành công.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vanchuyen  $vanchuyen
     * @return \Illuminate\Http\Response
     */
    public function show(vanchuyen $vanchuyen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vanchuyen  $vanchuyen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tinh = tinh::all();
        $huyen = huyen::all();
        $xa = xa::all();
        $vanchuyen = vanchuyen::find($id);
        return view('admin.vanchuyen.edit', compact('vanchuyen', 'tinh', 'huyen', 'xa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vanchuyen  $vanchuyen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vanchuyen = vanchuyen::find($id);
        $vanchuyen->tinh_id = $request->tinh_id;
        $vanchuyen->huyen_id = $request->huyen_id;
        $vanchuyen->xa_id = $request->xa_id;
        $vanchuyen->sotien = $request->sotien;
        $vanchuyen->save();
        return redirect('admin/vanchuyen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vanchuyen  $vanchuyen
     * @return \Illuminate\Http\Response
     */
    public function destroy(vanchuyen $vanchuyen)
    {
        //
    }
    public function delete($id)
    {
        $vanchuyen = vanchuyen::find($id);
        if ($vanchuyen->delete()) {
            return redirect()->back();
        }
    }
}

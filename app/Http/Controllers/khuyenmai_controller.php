<?php

namespace App\Http\Controllers;

use App\Models\khuyenmai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

session_start();

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Session;

class khuyenmai_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::now();
        $khuyenmai = khuyenmai::all();
        return view('admin.khuyenmai.index', compact('khuyenmai', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.khuyenmai.create');
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
            'tenkhuyenmai.required' => 'Tên khuyến mãi không được bỏ trống',
            'makhuyenmai.required' => 'Mã khuyến mãi không được bỏ trống',
            'tiengiam.required' => 'Số tiền giảm không được bỏ trống',

        ];
        $request->validate([
            'tenkhuyenmai' => 'required|max:100|unique:khuyenmai',
            'makhuyenmai' => 'required|max:100|unique:khuyenmai',
            'tiengiam' => 'required|max:100',

        ], $messages);
        $khuyenmai = new khuyenmai;
        $khuyenmai->tenkhuyenmai = $request->tenkhuyenmai;
        $khuyenmai->nsx = $request->nsx;
        $khuyenmai->hsd = $request->hsd;
        $khuyenmai->makhuyenmai = $request->makhuyenmai;
        $khuyenmai->tiengiam = $request->tiengiam;
        $khuyenmai->save();
        return redirect('admin/khuyenmai');
    }
    public function sua(Request $request, $id)
    {
        $khuyenmai = khuyenmai::find($id);
        $khuyenmai->status = $request->status;
        $khuyenmai->save();
        return redirect('admin/khuyenmai');
    }
    public function sua_khuyenmai(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'tiengiam_value' => 'required|numeric',

            ],
            [
                'tiengiam_value.required' => 'Số tiền không được bỏ trống',
                'tiengiam_value.numeric' => 'Số tiền phải là kiểu số '


            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        } else {
            $khuyenmai = khuyenmai::find($request->id);

            $khuyenmai->tiengiam = $data['tiengiam_value'];
            $khuyenmai->save();
            return response()->json([
                'code' => 200,
                'mess' => 'Cập nhật thành công.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\khuyenmai  $khuyenmai
     * @return \Illuminate\Http\Response
     */
    public function show(khuyenmai $khuyenmai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\khuyenmai  $khuyenmai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khuyenmai = khuyenmai::find($id);
        return view('admin.khuyenmai.edit', compact('khuyenmai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\khuyenmai  $khuyenmai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'tenkhuyenmai.required' => 'Tên khuyến mãi không được bỏ trống',
            'makhuyenmai.required' => 'Mã khuyến mãi không được bỏ trống',
            'tiengiam.required' => 'Số tiền giảm không được bỏ trống',

        ];
        $request->validate([
            'tenkhuyenmai' => 'required|max:100',
            'makhuyenmai' => 'required|max:100',
            'tiengiam' => 'required|max:100',

        ], $messages);
        $khuyenmai = khuyenmai::find($id);
        $khuyenmai->tenkhuyenmai = $request->tenkhuyenmai;
        $khuyenmai->nsx = $request->nsx;
        $khuyenmai->hsd = $request->hsd;
        $khuyenmai->makhuyenmai = $request->makhuyenmai;
        $khuyenmai->tiengiam = $request->tiengiam;
        $khuyenmai->save();
        return redirect('admin/khuyenmai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\khuyenmai  $khuyenmai
     * @return \Illuminate\Http\Response
     */
    public function destroy(khuyenmai $khuyenmai)
    {
        //
    }
    public function delete($id)
    {
        $khuyenmai = khuyenmai::find($id);
        if ($khuyenmai->delete()) {
            return redirect()->back();
        }
    }

    public function xoa_khuyenmai()
    {
        $khuyenmai = Session::get('coupon');
        if ($khuyenmai == true) {
            Session::forget('coupon');
            return redirect()->back();
        }
    }
}

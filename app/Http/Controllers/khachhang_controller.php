<?php

namespace App\Http\Controllers;

use App\Models\khachhang;
use Illuminate\Http\Request;
use file;
use Str;
use Illuminate\Support\Facades\Validator;

class khachhang_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khachhang = khachhang::all();
        return view('admin.khachhang.index', compact('khachhang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.khachhang.create');
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
            'hoten.required' => 'Họ tên khách hàng không được bỏ trống',
            'gioitinh.required' => 'Giới tính khách hàng không được bỏ trống',
            'sdt.required' => 'Số điện thoại khách hàng không được bỏ trống',
            'cmnd.required' => 'Chứng minh nhân dân khách hàng không được bỏ trống',
            'ngaysinh.required' => 'Ngày sinh khách hàng không được bỏ trống',
            'diachi.required' => 'Địa chỉ khách hàng không được bỏ trống',
            'email.required' => 'Email khách hàng không được bỏ trống',
            'tendangnhap.required' => 'Tên đăng nhập khách hàng không được bỏ trống',
            'password.required' => 'Mất khẩu khách hàng không được bỏ trống',


        ];
        $request->validate([
            'hoten' => 'required|max:100',
            'gioitinh' => 'required|max:100',
            'sdt' => 'required|max:100',
            'cmnd' => 'required|max:100',
            'ngaysinh' => 'required|max:100',
            'diachi' => 'required|max:100',
            'email' => 'required|max:100',
            'tendangnhap' => 'required|max:100',
            'password' => 'required|max:100',

        ], $messages);
        $khachhang = new khachhang;
        $khachhang->hoten = $request->hoten;
        $khachhang->gioitinh = $request->gioitinh;
        $khachhang->sdt = $request->sdt;
        $khachhang->cmnd = $request->cmnd;
        $khachhang->ngaysinh = $request->ngaysinh;
        $khachhang->diachi = $request->diachi;
        $khachhang->email = $request->email;
        $khachhang->tendangnhap = $request->tendangnhap;
        $khachhang->password = bcrypt($request->password);



        if ($request->has('file_uploads')) {
            $file = $request->file_uploads;
            $ex = $request->file_uploads->extension();
            $tenhinh = time() . '-' . Str::slug($request->hoten) . '.' . $ex;
            $file->move(public_path('khachhang'), $tenhinh);
        }
        $request->merge(['anh' => $tenhinh]);
        $khachhang->anh = $request->anh;
        if ($khachhang->save()) {
            return redirect('admin/khachhang');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\khachhang  $khachhang
     * @return \Illuminate\Http\Response
     */
    public function show(khachhang $khachhang)
    {
        //
    }
    public function sua_hotenkh(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make(
            $request->all(),
            [
                'hoten_value' => 'required|string|max:255',

            ],
            [
                'hoten_value.required' => 'Họ và tên không được bỏ trống',


            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        } else {
            if (isset($data['hoten_value'])) {
                $khachhang = khachhang::find($request->id);
                $khachhang->hoten = $data['hoten_value'];
                $khachhang->save();
                return response()->json([
                    'code' => 200,
                    'mess' => 'Cập nhật thành công.'
                ]);
            }
        }
    }
    public function sua_sdtkh(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make(
            $request->all(),
            [
                'sdt_value' => 'required|numeric',
            ],
            [
                'sdt_value.required' => 'Số điện thoại không được bỏ trống',
                'sdt_value.max' => 'Số điện thoại không được vượt quá 10 ký tự',
                'sdt_value.numeric' => 'Số điện thoại phải là kiểu số '
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        } else {
            if (isset($data['sdt_value'])) {
                $khachhang = khachhang::find($request->id);
                $khachhang->sdt = $data['sdt_value'];
                $khachhang->save();
                return response()->json([
                    'code' => 200,
                    'mess' => 'Cập nhật thành công.'
                ]);
            }
        }
    }
    public function sua_cmndkh(Request $request)
    {
        $data = $request->all();
            $validator = Validator::make(
                $request->all(),
                [
                    'cmnd_value' => 'required|numeric',

                ],
                [
                    'cmnd_value.required' => 'CMND không được bỏ trống',
                    'cmnd_value.max' => 'CMND không được vượt quá 12 ký tự',
                    'cmnd_value.numeric' => 'CMND thoại phải nhập số '


                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all(),
                ]);
            } else {

                if (isset($data['cmnd_value'])) {
                    $khachhang = khachhang::find($request->id);
                    $khachhang->cmnd = $data['cmnd_value'];
                    $khachhang->save();
                    return response()->json([
                        'code' => 200,
                        'mess' => 'Cập nhật thành công.'
                    ]);
                }
            }
        
    }
    public function sua_diachikh(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make(
            $request->all(),
            [
                'diachi_value' => 'required|string|max:255',

            ],
            [
                'diachi_value.required' => 'Địa chỉ không được bỏ trống',


            ]
        );

        if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all(),
                ]);
            
        } else {

            if (isset($data['diachi_value'])) {
                $khachhang = khachhang::find($request->id);
                $khachhang->diachi = $data['diachi_value'];
                $khachhang->save();
                return response()->json([
                    'code' => 200,
                    'mess' => 'Cập nhật thành công.'
                ]);
            }
        }
    }
    public function sua_tendangnhapkh(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make(
            $request->all(),
            [
                'tendangnhap_value' => 'required|string|max:255',

            ],
            [
                'tendangnhap_value.required' => 'Tên đăng nhập không được bỏ trống',


            ]
        );

        if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all(),
                ]);
            
        } else {

            if (isset($data['tendangnhap_value'])) {
                $khachhang = khachhang::find($request->id);
                $khachhang->tendangnhap = $data['tendangnhap_value'];
                $khachhang->save();
                return response()->json([
                    'code' => 200,
                    'mess' => 'Cập nhật thành công.'
                ]);
            }
            else
            {
                return response()->json([
                    'code'=>404,
                    'mess'=>'Cập nhật không thành công.'
                ]);
            }
        }
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\khachhang  $khachhang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $khachhang = khachhang::find($id);
        return view('admin.khachhang.edit', compact('khachhang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\khachhang  $khachhang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'hoten.required' => 'Họ tên khách hàng không được bỏ trống',
            'gioitinh.required' => 'Giới tính khách hàng không được bỏ trống',
            'sdt.required' => 'Số điện thoại khách hàng không được bỏ trống',
            'cmnd.required' => 'Chứng minh nhân dân khách hàng không được bỏ trống',
            'ngaysinh.required' => 'Ngày sinh khách hàng không được bỏ trống',
            'diachi.required' => 'Địa chỉ khách hàng không được bỏ trống',
            'email.required' => 'Email khách hàng không được bỏ trống',
            'tendangnhap.required' => 'Tên đăng nhập khách hàng không được bỏ trống',
            'password.required' => 'Mất khẩu khách hàng không được bỏ trống',


        ];
        $request->validate([
            'hoten' => 'required|max:100',
            'gioitinh' => 'required|max:100',
            'sdt' => 'required|max:100',
            'cmnd' => 'required|max:100',
            'ngaysinh' => 'required|max:100',
            'diachi' => 'required|max:100',
            'email' => 'required|max:100',
            'tendangnhap' => 'required|max:100|unique:khachhang',
            'password' => 'required|max:100|unique:khachhang',

        ], $messages);
        $khachhang = khachhang::find($id);
        $khachhang->hoten = $request->hoten;
        $khachhang->gioitinh = $request->gioitinh;
        $khachhang->sdt = $request->sdt;
        $khachhang->cmnd = $request->cmnd;
        $khachhang->ngaysinh = $request->ngaysinh;
        $khachhang->diachi = $request->diachi;
        $khachhang->email = $request->email;
        $khachhang->tendangnhap = $request->tendangnhap;
        $khachhang->password = bcrypt($request->password);



        if ($request->has('file_uploads')) {
            $file = $request->file_uploads;
            $ex = $request->file_uploads->extension();
            $tenhinh = time() . '-' . Str::slug($request->hoten) . '.' . $ex;
            $file->move(public_path('khachhang'), $tenhinh);

            $khachhang = khachhang::find($id);
            $request->merge(['anh' => $tenhinh]);
        }
        $khachhang->anh = $request->anh;
        if (khachhang::find($id)->update($request->all())) {
            return redirect('admin/khachhang');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\khachhang  $khachhang
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $khachhang = khachhang::find($id);
        if ($khachhang->delete()) {
            return redirect()->back();
        }
    }
}

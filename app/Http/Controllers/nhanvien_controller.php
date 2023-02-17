<?php

namespace App\Http\Controllers;

use App\Models\nhanvien;
use App\Models\chucvu;
use Illuminate\Http\Request;
use App\Models\User;
use file;
use Str;

class nhanvien_controller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $nhanvien=nhanvien::all();
        return view('admin.nhanvien.index',compact('nhanvien'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $chucvu=chucvu::all();
        return view('admin.nhanvien.create',compact('chucvu'));  
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
            'hoten.required' => 'Họ tên nhân viên không được bỏ trống',
            'gioitinh.required' => 'Giới tính nhân viên không được bỏ trống',
            'sdt.required' => 'Số điện thoại nhân viên không được bỏ trống',
            'cmnd.required' => 'Chứng minh nhân dân nhân viên không được bỏ trống',
            'ngaysinh.required' => 'Ngày sinh nhân viên không được bỏ trống',
            'diachi.required' => 'Địa chỉ nhân viên không được bỏ trống',
            'email.required' => 'Email nhân viên không được bỏ trống',
            'tendangnhap.required' => 'Tên đăng nhập nhân viên không được bỏ trống',
            'password.required' => 'Mất khẩu nhân viên không được bỏ trống',
            'chucvu_id.required' => 'Quyền nhân viên không được bỏ trống',
           

        ];
        $request->validate([
            'hoten'=>'required|max:100',
            'gioitinh'=>'required|max:100',
            'sdt'=>'required|max:100',
            'cmnd'=>'required|max:100',
            'ngaysinh'=>'required|max:100',
            'diachi'=>'required|max:100',
            'email'=>'required|max:100',
            
            'tendangnhap'=>'required|max:100|unique:nhanvien',
            'password'=>'required|max:100|unique:nhanvien',
            'chucvu_id'=>'required|max:100',

        ],$messages);

        $nhanvien=new nhanvien;
        $nhanvien->hoten=$request->hoten;
        $nhanvien->gioitinh=$request->gioitinh;
        $nhanvien->ngaysinh=$request->ngaysinh;
        $nhanvien->diachi=$request->diachi;
        $nhanvien->sdt=$request->sdt;
        $nhanvien->cmnd=$request->cmnd;
        $nhanvien->chucvu_id=$request->chucvu_id;
        $nhanvien->tendangnhap=$request->tendangnhap;
        $nhanvien->password=bcrypt($request->password);
        $nhanvien->email=$request->email;
        
        if($request->has('file_uploads')){
            $file=$request->file_uploads;
            $ex=$request->file_uploads->extension();
            $tenhinh=time().'-'.Str::slug($request->hoten).'.'.$ex;
            $file->move(public_path('nhanvien'), $tenhinh);
        }
        $request->merge(['anh'=>$tenhinh]);
        $nhanvien->anh=$request->anh;
        if($nhanvien->save()) {    
            return redirect('admin/nhanvien');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function show(nhanvien $nhanvien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $chucvu=chucvu::all();
        $nhanvien=nhanvien::find($id);
        return view('admin.nhanvien.edit',compact('nhanvien','chucvu'));  
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'hoten.required' => 'Họ tên nhân viên không được bỏ trống',
            'gioitinh.required' => 'Giới tính nhân viên không được bỏ trống',
            'sdt.required' => 'Số điện thoại nhân viên không được bỏ trống',
            'cmnd.required' => 'Chứng minh nhân dân nhân viên không được bỏ trống',
            'ngaysinh.required' => 'Ngày sinh nhân viên không được bỏ trống',
            'diachi.required' => 'Địa chỉ nhân viên không được bỏ trống',
            'email.required' => 'Email nhân viên không được bỏ trống',
            'tendangnhap.required' => 'Tên đăng nhập nhân viên không được bỏ trống',
            'password.required' => 'Mất khẩu nhân viên không được bỏ trống',
            'chucvu_id.required' => 'Quyền nhân viên không được bỏ trống',
           

        ];
        $request->validate([
            'hoten'=>'required|max:100',
            'gioitinh'=>'required|max:100',
            'sdt'=>'required|max:100',
            'cmnd'=>'required|max:100',
            'ngaysinh'=>'required|max:100',
            'diachi'=>'required|max:100',
            'email'=>'required|max:100',
            'tendangnhap'=>'required|max:100',
            'password'=>'required',
            'chucvu_id'=>'required|max:100',

        ],$messages);
        $nhanvien=nhanvien::find($id);
        $nhanvien->hoten=$request->hoten;
        $nhanvien->gioitinh=$request->gioitinh;
        $nhanvien->ngaysinh=$request->ngaysinh;
        $nhanvien->diachi=$request->diachi;
        $nhanvien->sdt=$request->sdt;
        $nhanvien->cmnd=$request->cmnd;
        $nhanvien->chucvu_id=$request->chucvu_id;
        $nhanvien->tendangnhap=$request->tendangnhap;
        $nhanvien->password=bcrypt($request->password);
        $nhanvien->email=$request->email;
        
        if($request->has('file_uploads')){
            $file=$request->file_uploads;
            $ex=$request->file_uploads->extension();
            $tenhinh=time().'-'.Str::slug($request->hoten).'.'.$ex;
            $file->move(public_path('nhanvien'), $tenhinh);

            $nhanvien=nhanvien::find($id);
            $request->merge(['anh'=>$tenhinh]);
        }
       
        $nhanvien->anh=$request->anh;
        if(nhanvien::find($id)->update($request->all())){
            return redirect('admin/nhanvien');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(nhanvien::find($id)->chucvu->count()){
            return redirect()->route('nhanvien.index')->with('no','không thể xóa nhân viên vì có trong chức vụ');
        }else
        $nhanvien=nhanvien::find($id);
        if ($nhanvien->delete()){
            return redirect()->back();
        }   
    }
}

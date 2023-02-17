<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\loai;
use App\Models\sanpham;
use App\Models\khachhang;
use App\Models\hoadon;
use App\Models\nhanvien;
use App\Models\thongke;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Validator;
use File;
class admin_controller extends Controller
{
    public function index()
    {
       $sp=sanpham::all();
       $kh=khachhang::all();
       $dh=hoadon::where('nhanvien_id',null)->get();
       $nv=nhanvien::all();
       if(request()->ngaybatdau && request()->ngayketthuc){ 
          

           $dh1=hoadon::where('tinhtrang_id',1)->whereBetween('ngaydat',[request()->ngaybatdau,request()->ngayketthuc])->get();
           
           foreach($dh1 as $item)
           {
               $chart[]=array(
                   'id'=>$item->id,
                   'tongcong'=>$item->tongcong,
                   'ngaydat'=>$item->ngaydat,
                   'sum'=>$item->sum('tongcong'),  
               );
               
               
           }
           return response()->json([
               'dh'=>$chart,

           ]);  
          
       }
       return view('admin.homeadmin',compact('sp','kh','dh','nv'));
    }
    public function login()
    {
        return view('admin.login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt(['tendangnhap' => $request->tendangnhap, 'password' => $request->password])) {

            return redirect('admin/');
        } else {
            return redirect('admin/login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
    public function taikhoan()
    {
        $user = Auth::guard('user')->user();
        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('admin.thongtincanhan', compact('user', 'loai'));
    }
    public function update(Request $request)
    {
        $id = Auth::guard('user')->user()->id;
        $validator = Validator::make($request->all(), [
            'hoten' => 'required',
            'ngaysinh' => 'date|required',
            'gioitinh' => 'required|numeric',
            'diachi' => 'required',
            'sdt' => 'required|numeric',
            'cmnd' => 'required|numeric',
            'email' => 'required|email',
        ], [
            'hoten.required' => 'không được bỏ trống họ và tên',
            'ngaysinh.required' => 'không được bỏ trống ngày sinh',
            'gioitinh.required' => 'không được bỏ trống giới tính',
            'diachi.required' => 'không được bỏ trống địa chỉ',
            'sdt.required' => 'không được bỏ trống sdt',
            'sdt.numeric' => 'sdt phải là số',
            'cmnd.required' => 'không được bỏ trống cmnd',
            'cmnd.numeric' => 'cmnd phải là số',
            'email.required' => 'không được bỏ trống email',
            'email.numeric' => 'email phải có định dạng email',


        ]);
        if ($validator->passes()) {

            if ($request->file_anh != null) {
                $file = $request->file_anh;
                $ex = $request->file_anh->extension();
                $file_name = time() . '-' . Str::slug($request->hovaten) . '.' . $ex;
                $file->move(public_path('nhanvien'), $file_name);

                $data = nhanvien::find($id);
                File::delete('public/nhanvien/' . $data->anh);
                $request->merge(['anh' => $file_name]);
            }
            if ($nv = nhanvien::find($id)->update($request->all())) {
                return response()->json(['data' => $nv]);
            }
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }
 

   
}

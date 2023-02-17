<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\khachhang;
use App\Models\listanh;
use App\Models\loai;

use App\Models\noisanxuat;
use App\Models\baohanh;
use App\Models\hang;
use Illuminate\Support\Facades\DB;
use Dotenv\Validator as DotenvValidator;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Mail;
use File;
use Validator;
use Illuminate\Support\Facades\Hash;

class client_controller extends Controller
{
    public function index()
    {
        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.homeuser', compact('loai'));
    }
     
    public function chitiet_sanpham($slug)
    {
        $sanpham = sanpham::where('slug', $slug)->first();
        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return View('client.playstation.chitiet', compact('sanpham', 'loai'));
    }
    public function chitietsanpham($slug)
    {
        $url=url()->current();
        $sanpham = sanpham::where('slug', $slug)->first();
        $listanh = listanh::where('sanpham_id', $sanpham->id)->get();
        $sp1 = sanpham::inRandomOrder()->get();
        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return View('client.chitietsanpham', compact('sanpham', 'sp1', 'loai', 'listanh','url'));
    }
    //Thông tin
    public function thongtin()
    {

        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.thongtin.quydinhchung', compact('loai'));
    }
    public function tragop()
    {

        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.thongtin.tragop', compact('loai'));
    }
    public function datcoc()
    {

        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.thongtin.datcoc', compact('loai'));
    }
    public function baohanh()
    {

        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.thongtin.baohanh', compact('loai'));
    }
    public function Warranty()
    {

        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.thongtin.Warranty', compact('loai'));
    }
    public function vanchuyen()
    {

        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.thongtin.vanchuyen', compact('loai'));
    }
    public function doitra()
    {

        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.thongtin.doitra', compact('loai'));
    }

    public function view($slug)
    {
        $model = loai::where('slug', $slug)->first();
        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.sanpham', ['model' => $model, 'loai' => $loai]);
    }
    public function show($slug)
    {
        $model = loai::where('slug', $slug)->first();
        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.sanphamgame', ['model' => $model, 'loai' => $loai]);
    }
    public function timkiem(Request $request){

        $keywords =  $request->keywords_submit;

        $loai = DB::table('loai')->where('trangthai','0')->orderBy('loai', 'ASC')->get();

        $hang =DB::table('hang')->where('status','0')->orderBy('id','desc')->get();

        $all_sanpham =DB::table('sanpham')->where('tensp','like','%'.$keywords.'%')->get();
        
        return view('client.timkiem')->with('loai',$loai)->with('hang',$hang)->with('all_sanpham',$all_sanpham);
    }

    public function getdangky()
    {
        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.dangky', compact('loai'));
    }
    public function autocomplete(Request $request)
    {
        $url=url()->current();
        $data = $request->all();
        if ($data['query']) {
            $sanpham = sanpham::where('status', 0)->where('tensp', 'LIKE', '%' . $data['query'] . '%')->get();
            $output  = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($sanpham as $item) {
                $output .= '
                 <li class="li_search_ajax"><a href="#">' . $item->tensp . '</a></li>
              
                 ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function postdangky(Request $request)
    {
        $messages = [
            'hoten.required' => 'Họ tên không được bỏ trống',
            'gioitinh.required' => 'Giới tính không được bỏ trống',
            'cmnd.required' => 'Chứng minh nhân dân không được bỏ trống',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password_c.required' => 'Xác nhận Mật khẩu không được bỏ trống',
            'diachi.required' => 'địa chỉ không được bỏ trống',
            'ngaysinh.required' => 'Ngày sinh không được bỏ trống',

            'email.unique' => 'email đã được sử dụng',
            'email.required' => 'email không được bỏ trống',
            'tendangnhap.unique' => 'tên đăng nhập đã được sử dụng',
            'tendangnhap.required' => 'tên đăng nhập không được bỏ trống',
        ];
        $request->validate([
            'hoten' => 'required|max:100',
            'gioitinh' => 'required',
            'cmnd' => 'required|numeric',
            'diachi' => 'required|max:100',
            'sdt' => 'required|numeric',
            'ngaysinh' => 'required',
            'email' => 'required|unique:khachhang|email',
            'tendangnhap' => 'required|unique:khachhang',
            'password' => 'required',
            'password_c' => 'required|same:password',

        ], $messages);
        $token = strtoupper(Str::random(10));
        $khachhang = $request->only('tendangnhap', 'email', 'hoten', 'gioitinh', 'ngaysinh', 'diachi', 'sdt', 'anh', 'cmnd');
        $khachhang['password'] = bcrypt($request->password);
        $khachhang['token'] = $token;
        $khachhang['status'] = 0;
        if ($kh = khachhang::create($khachhang)) {
            Mail::send('client.email.xacnhanemail', compact('kh'), function ($email) use ($kh) {
                $email->subject('Game console Shop Xác nhận tài khoản');
                $email->to($kh->email, $kh->hoten);
            });
            return redirect('/dangky/dangky')->with('yes', 'Bạn đã đăng ký thành công vui lòng kích hoạt tài khoản qua email');
        }
        return redirect()->back();
    }
    public function kichhoat($khachhang, $token)
    {
        $khachhang = khachhang::find($khachhang);
        if ($khachhang->token === $token) {
            $khachhang->status = 1;
            $khachhang->token = null;
            $khachhang->save();
            return redirect('/login')->with('yes', 'Bạn đã kích hoạt tài khoản thành công vui lòng đăng nhập');
        } else {
            return redirect('/login')->with('no', 'Lỗi kích hoạt tài khoản');
        }
    }

    public function taikhoan()
    {
        $khachhang = Auth::guard('khachhang')->user();
        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.thongtincanhan', compact('khachhang', 'loai'));
    }

    public function login()
    {
        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.login', compact('loai'));
    }
    public function postlogin(Request $request)
    {
        $arr = [
            'tendangnhap' => $request->tendangnhap,
            'password' => $request->password
        ];

        // if(Auth::guard('khachhang')->attempt($arr))
        // {
        //     if(Auth::guard('khachhang')->user()->status==0){
        //         Auth::guard('khachhang')->logout();
        //         return redirect('/login')->with('no','Tài khoản chưa kích hoạt');
        //     }
        //     return redirect('/')->with('yes', 'Đăng nhập thành công');
        // }
        if (Auth::guard('khachhang')->attempt($arr)) {
            if (Auth::guard('khachhang')->user()->status == 0) {
                Auth::guard('khachhang')->logout();
                return redirect('/login')->with('no', 'Tài khoản chưa kích hoạt');
            }
            return redirect('/')->with('yesy', 'đăng nhập thành công');
        } else {
            return redirect('/login')->with('no', 'Tài khoản hoặc mật khẩu sai');
        }
    }
    public function logout()
    {
        Auth::guard('khachhang')->logout();
        return redirect('/');
    }
    public function doimatkhau()
    {
        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.doimatkhau', compact('loai'));
    }
    public function postdoimatkhau(Request $request)
    {
        $id = Auth::guard('khachhang')->user()->id;
        $kh = khachhang::find($id);
        $error = Validator::make($request->all(), [
            'password_cu' => 'required',
            'password_moi' => 'required',
            'password_xacnhan' => 'required|same:password_moi',
        ], [
            'password_cu.required' => 'Mật khẩu cũ không được bỏ trống',
            'password_moi.required' => 'Mật khẩu mới không được bỏ trống',
            'password_xacnhan.required' => 'Xác nhận Mật khẩu mới không được bỏ trống',
            'password_xacnhan.same' => 'Xác nhận Mật khẩu không chính xác',
        ]);
        if ($error->passes()) {
            if (Hash::check($request->password_cu, $kh->password)) {

                $validator = Validator::make($request->all(), [
                    'password_moi' => 'required',
                    'password_xacnhan' => 'required|same:password_moi',
                ], [
                    'password_moi.required' => 'Mật khẩu mới không được bỏ trống',
                    'password_xacnhan.required' => 'Xác nhận Mật khẩu mới không được bỏ trống',
                    'password_xacnhan.same' => 'Xác nhận Mật khẩu không chính xác',

                ]);
                if ($validator->passes()) {
                    $kh->password = bcrypt($request->password_moi);
                    $kh->save();
                    return response()->json([
                        'message' => 'Đổi mật khẩu thành công',
                        'code' => 200,
                    ]);
                }
                return response()->json([
                    'error' => $validator->errors()->all(),
                    'code' => 404,
                ]);
            } else {
                return response()->json([
                    'error' => 'Mật khẩu cũ sai',
                    'code' => 404,
                ]);
            }
        }
        return response()->json([
            'error' => $error->errors()->all(),
            'code' => 404,
        ]);
    }
    public function quenmatkhau()
    {

        $loai = loai::where('trangthai', 0)->orderBy('loai', 'ASC')->get();
        return view('client.quenmatkhau.quenmatkhau', compact('loai'));
    }
    public function postquenmatkhau(Request $request)
    {

        $request->validate([
            'email' => 'required|exists:khachhang',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.exists' => 'Email không tồn tại',
        ]);
        $kh = khachhang::where('email', $request->email)->first();
        $token = strtoupper(Str::random(10));
        $kh->update(['token' => $token]);
        Mail::send('client.email.quenmatkhau', compact('kh'), function ($email) use ($kh) {
            $email->subject('Console Shop Game - Lấy lại mật khẩu');
            $email->to($kh->email, $kh->hovaten);
        });
        return redirect('/')->with('yes', 'Bạn đã gửi yêu cầu đặt lại mật khẩu vui lòng check email để đặt lại mật khẩu');
    }
    public function kichhoatmatkhau($kh, $token)
    {
        $data = khachhang::find($kh);
        if ($data->token === $token) {

            return view('client.quenmatkhau.laylaimatkhau', compact('kh', 'token'))->with('yes', 'Xác nhận thành công vui lòng đặt lại mật khẩu');
        } else {
            return abort(404);
        }
    }
    public function laylaimatkhau(Request $request, $kh, $token)
    {
        $request->validate([
            'password' => 'required',
            'password_c' => 'required|same:password',

        ], [
            'password.required' => 'Khổng được bỏ trống mật khẩu',
            'password_c.required' => 'Khổng được bỏ trống xác nhận mật khẩu',
            'password_c.same' => 'Xác nhận mật khẩu không đúng',
        ]);

        $data = khachhang::find($kh);
        $data->password = bcrypt($request->password);
        $data->token = null;
        if ($data->save()) {
            return redirect('/')->with('yes', 'Bạn đã đổi mật khẩu thành công và có thể đăng nhập');
        }
    }
    public function update(Request $request){
        $id=Auth::guard('khachhang')->user()->id;
        $validator=Validator::make($request->all(),[
            'hoten'=>'required',
            'ngaysinh'=>'date|required',
            'gioitinh'=>'required|numeric',
            'diachi'=>'required',
            'sdt'=>'required|numeric',
            'cmnd'=>'required|numeric',
            'email'=>'required|email',
        ],[
            'hoten.required'=>'không được bỏ trống họ và tên',
            'ngaysinh.required'=>'không được bỏ trống ngày sinh',
            'gioitinh.required'=>'không được bỏ trống giới tính',
            'diachi.required'=>'không được bỏ trống địa chỉ',
            'sdt.required'=>'không được bỏ trống sdt',
            'sdt.numeric'=>'sdt phải là số',
            'cmnd.required'=>'không được bỏ trống cmnd',
            'cmnd.numeric'=>'cmnd phải là số',
            'email.required'=>'không được bỏ trống email',
            'email.numeric'=>'email phải có định dạng email',


        ]);
        if($validator->passes()){

            if($request->file_anh!=null){
                $file=$request->file_anh;
                $ex=$request->file_anh->extension();
                $file_name=time().'-'.Str::slug($request->hovaten).'.'.$ex;
                $file->move(public_path('khachhang'),$file_name);
    
                $data=khachhang::find($id);
                File::delete('public/khachhang/'.$data->anh);
                $request->merge(['anh'=>$file_name]);
            }
            if($kh=khachhang::find($id)->update($request->all())){
                return response()->json(['data'=>$kh]);
            }
        }
        return response()->json(['error'=>$validator->errors()->all()]);

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\sanpham;
use App\Models\loai;
use App\Models\noisanxuat;
use App\Models\baohanh;
use App\Models\hang;
use App\Models\hoadon_chitiet;
use Illuminate\Http\Request;
use App\Imports\SanphamImport;
use App\Models\xuat_sanpham;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use File;
use Excel;

class sanpham_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanpham=sanpham::search()->orderby('Loai_id','asc')->paginate(10);
        return view('admin.sanpham.index', compact('sanpham'));
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loai=loai::all();
        $baohanh=baohanh::all();
        $hang=hang::all();
        $noisanxuat=noisanxuat::all();
        return view('admin.sanpham.create', compact('loai', 'baohanh', 'noisanxuat', 'hang'));
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
            'tensp.required' => 'Tên sản phẩm không được bỏ trống',
            'file_uploads.required' =>'ảnh sản phẩm không được bỏ trống',
            'soluong.required' => 'Số lượng không được bỏ trống',
            'gianhap.required' => 'Giá nhập không được bỏ trống',
            'giaxuat.required' => 'Giá xuất không được bỏ trống',
            'loai_id.required' => 'Loại không được bỏ trống',
            'noisanxuat_id.required' => 'Nơi sản xuất không được bỏ trống',
            'baohanh_id.required' => 'Thời gian bảo hành không được bỏ trống',
            'hang_id.required' => 'Hãng không được bỏ trống',

        ];
        $request->validate([
            'tensp'=>'required|max:100',
            'file_uploads'=>'required|',
            'soluong'=>'required|numeric',
            'gianhap'=>'required|numeric',
            'giaxuat'=>'required|numeric',
            'loai_id'=>'required|numeric',
            'noisanxuat_id'=>'required|numeric',
            'baohanh_id'=>'required|numeric',
            'hang_id'=>'required|numeric',

        ],$messages);
        if($request->has('file_uploads') && $request->has('video')){
            $file=$request->file_uploads;
            $ex=$request->file_uploads->extension();
            $tenhinh=time().'-'.$request->tensp.'.'.$ex;
            $file->move(public_path('uploads'), $tenhinh);
            
           
        }
    
       
        $sanpham= new sanpham;
        $sanpham->tensp=$request->tensp;
        $sanpham->slug=str::slug($sanpham->tensp);
        $sanpham->anh=$tenhinh;
        $sanpham->soluong=$request->soluong;
        $sanpham->gianhap=$request->gianhap;
        $sanpham->giaxuat=$request->giaxuat;
        $sanpham->loai_id=$request->loai_id;
        $sanpham->hang_id=$request->hang_id;
        $sanpham->noisanxuat_id=$request->noisanxuat_id;
        $sanpham->baohanh_id=$request->baohanh_id;
        $sanpham->chitiet=$request->chitiet;
        $sanpham->video=$request->video;
        if($sanpham->save()){
            return redirect('admin/sanpham');
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function show(sanpham $sanpham)
    {
        //
    }
    public function sua_sp(Request $request)
    {
       
       $data = $request->all();
       $sanpham = sanpham::find($request->id);
      
       if(isset($data['soluong_value'])){
        $sanpham->soluong= $data['soluong_value'];
        $sanpham->save();
       }
       if(isset($data['tensp_value'])){
        $sanpham->tensp= $data['tensp_value'];
        $sanpham->slug=str::slug($sanpham->tensp);
        $sanpham->save();
       }

       if(isset($data['gianhap_value'])){
        $sanpham->gianhap= $data['gianhap_value'];
        $sanpham->save();
       }
      
       if(isset($data['giaxuat_value'])){
        $sanpham->giaxuat= $data['giaxuat_value'];
        $sanpham->save();
       }
       

      
    
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loai=loai::all();
        $noisanxuat=noisanxuat::all();
        $baohanh=baohanh::all();
        $hang=hang::all();
        $sanpham=sanpham::find($id);
        return view('admin.sanpham.edit',compact('sanpham','loai','noisanxuat','baohanh','hang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $messages = [
            'tensp.required' => 'Tên sản phẩm không được bỏ trống',
            'soluong.required' => 'Số lượng không được bỏ trống',
            'gianhap.required' => 'Giá nhập không được bỏ trống',
            'giaxuat.required' => 'Giá xuất không được bỏ trống',
            'loai_id.required' => 'Loại không được bỏ trống',
            'noisanxuat_id.required' => 'Nơi sản xuất không được bỏ trống',
            'baohanh_id.required' => 'Thời gian bảo hành không được bỏ trống',
            'hang_id.required' => 'Hãng không được bỏ trống',

        ];
        $request->validate([
            'tensp'=>'required|max:100',
            'soluong'=>'required|numeric',
            'gianhap'=>'required|numeric',
            'giaxuat'=>'required|numeric',
            'loai_id'=>'required|numeric',
            'noisanxuat_id'=>'required|numeric',
            'baohanh_id'=>'required|numeric',
            'hang_id'=>'required|numeric',

        ],$messages);
        $sanphamcu=sanpham::find($id);
        
        if($request->has('file_uploads') ){
            $file=$request->file_uploads;
            $ex=$request->file_uploads->extension();
            $tenhinh=time().'-'.$request->tensp.'.'.$ex;
            $file->move(public_path('uploads'), $tenhinh);

           

            File::delete('public/uploads'.'/'.$sanphamcu->anh);
          
           
        }
        if($request->has('video')){
            $file=$request->video;
            File::delete('public/video'.'/'.$sanphamcu->video);
        }
       
        $sanpham=sanpham::find($id);
        $sanpham->loai_id=$request->loai_id;
        $sanpham->hang_id=$request->hang_id;
        $sanpham->noisanxuat_id=$request->noisanxuat_id;
        $sanpham->baohanh_id=$request->baohanh_id;
        $sanpham->chitiet=$request->chitiet;
        $sanpham->anh=$request->has('file_uploads')?$tenhinh:$sanphamcu->anh;
        $sanpham->video=$request->video;
        if($sanpham->save()){

            return redirect('admin/sanpham');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getxuat(){
        return Excel::download(new xuat_sanpham,'danh-sach-san-pham.xlsx');
    }
    public function postnhap(Request $request){
        Excel::import(new SanphamImport,$request->file('file_excel'));
        return redirect('admin/sanpham');
    }
    public function delete($id)
    {
        if(sanpham::find($id)->hoadon_chitiet->count()){
            return redirect()->route('sanpham.index')->with('no','không thể xóa sản phẩm vì có trong đơn hàng');
        }else{
            $sanpham=sanpham::find($id);
            dd($id);
            if ($sanpham->delete()){
                return redirect()->back();
            } 
        }
         
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Excel;
use App\Models\nhap_sanpham;
use App\Models\xuat_sanpham;
use App\Models\sanpham;

class excel_controller extends Controller
{
    public function postnhap(Request $request){
        Excel::import(new nhap_sanpham,$request->file('file_excel'));
        return redirect('admin/sanpham');
    }
    public function getxuat(){
       
        return Excel::download(new xuat_sanpham,'danh-sach-san-pham');
    }
}

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// home client
Route::get('/', 'client_controller@index')->name('client.index');
Route::post('/tim-kiem','client_controller@timkiem')->name('timkiem.sanpham');
Route::get('loai/{slug}','client_controller@view')->name('client.view');
Route::get('loai/game/{slug}','client_controller@show')->name('client.show');
// lichsuhoadon
Route::get('/lichsuhoadon','hoadon_controller@lichsu')->name('hoadon.lichsuhoadon');
Route::get('/lichsuhoadon/chitiet/{id}','hoadon_controller@chitiet')->name('hoadon.chitiet');
// Playstation
Route::get('/PSP', 'client_controller@psportable')->name('client.psportable');
Route::get('/PSvita', 'client_controller@psvita')->name('client.psvita');
Route::get('/PS1', 'client_controller@ps1')->name('client.ps1');
Route::get('/PS2', 'client_controller@ps2')->name('client.ps2');
Route::get('/PS3', 'client_controller@ps3')->name('client.ps3');
Route::get('/PS4', 'client_controller@ps4')->name('client.ps4');
Route::get('/PS5', 'client_controller@ps5')->name('client.ps5');
// Nintendo
Route::get('/Nintendo-switch-Oled', 'client_controller@NTDSO')->name('client.NTDSO');
Route::get('/Nintendo-switch', 'client_controller@NTDS')->name('client.NTDS');
Route::get('/Nintendo-switch-lite', 'client_controller@NTDSL')->name('client.NTDSL');
// Nintendo
Route::get('/Xbox_S-X', 'client_controller@XBOXS')->name('client.xboxsx');
Route::get('/Xbox_one-360', 'client_controller@XBOXONE')->name('client.xboxone360');
// Game
Route::get('/Game-Playstation', 'client_controller@GAMEPS')->name('client.gameps');
Route::get('/Game-Nintendo', 'client_controller@GAMENIN')->name('client.gamenin');
Route::get('/Game-Xbox', 'client_controller@GAMEXB')->name('client.gamexb');
// phukien
Route::get('/Phukien', 'client_controller@PHUKIEN')->name('client.phukien');
//thông tin
Route::get('/quydinhchung', 'client_controller@thongtin')->name('client.thongtin');
Route::get('/tragop', 'client_controller@tragop')->name('client.tragop');
Route::get('/datcoc', 'client_controller@datcoc')->name('client.datcoc');
Route::get('/baohanh', 'client_controller@baohanh')->name('client.baohanh');
Route::get('/Warranty', 'client_controller@Warranty')->name('client.Warranty');
Route::get('/vanchuyen', 'client_controller@vanchuyen')->name('client.vanchuyen');
Route::get('/doitra', 'client_controller@doitra')->name('client.doitra');
// chitietsanpham
Route::get('/chitiet_sanpham/{slug}','client_controller@chitietsanpham')->name('client.chitietsanpham');
Route::get('/chitiet/{slug}','client_controller@chitiet_sanpham')->name('client.chitiet');


// taikhoa
Route::get('/dangky/dangky','client_controller@getdangky')->name('client.getdangky');
Route::post('/dangky/dangky','client_controller@postdangky')->name('client.postdangky');
Route::get('/dangky/kichhoat/{khachhang}/{token}','client_controller@kichhoat')->name('client.kichhoat');
Route::get('/doimatkhau','client_controller@doimatkhau')->name('client.doimatkhau');
Route::post('/doimatkhau','client_controller@postdoimatkhau')->name('client.postdoimatkhau');

Route::get('/quenmatkhau/index','client_controller@quenmatkhau')->name('client.quenmatkhau');
Route::post('/quenmatkhau/index','client_controller@postquenmatkhau')->name('client.postquenmatkhau');
Route::get('/quenmatkhau/kichhoatmatkhau/{khachhang}/{token}','client_controller@kichhoatmatkhau')->name('client.kichhoatmatkhau');
Route::post('/quenmatkhau/laylaimatkhau/{khachhang}/{token}','client_controller@laylaimatkhau')->name('client.laylaimatkhau');

Route::post('/autocomplete','client_controller@autocomplete')->name('auto.complete');

Route::get('/taikhoan','client_controller@taikhoan')->name('client.taikhoan');
Route::post('/taikhoan','client_controller@update')->name('taikhoan.update');
// login client
Route::get('/login', 'client_controller@login')->name('client.login');
Route::post('/login', 'client_controller@postlogin')->name('client.postlogin');
Route::get('/logout', 'client_controller@logout')->name('client.logout');
// login admin
Route::get('admin/login', 'admin_controller@login')->name('admin.login');
Route::post('admin/login', 'admin_controller@postlogin')->name('admin.postlogin');
Route::get('admin/logout', 'admin_controller@logout')->name('admin.logout');
Route::get('/admin/taikhoan','admin_controller@taikhoan')->name('admin.taikhoan');
Route::post('/admintaikhoan','admin_controller@update')->name('admin.update');

// Hóa đơn
Route::get('/hoadon', 'hoadon_controller@create')->name('hoadon.create');
Route::get('/hoadon/create', 'hoadon_controller@store')->name('hoadon.store');
Route::post('/hoadon/tao', 'hoadon_controller@tao')->name('hoadon.tao');
Route::get('/hoadon/kiemtra','hoadon_controller@kiemtra_hoadon')->name('hoadon.kiemtra');
Route::get('/hoadon/khuyenmai/xoa', 'khuyenmai_controller@xoa_khuyenmai')->name('xoa_coupon');
Route::post('/hoadon/vanchuyen', 'hoadon_controller@vanchuyen')->name('check_chiphi');
Route::get('/hoadon/thanhcong', 'hoadon_controller@thanhcong')->name('hoadon.thanhcong');
// túi đồ
Route::get('/hoadon/vanchuyen/xoa', 'tuido_controller@xoa_vanchuyen')->name('xoa_phi');
Route::post('/tinhvanchuyen','tuido_controller@tinhvanchuyen')->name('tinh.vanchuyen');
Route::post('/chonvanchuyenhome','tuido_controller@chonvanchuyenhome')->name('chon.vanchuyenhome');
Route::post('/tuido/khuyenmai', 'tuido_controller@khuyenmai')->name('check_coupon');
Route::get('/tuido/them/{slug}', 'tuido_controller@them')->name('homeuser.tuido');
Route::get('/tuido/capnhattang/{id}', 'tuido_controller@capnhattang')->name('homeuser.tuido.tang');
Route::get('/tuido/capnhatgiam/{id}', 'tuido_controller@capnhatgiam')->name('homeuser.tuido.giam');
Route::get('/tuido', 'tuido_controller@index')->name('homeuser.tuido.index');
Route::get('/tuido/capnhat/{id}', 'tuido_controller@xoa')->name('homeuser.tuido.xoa');
Route::get('/tuido/xoatatca', 'tuido_controller@xoatatca')->name('homeuser.tuido.xoatatca');
// home admin
Route::group(['prefix'=>'admin','middleware'=>'admin_middleware'], function () {
    Route::get('/', 'admin_controller@index')->name('admin.index');
    Route::get('/hang/delete/{id}','hang_controller@delete')->name('hang.delete');
    Route::get('/sanpham/delete/{id}','sanpham_controller@delete')->name('sanpham.delete');
    Route::post('/sanpham/nhap_excel','sanpham_controller@postnhap')->name('sanpham.nhap');
    Route::get('/sanpham/xuat_excel','sanpham_controller@getxuat')->name('sanpham.xuat');


    Route::post('/tinh/nhap_excel','tinh_controller@postnhap')->name('tinh.nhap');
    // Route::get('/tinh/xuat_excel','tinh_controller@getxuat')->name('tinh.xuat');

    Route::post('/huyen/nhap_excel','huyen_controller@postnhap')->name('huyen.nhap');
    // Route::get('/huyen/xuat_excel','huyen_controller@getxuat')->name('huyen.xuat');
    Route::post('/xa/nhap_excel','xa_controller@postnhap')->name('xa.nhap');
    // Route::get('/xa/xuat_excel','xa_controller@getxuat')->name('xa.xuat');
    Route::post('/chon_vanchuyen','vanchuyen_controller@chon')->name('chon.vanchuyen');
    Route::post('/sua_vanchuyen','vanchuyen_controller@sua')->name('sua.vanchuyen');
    Route::post('/hien_vanchuyen','vanchuyen_controller@hien')->name('hien.vanchuyen');
    Route::post('/them_vanchuyen','vanchuyen_controller@them')->name('them.vanchuyen');
   
    Route::post('/sua_khuyenmai','khuyenmai_controller@sua_khuyenmai')->name('sua.khuyenmai');
    Route::post('/sua_chucvu','chucvu_controller@sua_chucvu')->name('sua.chucvu');
    Route::post('/sua_hang','hang_controller@sua_hang')->name('sua.hang');
    Route::post('/sua_loai','loai_controller@sua_loai')->name('sua.loai');
    Route::post('/sua_bh','baohanh_controller@sua_bh')->name('sua.bh');
    Route::post('/sua_sp','sanpham_controller@sua_sp')->name('sua.sp');
    Route::post('/sua_nsx','noisanxuat_controller@sua_nsx')->name('sua.nsx');
    Route::post('/sua_hotenkh','khachhang_controller@sua_hotenkh')->name('sua.hotenkh');
    Route::post('/sua_sdtkh','khachhang_controller@sua_sdtkh')->name('sua.sdtkh');
    Route::post('/sua_cmndkh','khachhang_controller@sua_cmndkh')->name('sua.cmndkh');
    Route::post('/sua_diachikh','khachhang_controller@sua_diachikh')->name('sua.diachikh');
    Route::post('/sua_tendangnhapkh','khachhang_controller@sua_tendangnhapkh')->name('sua.tendangnhapkh');
    Route::post('/sua_tinhtrang','tinhtrang_controller@sua_tinhtrang')->name('sua.tinhtrang');

    Route::get('/loai/delete/{id}','loai_controller@delete')->name('loai.delete');
    Route::get('/loai/sua/{id}','loai_controller@sua')->name('loai.sua');
    Route::get('/khuyenmai/sua/{id}','khuyenmai_controller@sua')->name('khuyenmai.sua');
    Route::get('/noisanxuat/delete/{id}','noisanxuat_controller@delete')->name('noisanxuat.delete');
    Route::get('/baohanh/delete/{id}','baohanh_controller@delete')->name('baohanh.delete');
    Route::get('/nam/delete/{id}','nam_controller@delete')->name('nam.delete');
    Route::get('/thang/delete/{id}','thang_controller@delete')->name('thang.delete');
    Route::get('/tinhtrang/delete{id}','tinhtrang_controller@delete')->name('tinhtrang.delete');
    Route::get('/nhanvien/delete{id}','nhanvien_controller@delete')->name('nhanvien.delete');
    Route::get('/khachhang/delete{id}','khachhang_controller@delete')->name('khachhang.delete');
    Route::get('/chucvu/delete{id}','chucvu_controller@delete')->name('chucvu.delete');
    Route::get('/khuyenmai/delete{id}','khuyenmai_controller@delete')->name('khuyenmai.delete');
    Route::get('/vanchuyen/delete{id}','vanchuyen_controller@delete')->name('vanchuyen.delete');
    Route::get('/lichsu/delete{id}','lichsu_controller@delete')->name('lichsu.delete');
    Route::get('/xa/delete{id}','xa_controller@delete')->name('xa.delete');
    Route::get('/tinh/delete{matinh}','tinh_controller@delete')->name('tinh.delete');
    Route::get('/huyen/delete{mahuyen}','huyen_controller@delete')->name('huyen.delete');
    Route::get('/them_listanh/{sanpham_id}','listanh_controller@index')->name('listanh.index');
    Route::post('/chon_listanh','listanh_controller@chon')->name('them.listanh');
    Route::post('/insert_listanh{sanpham_id}','listanh_controller@insert')->name('insert.listanh');
    Route::post('/sua_tenanh','listanh_controller@sua')->name('sua.tenanh');
    Route::post('/xoa_anh','listanh_controller@xoa')->name('xoa.anh');
    Route::resources([
        'hang'=>'hang_controller',
        'sanpham'=>'sanpham_controller',
        'loai'=>'loai_controller',
        'noisanxuat'=>'noisanxuat_controller',
        'baohanh'=>'baohanh_controller',
        'tinhtrang'=>'tinhtrang_controller',
        'nhanvien'=>'nhanvien_controller',
        'nam'=>'nam_controller',
        'thang'=>'thang_controller',
        'khachhang'=>'khachhang_controller',
        'chucvu'=>'chucvu_controller',
        'khuyenmai'=>'khuyenmai_controller',
        'lichsu'=>'lichsu_controller',
        'vanchuyen'=>'vanchuyen_controller',
        'xa'=>'xa_controller',
        'tinh'=>'tinh_controller',
        'huyen'=>'huyen_controller',
        'slide'=>'slide_controller',
        'bia'=>'bia_controller',
        'about'=>'about_controller',
        'about2'=>'about2_controller',
        'footer'=>'footer_controller',
        'user'=>'nhanvien_controller',
        

    ]);
});

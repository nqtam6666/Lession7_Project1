<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class nqtKhoaController extends Controller
{
    public function index()
    {
    // Truy vấn đọc dữ liệu từ bảng khoa
        $nqtKhoas = DB::select('select * from nqtkhoa ');
        return view('NqtKhoa.NqtList',['nqtKhoas'=>$nqtKhoas]);
    }
    public function detail($makh)
    {
    // Truy vấn đọc dữ liệu từ bảng khoa theo điều kiện makh
        $khoa = DB::select('select * from nqtkhoa where nqtMaKhoa =?',[$makh])[0];
        return view('NqtKhoa.nqtdetail',['khoa'=>$khoa]);
    }
    public function nqtEdit($makh)
    {
        $khoa = DB::select('select * from nqtkhoa where nqtMaKhoa =?',[$makh])[0];
        return view('NqtKhoa.nqtedit',['khoa'=>$khoa]);
    }
    public function nqtEditSubmit(request $request)
    {
        $makhoa = $request->input('nqtMaKhoa');
        $tenkhoa = $request->input('nqtTenKhoa');
        DB::update("UPDATE nqtkhoa SET nqtTenKhoa=? where nqtMaKhoa =?", [$tenkhoa,$makhoa]);
        return redirect('/khoas');
    }
    public function nqtNewSubmit(request $request)
    {
        $makh = $request -> input('makh');
        $tenkh = $request -> input('tenkh');
        $khoa = DB::select('INSERT INTO `nqtkhoa` values(?, ?)',[$makh, $tenkh]);
        return redirect('/khoas');
    }
    public function nqtNew()
    {
        return view('NqtKhoa.nqtNew');
    }
}

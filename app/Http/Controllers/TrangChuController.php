<?php

namespace App\Http\Controllers;

use App\Models\ChuyenMuc;
use App\Models\SanPham;
use App\Models\TinTuc;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrangChuController extends Controller
{
    public function index()
    {
        return view('client.homepage');
    }

    public function viewContact()
    {
        return view('client.contact');
    }
    public function viewListProduct($id)
    {
        $chuyenMuc = ChuyenMuc::where('id', $id)->first();
        if($chuyenMuc->id_chuyen_muc_cha == 0) {
            $list_id_chuyen_muc = ChuyenMuc::where('id_chuyen_muc_cha', $id)
                                        ->select('id')
                                        ->get();
        } else {
            $list_id_chuyen_muc = ChuyenMuc::where('id', $id)
                                        ->select('id')
                                        ->get();
        }

        $data = SanPham::whereIn('id_chuyen_muc', $list_id_chuyen_muc)->get();
        return view('client.list_product', compact('data', 'chuyenMuc'));
    }

    public function viewListBaiViet($loai_bai_viet){
        $data = TinTuc::where('loai_bai_viet', $loai_bai_viet)->get();

        return view('client.list_bai_viet', compact('data'));
    }

    public function search(Request $request) {
        $search = $request->search;

        $data =  SanPham::where('ten_san_pham', 'LIKE' , '%' .  $search . '%')
                        ->get();

        return view('client.list_product', compact('data'));
    }

}

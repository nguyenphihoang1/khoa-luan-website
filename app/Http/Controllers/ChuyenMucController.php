<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChuyenMuc\ChuyenMucRequest;
use App\Http\Requests\ChuyenMuc\UpdateChuyenMucRequest;
use App\Models\ChuyenMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChuyenMucController extends Controller
{
    public function index()
    {
        return view('admin.page.chuyen_muc.index');
    }

    public function indexVue()
    {
        return view('admin.page.chuyen_muc.index_vue');
    }

    public function data()
    {
        $sql  = "SELECT A.*, B.ten_chuyen_muc as ten_chuyen_muc_cha
                 FROM chuyen_mucs A LEFT JOIN chuyen_mucs B
                 on A.id_chuyen_muc_cha = B.id";
        $data = DB::select($sql);
        return response()->json([
            'list' => $data
        ]);
    }

    public function changeStatus($id)
    {
        $chuyenMuc = ChuyenMuc::where('id', $id)->first();
        if($chuyenMuc){
            $chuyenMuc->tinh_trang = !$chuyenMuc->tinh_trang;
            $chuyenMuc->save();
            return response()->json([
                'status'    => true,
                'message'   => 'Đã đổi trạng thái thành công'
            ]);
        }else{
            return response()->json([
                'status'     => false,
                'message'    => 'Đã có lỗi sản phẩm không tồn tại !'
            ]);
        }
    }

    public function store(ChuyenMucRequest $request)
    {
        ChuyenMuc::create([
            'ten_chuyen_muc'        => $request->ten_chuyen_muc,
            'slug_chuyen_muc'       => $request->slug_chuyen_muc,
            'tinh_trang'            => $request->tinh_trang,
            'id_chuyen_muc_cha'     => $request->id_chuyen_muc_cha,
        ]);

        return response()->json([
            'xxx' => true,
            'message' => 'Đã thêm mới chuyên mục thành công'
        ]);
    }

    public function doiTrangThai($id)
    {
        $chuyenMuc = ChuyenMuc::where('id', $id)->first(); // ChuyenMuc::find($id);
        if($chuyenMuc) {
            $chuyenMuc->tinh_trang = !$chuyenMuc->tinh_trang;
            $chuyenMuc->save();

            return response()->json([
                'status' => 'ABC',
            ]);
        } else {
            return response()->json([
                'status' => 'XYZ',
            ]);
        }
    }

    public function destroy($id)
    {
        $chuyenMuc = ChuyenMuc::find($id); // ChuyenMuc::where('id', $id)->first();
        if($chuyenMuc) {
            $chuyenMuc->delete();
            return response()->json([
                'status' => true,
                'message' => 'Đã xóa chuyên mục thành công',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Đã có lỗi, chuyên mục không tồn tại !',
            ]);
        }
    }

    public function edit($id)
    {
        $chuyenMuc = ChuyenMuc::find($id); // ChuyenMuc::where('id', $id)->first();
        if($chuyenMuc) {
            return response()->json([
                'status' => true,
                'data'   => $chuyenMuc,
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    }

    public function update(UpdateChuyenMucRequest $request)
    {
        $chuyenMuc = ChuyenMuc::find($request->id);
        if($chuyenMuc) {
            // update và return true
            $chuyenMuc->ten_chuyen_muc        = $request->ten_chuyen_muc;
            $chuyenMuc->slug_chuyen_muc       = $request->slug_chuyen_muc;
            $chuyenMuc->tinh_trang            = $request->tinh_trang;
            $chuyenMuc->id_chuyen_muc_cha     = $request->id_chuyen_muc_cha;
            $chuyenMuc->save();

            return response()->json([
                'status'    => true,
                'message'   => 'Đã cập nhật chuyên mục thành công'
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Đã có lỗi, chuyên mục không tồn tại !'
            ]);
        }
    }
}

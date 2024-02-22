<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteSanPhamRequest;
use App\Http\Requests\TaoSanPhamRequest;
use App\Http\Requests\UpdateSanPhamRequest;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function chiTiet($string)
    {
        if (preg_match('/post(\d+)/', $string, $matches)) {
            $id = $matches[1];
            $value = SanPham::where('san_phams.id', $id)
                        ->join('chuyen_mucs', 'san_phams.id_chuyen_muc', 'chuyen_mucs.id')
                        ->select('san_phams.*', 'chuyen_mucs.ten_chuyen_muc')
                        ->first();

            if($value) {
                $cate = SanPham::where('id_chuyen_muc', '<>', $value->id_chuyen_muc)
                            ->orwhere('gia_ban', '<=', $value->gia_ban)
                            ->take(6)->get();

                return view('client.chi_tiet_san_pham', compact('value', 'cate'));
            } else {
                toastr()->error('Sản phẩm không tồn tại!');
                return redirect('/');
            }
        } else {
            toastr()->error('Sản phẩm không tồn tại!');
            return redirect('/');
        }
    }

    public function index_old()
    {
        return view('admin.page.san_pham.index');
    }

    public function index()
    {
        return view('admin.page.san_pham.index_vue');
    }

    public function store(TaoSanPhamRequest $request)
    {
        $data = $request->all();

        SanPham::create($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã thêm mới sản phẩm thành công!',
        ]);
    }

    public function data()
    {
        $data = SanPham::join('chuyen_mucs', 'san_phams.id_chuyen_muc', 'chuyen_mucs.id')
                       ->select('san_phams.*', 'chuyen_mucs.ten_chuyen_muc')
                       ->get();

        return response()->json([
            'data'  => $data,
        ]);
    }

    public function destroy(DeleteSanPhamRequest $request)
    {
        SanPham::where('id', $request->id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Đã xóa sản phẩm thành công!',
        ]);

    }

    public function update(UpdateSanPhamRequest $request)
    {
        $data    = $request->all();
        $sanPham = SanPham::find($request->id); // where('id', $request->id)->first();
        $sanPham->update($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã cập nhật phẩm thành công!',
        ]);
    }

    public function search(Request $request)
    {
        $data = SanPham::where('ten_san_pham', 'like', '%' . $request->search_sp_serve . '%')
                       ->get();

        return response()->json([
            'data'  => $data,
        ]);
    }
}

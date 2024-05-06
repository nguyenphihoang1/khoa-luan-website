<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThanhToanRequest;
use App\Jobs\XacNhanDonHangJob;
use App\Models\ChiTietBanHang;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonHangController extends Controller
{
    public function checkout()
    {
        $khachHang = Auth::guard('customer')->user();

        $gioHang   = ChiTietBanHang::where('id_khach_hang', $khachHang->id)
                                   ->where('id_don_hang', 0)
                                   ->first();
        if($gioHang) {
            return view('client.checkout', compact('khachHang'));
        } else {

            return redirect('/');
        }
    }

    public function process(ThanhToanRequest $request)
    {
        // dd($request->all());
        $khachHang = Auth::guard('customer')->user();

        $donHang   = DonHang::create([
            'ho_lot'            => $request->ho_lot,
            'ten_khach'         => $request->ten_khach,
            'ho_va_ten'         => $request->ho_lot . ' ' . $request->ten_khach,
            'email'             => $request->email,
            'so_dien_thoai'     => $request->so_dien_thoai,
            'dia_chi'           => $request->dia_chi,
            'id_khach_hang'     => $khachHang->id,
            'thanh_toan'        => $request->thanh_toan,
            'hash_don_hang'     => 'Chưa có, tí tính nhé',
        ]);

        $gioHang  = ChiTietBanHang::where('id_khach_hang', $khachHang->id)
                                  ->where('id_don_hang', 0)
                                  ->join('san_phams', 'chi_tiet_ban_hangs.id_san_pham', 'san_phams.id')
                                  ->select('chi_tiet_ban_hangs.*', 'san_phams.ten_san_pham', 'san_phams.slug_san_pham', 'san_phams.hinh_anh', 'san_phams.gia_ban', 'san_phams.gia_khuyen_mai')
                                  ->get();

        $total = 0;
        $count_ship = 0;
        foreach($gioHang as $key => $value) {
            $don_gia = $value->gia_ban;
            if ($value->gia_khuyen_mai > 0) {
                $don_gia = $value->gia_khuyen_mai;
            }
            $total += $don_gia * $value->so_luong;
            $count_ship += $value->so_luong;
        }
        if ($count_ship < 3) {
            $ship = 30000;
        } else {
            $ship = $count_ship * 10000;
        }

        $donHang->hash_don_hang     = 'DHDZ' . (2342459 + $donHang->id);
        $donHang->phi_ship          = $ship;
        $donHang->tien_hang         = $total;
        $donHang->tong_thanh_toan   = $total + $ship;

        $donHang->save();

        $info['ma_don']             = $donHang->hash_don_hang;
        $info['nguoi_mua']          = $khachHang->ho_va_ten;
        $info['nguoi_nhan']         = $request->ho_lot . ' ' . $request->ten_khach;
        $info['dia_chi']            = $request->dia_chi;
        $info['email']              = $khachHang->email;
        $info['tong_tien']          = $donHang->tong_thanh_toan;
        // XacNhanDonHangJob::dispatch($info, $gioHang);

        ChiTietBanHang::where('id_khach_hang', $khachHang->id)
                      ->where('id_don_hang', 0)
                      ->update([
                        'id_don_hang'    =>  $donHang->id
                      ]);

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã đặt hàng thành công!',
        ]);
    }

    public function viewDonhang()
    {
        return view('client.don_hang');
    }

    public function getDataDonHang()
    {
        $khachHang = Auth::guard('customer')->user();

        $data = DonHang::where('id_khach_hang', $khachHang->id)
                        ->orderByDESC('created_at')
                        ->get();

        return response()->json([
            'data' => $data
        ]);

    }

    public function chiTietDonHang($id)
    {
        $data = ChiTietBanHang::where('id_don_hang', $id)
                                    ->join('san_phams', 'chi_tiet_ban_hangs.id_san_pham', 'san_phams.id')
                                    ->select('chi_tiet_ban_hangs.*', 'san_phams.ten_san_pham', 'san_phams.slug_san_pham', 'san_phams.hinh_anh', 'san_phams.gia_ban', 'san_phams.gia_khuyen_mai')
                                    ->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function viewDH()
    {
        return view('admin.page.danh_sach_don_hang.index');
    }
    public function getDataDonHangAdmin()
    {
        $khachHang = Auth::guard('customer')->user();

        $data = DonHang::where('id_khach_hang', $khachHang->id)->get();

        return response()->json([
            'data' => $data
        ]);

    }
    public function chiTietDonHangAdmin($id)
    {
        $data = ChiTietBanHang::where('id_don_hang', $id)
                                    ->join('san_phams', 'chi_tiet_ban_hangs.id_san_pham', 'san_phams.id')
                                    ->select('chi_tiet_ban_hangs.*', 'san_phams.ten_san_pham', 'san_phams.slug_san_pham', 'san_phams.hinh_anh', 'san_phams.gia_ban', 'san_phams.gia_khuyen_mai')
                                    ->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function changeGiaoHang(Request $request)
    {
        $donHang = DonHang::find($request->id);
        if($donHang){
            $donHang->giao_hang = $request->giao_hang;
            $donHang->save();

            return response()->json([
                'status' => 1,
                'message' => 'Đổi trạng thái thành công',
            ]);
        }

    }
}

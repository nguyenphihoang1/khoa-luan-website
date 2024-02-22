<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Models\ChiTietBanHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChiTietBanHangController extends Controller
{
    public function addToCart(AddToCartRequest $request)
    {
        $khachhang = Auth::guard('customer')->check();
        if($khachhang) {
            $khachhang = Auth::guard('customer')->user();
            $sanPham   = SanPham::find($request->id_san_pham);
            $donGia    = $sanPham->gia_khuyen_mai ? $sanPham->gia_khuyen_mai : $sanPham->gia_ban;
            $check     = ChiTietBanHang::where('id_san_pham', $request->id_san_pham)
                                       ->where('id_khach_hang', $khachhang->id)
                                       ->where('id_don_hang', 0)
                                       ->first();
            if($check) {
                $so_luong_new       = $check->so_luong + $request->so_luong;
                $check->so_luong    = $so_luong_new;
                $check->thanh_tien  = $so_luong_new * $donGia;
                $check->save();

                return response()->json([
                    'status'    => 2,
                    'message'   => 'Đã cập nhật số lượng trong giỏ hàng!',
                ]);

            } else {
                ChiTietBanHang::create([
                    'id_san_pham'       =>  $request->id_san_pham,
                    'id_khach_hang'     =>  $khachhang->id,
                    'so_luong'          =>  $request->so_luong,
                    'don_gia'           =>  $donGia,
                    'thanh_tien'        =>  $request->so_luong * $donGia,
                ]);

                return response()->json([
                    'status'    => true,
                    'message'   => 'Đã thêm mới vào giỏ hàng!',
                ]);
            }

        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Bạn phải đăng nhập trước!',
            ]);
        }
    }

    public function listCart()
    {
        return view('client.gio_hang');
    }

    public function listCartData()
    {
        $khachhang = Auth::guard('customer')->user();

        $data = ChiTietBanHang::where('id_khach_hang', $khachhang->id)
                              ->where('id_don_hang', 0)
                              ->join('san_phams', 'chi_tiet_ban_hangs.id_san_pham', 'san_phams.id')
                              ->select('chi_tiet_ban_hangs.*', 'san_phams.ten_san_pham', 'san_phams.slug_san_pham', 'san_phams.hinh_anh', 'san_phams.gia_ban', 'san_phams.gia_khuyen_mai')
                              ->get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }

    public function updateCart(Request $request)
    {
        $khachhang = Auth::guard('customer')->user();

        $gioHang = ChiTietBanHang::where('id', $request->id)
                                 ->where('id_khach_hang', $khachhang->id)
                                 ->where('id_don_hang', 0)
                                 ->first();
        if($gioHang) {
            $gioHang->so_luong = $request->so_luong;
            $gioHang->save();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật số lượng!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Dữ liệu không thể cập nhật!',
            ]);
        }
    }

    public function deleteCart(Request $request)
    {
        $khachhang = Auth::guard('customer')->user();

        $gioHang = ChiTietBanHang::where('id', $request->id)
                                 ->where('id_khach_hang', $khachhang->id)
                                 ->where('id_don_hang', 0)
                                 ->first();
        if($gioHang) {
            $gioHang->delete();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa giỏ hàng!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Dữ liệu không thể cập nhật!',
            ]);
        }
    }
}

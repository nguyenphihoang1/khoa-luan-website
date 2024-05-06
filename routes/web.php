<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ChiTietBanHangController;
use App\Http\Controllers\ChuyenMucController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\HoaDonNhapKhoController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\Search;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\TrangChuController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

Route::get('/trangtimkiem',[Search::class,'index']);

Route::get('/', [TrangChuController::class, 'index']);

Route::get('/product/{id}', [SanPhamController::class, 'chiTiet']);
Route::get('/auth', [KhachHangController::class, 'index']);
Route::post('/register', [KhachHangController::class, 'register']);
Route::post('/login', [KhachHangController::class, 'login']);
Route::get('/forgetpw', [KhachHangController::class, 'forgetpw']);
Route::post('/forgetpassword', [KhachHangController::class, 'forgetpassword']);
Route::get('/active/{hash_active}', [KhachHangController::class, 'active']);



Route::get('/contact', [TrangChuController::class, 'viewContact']);
Route::get('/list-product/{id}', [TrangChuController::class, 'viewListProduct']);
Route::get('/list-bai-viet/{loai_bai_viet}', [TrangChuController::class, 'viewListBaiViet']);
Route::get('/bai-viet/{id}', [TinTucController::class, 'viewDetailBaiViet']);

Route::post('/search', [TrangChuController::class, 'search']);
Route::post('/search2', [Search::class, 'search']);

Route::group(['middleware' => 'customer'], function() {
    Route::get('/auto', [TransactionController::class, 'auto']);
    Route::get('/logout', [KhachHangController::class, 'logout']);
    Route::post('/add-to-cart', [ChiTietBanHangController::class, 'addToCart']);

    Route::get('/list-cart', [ChiTietBanHangController::class, 'listCart']);
    Route::get('/list-cart/data', [ChiTietBanHangController::class, 'listCartData']);

    Route::post('/update-cart', [ChiTietBanHangController::class, 'updateCart']);
    Route::post('/delete-cart', [ChiTietBanHangController::class, 'deleteCart']);

    Route::get('/checkout', [DonHangController::class, 'checkout']);
    Route::post('/process', [DonHangController::class, 'process']);

    Route::get('/don-hang', [DonHangController::class, 'viewDonhang']);
    Route::get('/don-hang/data', [DonHangController::class, 'getDataDonHang']);
    Route::get('/don-hang/{id}', [DonHangController::class, 'chiTietDonHang']);

    Route::get('/changepassword/index',[ChangePassword::class,'index']);
    Route::post('/changepassword',[ChangePassword::class,'changepassword']);

});

Route::get('/chart', [TestController::class, 'chart']);

Route::get('/jquery', [TestController::class, 'jquery']);
Route::get('/vue', [TestController::class, 'vue']);

Route::get('/demo-data', [TestController::class, 'demoData']);

Route::get('/admin/login', [AdminController::class, 'viewLogin']);
Route::post('/admin/login', [AdminController::class, 'actionLogin']);

Route::get('/customer/register', [KhachHangController::class, 'viewRegister']);
Route::post('/customer/register', [KhachHangController::class, 'actionRegister']);
Route::get('image.png', [KhachHangController::class, 'viewLogin']);
Route::post('/customer/login', [KhachHangController::class, 'actionLogin']);

Route::group(['prefix' => '/admin'], function() { //, 'middleware' => 'authadmin'
    // Route của Chuyên Mục
    Route::group(['prefix' => '/chuyen-muc'], function() {

        Route::get('/index-vue', [ChuyenMucController::class, 'indexVue']);
        Route::post('/create', [ChuyenMucController::class, 'store']);
        Route::get('/change-status/{id}', [ChuyenMucController::class, 'changeStatus']);
        Route::get('/data', [ChuyenMucController::class, 'data']);

        Route::get('/doi-trang-thai/{id}', [ChuyenMucController::class, 'doiTrangThai']);
        Route::get('/delete/{id}', [ChuyenMucController::class, 'destroy']);
        Route::get('/edit/{id}', [ChuyenMucController::class, 'edit']);

        Route::post('/update', [ChuyenMucController::class, 'update']);
    });
    Route::group(['prefix' => '/kich-hoat-tk'], function() {
        Route::get('/index', [KhachHangController::class, 'active_account']);
        Route::get('/data', [KhachHangController::class, 'data']);
        Route::get('/change-status/{id}', [KhachHangController::class, 'changeStatus']);
    });


    // Route của Sản Phẩm
    Route::group(['prefix' => '/san-pham'], function() {
        Route::get('/index', [SanPhamController::class, 'index']);

        Route::get('/index-old', [SanPhamController::class, 'index_old']);
        Route::get('/data', [SanPhamController::class, 'data']);
        Route::post('/create', [SanPhamController::class, 'store']);
        Route::post('/delete', [SanPhamController::class, 'destroy']);
        Route::post('/update', [SanPhamController::class, 'update']);
        Route::post('/search', [SanPhamController::class, 'search']);
        Route::post('/updatequantity', [SanPhamController::class, 'updatequantity']);
    });

    // Route của Tài khoản
    Route::group(['prefix' => '/tai-khoan'], function() {
        Route::get('/index-form', [AdminController::class, 'index_form']);
        Route::post('/create-form', [AdminController::class, 'create_form']);

        Route::get('/index-ajax', [AdminController::class, 'index_ajax']);
        Route::get('/index-vue', [AdminController::class, 'index_vue']);

        Route::get('/data', [AdminController::class, 'data']);
        Route::post('/create-ajax', [AdminController::class, 'create_ajax']);
    });
    // Route của Tin Tức
    Route::group(['prefix' => '/tin-tuc'], function() {
        Route::get('/index', [TinTucController::class, 'index']);
        Route::post('/create', [TinTucController::class, 'store']);
        Route::get('/data', [TinTucController::class, 'data']);
        Route::post('/delete', [TinTucController::class, 'destroy']);
        Route::post('/update', [TinTucController::class, 'update']);
        Route::get('/change-status/{id}', [TinTucController::class, 'changeStatus']);
    });

    Route::group(['prefix' => '/nha-cung-cap'], function() {
        Route::get('/index', [NhaCungCapController::class, 'index']);
        Route::post('/create', [NhaCungCapController::class, 'store']);
        Route::get('/data', [NhaCungCapController::class, 'data']);
        Route::post('/delete', [NhaCungCapController::class, 'destroy']);
        Route::post('/update', [NhaCungCapController::class, 'update']);

        Route::post('check-mst', [NhaCungCapController::class, 'checkMST']);
    });

    Route::group(['prefix' => '/nhap-kho'], function() {
        Route::get('/{id_nha_cung_cap}', [HoaDonNhapKhoController::class, 'index']);
        Route::get('/data/{id_hoa_don_nhap_kho}', [HoaDonNhapKhoController::class, 'data']);
        Route::post('/', [HoaDonNhapKhoController::class, 'store']);
        Route::post('/update', [HoaDonNhapKhoController::class, 'update']);
        Route::post('/delete', [HoaDonNhapKhoController::class, 'destroy']);
        Route::post('/real', [HoaDonNhapKhoController::class, 'nhapKhoChinhThuc']);
    });

    Route::group(['prefix' => '/cau-hinh'], function() {
        Route::get('/', [ConfigController::class, 'index']);
        Route::get('/data', [ConfigController::class, 'getData']);
        Route::post('/create', [ConfigController::class, 'store']);
        Route::get('/getChuyenMuc', [ConfigController::class, 'getChuyenMuc']);
        Route::get('/getSanPham', [ConfigController::class, 'getSanPham']);
    });
    Route::group(['prefix' => '/don-hang'], function() {
        Route::get('/', [DonHangController::class, 'viewDH']);
        Route::get('/data', [DonHangController::class, 'getDataDonHang']);
        Route::get('/chi-tiet/{id}', [DonHangController::class, 'chiTietDonHangAdmin']);
        Route::post('/giao-hang', [DonHangController::class, 'changeGiaoHang']);

    });
});

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

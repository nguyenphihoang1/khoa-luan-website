<?php

namespace App\Http\Controllers;

use App\Models\ChuyenMuc;
use App\Models\Config;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        return view('admin.page.cau_hinh.index');
    }

    public function getData()
    {
        $data = Config::orderByDESC('id')->first();
        // $data->list_bestsale = explode(',', $data->list_bestsale);
        // $data->list_sale = explode(',', $data->list_sale);
        return response()->json([
            'data'  => $data
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $listBS = implode(',', $request->listBS);
        $listS = implode(',', $request->listS);
        $so_hinh = count(explode(",", $request->hinh_anh));

        $list_title = '';
        for($i = 1; $i <= $so_hinh; $i++) {
            $name_input  = 'title_' . $i;
            $list_title .= $request->$name_input;
            if($i != $so_hinh) {
                $list_title .= "|";
            }
        }

        $list_des = '';
        for($i = 1; $i <= $so_hinh; $i++) {
            $name_input  = 'des_' . $i;
            $list_des .= $request->$name_input;
            if($i != $so_hinh) {
                $list_des .= "|";
            }
        }

        $list_link = '';
        for($i = 1; $i <= $so_hinh; $i++) {
            $name_input  = 'link_' . $i;
            $list_link .= $request->$name_input;
            if($i != $so_hinh) {
                $list_link .= "|";
            }
        }
        Config::create([
            'list_image'    =>  $request->hinh_anh,
            'list_title'    =>  $list_title,
            'list_des'      =>  $list_des,
            'list_link'     =>  $list_link,
            'list_bestsale' =>  $listBS,
            'list_sale'     =>  $listS,
            'image_slide_1' =>  $request->image_slide_1,
            'image_slide_2' =>  $request->image_slide_2,
            'title_slide_1' =>  $request->title_slide_1,
            'title_slide_2' =>  $request->title_slide_2,
            'des_slide_1'   =>  $request->des_slide_1,
            'des_slide_2'   =>  $request->des_slide_2,

        ]);

        return response()->json([
            'status'    => true,
            'mess'      => 'Đã cấu hình thành công!',
        ]);
    }
    public function getChuyenMuc()
    {
        $chuyenMuc = ChuyenMuc::get();

        return response()->json([
            'data'  => $chuyenMuc
        ]);
    }
    public function getSanPham()
    {
        $sanPham = SanPham::get();
        return response()->json([
            'data'  => $sanPham
        ]);
    }
}

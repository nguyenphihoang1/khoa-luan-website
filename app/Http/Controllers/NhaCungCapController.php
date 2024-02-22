<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNhaCungCapRequest;
use App\Http\Requests\DeleteNhaCungCapRequest;
use App\Http\Requests\DeleteRequest;
use App\Http\Requests\UpdateNhaCungCapRequest;
use App\Models\NhaCungCap;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class NhaCungCapController extends Controller
{
    public function index()
    {
        return view('admin.page.nha_cung_cap.index');
    }

    public function store(CreateNhaCungCapRequest $request)
    {
        $data = $request->all();

        NhaCungCap::create($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã tạo mới nhà cung cấp thành công!',
        ]);
    }

    public function data()
    {
        $data = NhaCungCap::all();

        return response()->json([
            'data'  => $data,
        ]);
    }

    public function destroy(DeleteNhaCungCapRequest $request)
    {
        $nhaCungCap = NhaCungCap::where('id', $request->id)->first();
        $nhaCungCap->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Đã xóa thành công nhà cung cấp!',
        ]);
    }

    public function update(UpdateNhaCungCapRequest $request)
    {
        $data    = $request->all();
        // dd($data);
        $nhaCungCap = NhaCungCap::find($request->id);
        $nhaCungCap->update($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã cập nhật thành công nhà cung cấp!',
        ]);
    }

    public function checkMST(Request $request)
    {
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
        $link = 'https://api.vietqr.io/v2/business/' . $request->mst;
        $respone = $client->get($link);

        $res  = json_decode($respone->getBody()->getContents(), true);

        if($res['code'] == '00') {
            return response()->json([
                'status'        => true,
                'message'       => 'Đã lấy được mã số thuế!',
                'ten_cong_ty'   => $res['data']['name'],
                'dia_chi'       => $res['data']['address'],
            ]);
        } else {
            return response()->json([
                'status'        => false,
                'message'       => 'Mã số thuế không tồn tại!',
            ]);
        }
    }
}

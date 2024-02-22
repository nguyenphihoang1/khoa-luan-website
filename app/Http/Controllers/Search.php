<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class Search extends Controller
{
    public function index()
    {
        return view('timkiem.home');
    }
    public function search(Request $request) {
        $search = $request->search;

        $data =  SanPham::where('ten_san_pham', 'LIKE' , '%' .  $search . '%')
                        ->get();

        return view('timkiem.search', compact('data'));
    }
}

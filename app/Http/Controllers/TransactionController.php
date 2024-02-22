<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function auto()
    {
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
        $now  = Carbon::today()->format('d/m/Y');
        $link = 'http://api.danangseafood.vn/api';
        $respone = $client->post($link,[
                    'body' => json_encode(
                        [
                            'begin'           => $now,
                            'end'             => $now,
                            'username'        => '0889470271',
                            'password'        => 'Vodinhquochuy@gmail1',
                            'accountNumber'   => '0651000883491'
                        ]
                )]);

        $res  = json_decode($respone->getBody()->getContents(), true);
        if($res['results']){
            foreach($res['results'] as $key => $value){
                $so_tien = str_replace(",","", $value['Amount']);
                $so_tien = str_replace(".","", $so_tien);
                if($value['CD'] == '+'){
                    $check = Transaction::where('Reference' , $value['Reference'])->first();
                    if(!$check){
                    Transaction::create([
                        'tranDate'      => $value['tranDate'],
                        'Reference'     => $value['Reference'],
                        'Amount'        => $so_tien,
                        'Description'   => $value['Description'],
                        ]);
                    }
                }
            };
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $pesanan = Pemesanan::where('user_id', auth()->user()->id)->groupBy('order_id')->get(['order_id']);
        
        foreach($pesanan as $item){
            $trans = Transaksi::where('pemesanan_id', $item->order_id)->first();
            if(!empty($trans)){
                $transaksi[] = $trans;
            }
        }

        return view('riwayat-pembayaran', compact('transaksi'));
    }
}

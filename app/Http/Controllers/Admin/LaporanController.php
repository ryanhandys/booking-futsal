<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Carbon\Carbon;
use App\Models\Pemesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan');
    }   

    public function data()
    {
        $data = Transaksi::where('status_transaksi', 'settlement')
                ->whereMonth('waktu_transaksi', Carbon::now()->month)
                ->get();

        $result =  DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('tanggal', function($q){
                    return Carbon::parse($q->waktu_transaksi)->format('d M Y');
                })
                ->editColumn('jam', function($q){
                    $pesanan1 = Pemesanan::where('order_id', $q->pemesanan_id)
                                ->first();
                    $pesanan2 = Pemesanan::where('order_id', $q->pemesanan_id)
                                ->orderBy('id', 'desc')
                                ->first();
                    if($pesanan1->id == $pesanan2->id){
                        return "Penyewaan Lapangan (".$pesanan1->jam->jam_mulai."-".$pesanan1->jam->jam_selesai.")";
                    } else {
                        return "Penyewaan Lapangan (".$pesanan1->jam->jam_mulai."-".$pesanan2->jam->jam_selesai.")";
                    }
                })
                ->editColumn('harga', function($q){
                    return $q->biaya;
                })
                ->make(true);
        
        return $result;
    }

}

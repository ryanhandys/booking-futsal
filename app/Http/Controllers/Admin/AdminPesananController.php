<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Carbon\Carbon;
use App\Models\Pemesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pemesanan::all();
        return view('admin.pesanan');
    }

    public function data()
    {
        $data = Transaksi::where('status_transaksi', 'settlement')
                ->whereDate('waktu_transaksi', Carbon::today())
                ->get();

        $result =  DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('nama', function($q){
                    return strtoupper($q->pemesanan->user->nama);
                })
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
                        return $pesanan1->jam->jam_mulai."-".$pesanan1->jam->jam_selesai;
                    } else {
                        return $pesanan1->jam->jam_mulai."-".$pesanan2->jam->jam_selesai;
                    }
                })
                ->make(true);
        
        return $result;
    }
}

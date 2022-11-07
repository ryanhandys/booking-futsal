<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all()->count();
        $transaksi = Transaksi::where('status_transaksi', 'settlement')
                    ->with('pemesanan')
                    ->whereHas('pemesanan', function($q){
                        $q->where('datang', false);
                    })
                    ->get()->count();
        $pesanan = Transaksi::where('status_transaksi', 'settlement')
                    ->with('pemesanan')
                    ->whereHas('pemesanan', function($q){
                        $q->where('datang', false);
                    })
                    ->get()->count();
        return view('admin.dashboard', compact('user', 'transaksi', 'pesanan'));
    }
}

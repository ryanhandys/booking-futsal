<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pemesanan::all();
        return view('admin.pesanan');
    }
}

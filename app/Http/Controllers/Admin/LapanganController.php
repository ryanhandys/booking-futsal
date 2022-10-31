<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    public function index()
    {
        return view('admin.lapangan.lapangan');
    }

    public function create()
    {
        return view('admin.lapangan.tambah-data');
    }
}

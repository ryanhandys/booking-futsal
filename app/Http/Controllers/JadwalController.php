<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Jam;
use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        return view('jadwal');
    }

    public function data(Request $request)
    {
        if($request->tgl != 'null'){
            $data = Jam::with(['pemesanan' => function($q) use ($request){
                $q->where('tanggal', $request->tgl);
            }])->get();
        } else {
            $date = Carbon::today()->format('Y-m-d');
            $data = Jam::with(['pemesanan' => function($q) use ($date){
                $q->where('tanggal', $date);
            }])->get();
        }

        $result =  DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('jam', function($q){
                    return $q->jam_mulai."-".$q->jam_selesai;
                })
                ->editColumn('harga', function($q){
                    return "Rp".number_format($q->harga, 0, 0, '.');
                })
                ->editColumn('status', function($q){
                    if(empty($q->pemesanan)){
                        return 'tersedia';
                    } else {
                        return 'tidak tersedia';
                    }
                })
                ->editColumn('check', function($q){
                    return $q->id;
                })
                ->make(true);

        return $result;
    }
}

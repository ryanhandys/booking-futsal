<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jam;
use Illuminate\Http\Request;
use DataTables;

class JamController extends Controller
{
    public function index()
    {
        return view('admin.jam.index');
    }

    public function data()
    {
        $data = Jam::all();

        $result = DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('jam', function($q){
                    return $q->jam_mulai."-".$q->jam_selesai;
                })
                ->editColumn('harga', function($q){
                    return "Rp.".number_format($q->harga, 0, 0, '.');
                })
                ->editColumn('id', function($q){
                    return $q->id;
                })
                ->make(true);
        
        return $result;
    }

    public function create()
    {
        return view('admin.jam.tambah');
    }

    public function store(Request $request)
    {
        $jam = new Jam();
        $jam->jam_mulai = $request->jam_mulai;
        $jam->jam_selesai = $request->jam_selesai;
        $jam->harga = $request->harga;
        $jam->save();
        return redirect()->route('jam')->with('success', 'Data berhasil disimpan!');
    }

    public function ubah($id)
    {
        $id = Jam::find($id);
        return view('admin.jam.tambah', compact('id'));
    }

    public function edit(Request $request)
    {
        $jam = Jam::find($request->id);
        $jam->jam_mulai = $request->jam_mulai;
        $jam->jam_selesai = $request->jam_selesai;
        $jam->harga = $request->harga;
        $jam->save();
        return redirect()->route('jam')->with('success', 'Data berhasil diubah!');
    }

    public function delete($id)
    {
        $data = Jam::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}

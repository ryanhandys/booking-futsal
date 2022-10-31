<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use GuzzleHttp\Client;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\MidtransController;
use App\Models\Transaksi;

class PesananController extends Controller
{
    public function store(Request $request)
    {
        $order = Pemesanan::orderBy('id', 'desc')->first();
        if(isset($order)){
            if($order->order_id == null){
                $order_id = 'PES-00001';
            } else {
                $urutan = (int) substr($order->order_id, 4, 5);
                $urutan++;
                $order_id = 'PES-' . sprintf("%05s", $urutan);
            }
        } else {
            $order_id = 'PES-00001';
        }

        $price = 0;
        foreach($request->jam as $jam){
            $pesanan = new Pemesanan();
            $pesanan->tanggal = $request->tgl;
            $pesanan->jam_id = $jam;
            $pesanan->order_id = $order_id;

            $detail = Jam::find($jam);
            $harga = $detail->harga;

            $pesanan->harga = $harga;
            $pesanan->status = true;
            $pesanan->user_id = auth()->user()->id;
            $pesanan->save();

            $price += $harga;
        }

        $user = array(
            'nama' => auth()->user()->nama,
            'email' => auth()->user()->email,
            'phone' => auth()->user()->no_hp,
        );
        $user = json_encode($user);
        $token = MidtransController::midtrans($order_id, $user, $price);

        return redirect()->route('bayar', ['token' => $token]);
    }

    public function bayar($token)
    {
        return view('bayar', compact('token'));
    }

    public function simpan(Request $request)
    {
        $json = json_decode($request->json);

        $transaksi = new Transaksi();
        $transaksi->biaya = $json->gross_amount;
        $transaksi->tipe_pembayaran = $json->payment_type;
        $transaksi->waktu_transaksi = $json->transaction_time;
        $transaksi->status_transaksi = $json->transaction_status;
        $transaksi->bank = isset($json->va_numbers[0]->bank) ?? '';
        $transaksi->nomor_va = isset($json->va_numbers[0]->va_number) ?? '';
        $transaksi->fraud_status = $json->fraud_status;
        $transaksi->pdf_url = $json->pdf_url;
        $transaksi->status_pembayaran = $json->transaction_status;
        $transaksi->transaction_id = $json->transaction_id;
        $transaksi->pemesanan_id = $json->order_id;
        $transaksi->save();

        return 'sukses';
    }
}

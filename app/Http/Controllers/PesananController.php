<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use GuzzleHttp\Client;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\MidtransController;

class PesananController extends Controller
{
    public function store(Request $request)
    {
        $price = 0;
        foreach($request->jam as $jam){
            $pesanan = new Pemesanan();
            $pesanan->tanggal = $request->tgl;
            $pesanan->jam_id = $jam;

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
        $token = MidtransController::midtrans($user, $price);

        return redirect()->route('bayar', ['token' => $token]);

        // return redirect()->back()->with('token', $token);
        // $data  = self::bank('1111', 3000, 'bri');

        // return $data;
    }

    public function bayar($token)
    {
        return view('bayar', compact('token'));
    }

    public function bank($kd_transaksi, $nominal, $bank)
    {
        $client = new Client();
        $response = $client->post('https://api.sandbox.midtrans.com/v2/charge',
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Basic '. base64_encode('SB-Mid-server-b6rcWtmyXKvX39nh70fMzV5P'),
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode([
                    'payment_type' => 'bank_transfer',
                    'transaction_details' => [
                        'order_id' => $kd_transaksi,
                        'gross_amount' => $nominal
                    ], 
                    'bank_transfer' => [
                        'bank' => $bank
                    ]
                ])
            ]);
        $data = json_decode($response->getBody());
        return $data;
    }
}

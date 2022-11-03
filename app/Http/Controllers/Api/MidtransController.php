<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public static function midtrans($order_id, $user, $price)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = false;

        $user = json_decode($user);

        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $price,
            ),
            'customer_details' => array(
                'first_name' => $user->nama,
                'email' => $user->email,
                'phone' => $user->phone,
            ),
            'expiry' => array(
                'start_time'  => Carbon::now()->format('Y-m-d H:i:s')." +0700",
                'unit' => 'minutes',
                'duration' => 30
            )
        );
         
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return $snapToken;
    }
}

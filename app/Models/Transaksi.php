<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id', 'order_id');
    }
}

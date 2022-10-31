<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanans';

    public function jam()
    {
        return $this->belongsTo(Jam::class, 'jam_id', 'id');
    }
}

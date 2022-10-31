<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    use HasFactory;

    protected $table = 'jams';

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id', 'jam_id');
    }
}

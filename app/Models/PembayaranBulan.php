<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranBulan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pembayaran', 'id_spp', 'bulan'
    ];

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }

    public function transaksi()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran');
    }
}

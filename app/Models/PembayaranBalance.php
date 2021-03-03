<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pembayaran', 'id_spp', 'nisn',
        'balance_code', 'outstanding', 'status_balance',
        'catatan'
    ];

    public static function generateCode($id)
    {
        $now = now();
        $array = PembayaranBalance::latest()->first();

        $number = $array ? substr($array->id, -4) + 1 : 0001;

        return 'SPP-' . $id . $now->isoFormat('YYYY') . $now->isoFormat('MM') . '-' . sprintf('%04d', $number);
    }
}

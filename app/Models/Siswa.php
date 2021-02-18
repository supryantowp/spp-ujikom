<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = ['id_kelas', 'nama', 'nisn', 'nis', 'alamat', 'no_telp'];

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function transaksi()
    {
        return $this->hasMany(Pembayaran::class, 'nisn', 'nisn');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'id_loket');
    }
}

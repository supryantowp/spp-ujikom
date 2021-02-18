<?php

namespace App\Exports;

use App\Http\Controllers\TransaksiSppController;
use Maatwebsite\Excel\Concerns\FromCollection;

class HistoriSiswa implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TransaksiSppController::orderBy('created_at', 'desc')->get();
    }
}

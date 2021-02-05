<?php

namespace App\Http\Controllers;

use App\DataTables\PembayaranDataTable;
use Illuminate\Http\Request;

class HistorySppController extends Controller
{
    public function index(PembayaranDataTable $dataTable)
    {
        return $dataTable->render('spp.history');
    }
}

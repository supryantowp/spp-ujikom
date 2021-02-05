<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PembayaranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'siswa' => $this->siswa->nama,
            'spp_bulan' => $this->spp_bulan,
            'spp' => $this->spp->tahun,
            'jumlah_bayar' => 'Rp ' . format_idr($this->jumlah_bayar) ,
            'tanggal_dibayar' => $this->created_at->format('d M Y')
        ];
    }
}

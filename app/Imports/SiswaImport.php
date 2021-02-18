<?php

namespace App\Imports;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class SiswaImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {


    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            if($index !== 0 && ($row[0] !== '') && ($row[1] !== '')) {
                $siswa = Siswa::create([
                    'id_kelas' => Kelas::firstOrCreate(['nama_kelas' => $row[0]])->id,
                    'nama' => $row[1],
                    'nisn' => $row[2],
                    'nis' => $row[3],
                    'alamat' => $row[4],
                    'no_telp' => $row[5]
                ]);

                $user = User::create([
                    'name' => $siswa->nama,
                    'email' => $siswa->nis.'@gmail.com',
                    'password' => Hash::make(123456789),
                    'nisn' => $siswa->nisn
                ]);

                $user->assignRole('siswa');

            }
        }
    }
}

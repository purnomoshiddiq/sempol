<?php

namespace App\Imports;

use App\Models\Anggota;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AnggotaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        // cek apakah data sudah ada di database

        $cek = DB::table('anggotas')->where('nama', $row['nama'])->first();

        if ($cek) {
            return null;
            // return redirect()->back()->with('error', 'Gagal Import data! ');
            // die;
        }

        return new Anggota([
            'nama' => $row['nama'],
            'nisn' => $row['nisn'],
            'no_telp' => $row['no_telp'],
            'alamat' => $row['alamat'],
            'password' => Hash::make(12345678), 
        ]);
    }
}

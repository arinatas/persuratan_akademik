<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; // row 1 sebagai heading
use Maatwebsite\Excel\Concerns\WithValidation; // validasi string / integer
use Maatwebsite\Excel\Concerns\Importable;
use App\Models\Biodata;

class BiodataImport implements ToModel, WithHeadingRow, WithValidation // Gunakan WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        // Logika untuk memasukkan data ke dalam model Tendik
        return new Biodata([
            'nim' => $row['nim'],
            'nama' => $row['nama'],
            'kelas' => $row['kelas'],
            'prodi' => $row['prodi'],
            'fakultas' => $row['fakultas'],
            'angkatan' => $row['angkatan'],
            'dosen_pa' => $row['dosen_pa'],
        ]);
    }

    public function rules(): array
    {
        return [
            // Sesuaikan aturan validasi dengan kunci (header) yang Anda tetapkan
            'nim' => 'required',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'fakultas' => 'required|string|max:100',
            'angkatan' => 'required',
            'dosen_pa' => 'required|integer',
        ];
    }
}

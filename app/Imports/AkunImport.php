<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; // row 1 sebagai heading
use Maatwebsite\Excel\Concerns\WithValidation; // validasi string / integer
use Maatwebsite\Excel\Concerns\Importable;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import the Hash facade

class AkunImport implements ToModel, WithHeadingRow, WithValidation // Gunakan WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        // Logika untuk memasukkan data ke dalam model 
        return new User([
            'username' => $row['username'],
            'password' => Hash::make($row['password']), // Hash the password using bcrypt
            'is_admin' => $row['is_admin'],
        ]);
    }

    public function rules(): array
    {
        return [
            // Sesuaikan aturan validasi dengan kunci (header) yang Anda tetapkan
            'username' => 'required',
            'password' => 'required',
            'is_admin' => 'required|integer',
        ];
    }
}

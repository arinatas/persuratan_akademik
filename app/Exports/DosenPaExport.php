<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // Add ShouldAutoSize
use App\Models\DosenPA;

class DosenPaExport implements FromView, WithHeadings, ShouldAutoSize
{
    public function view(): View
    {
        $dosenpas = DosenPA::all();
            return view('admin.master.dosen_pa.export', [
                'title' => 'Dosen PA',
                'section' => 'Master',
                'active' => 'Dosen PA',
                'dosenpas' => $dosenpas,
            ]);
    }

    public function headings(): array
    {
        return [
            'ID Dosen PA',
            'NIDN / NIK',
            'Nama',
            'Jabatan',
        ];
    }
}



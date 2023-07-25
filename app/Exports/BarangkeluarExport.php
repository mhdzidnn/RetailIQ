<?php

namespace App\Exports;

use App\Models\Barangkeluar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BarangkeluarExport implements FromView, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function view(): View
    {
        return view('exports.barangkeluar', [
            'barangkeluar' => Barangkeluar::all()
        ]);
    }

    /**
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        // Atur gaya untuk baris header
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}

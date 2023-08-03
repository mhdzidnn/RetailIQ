<?php

namespace App\Exports;

use App\Models\Barangmasuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class BarangmasukExport implements FromView, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('barangmasuk.export_excel', [
            'barangmasuk' => Barangmasuk::all()
        ]);
    }

    /**
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        // Atur gaya untuk header kolom
        return [
            1 => [
                'font' => ['bold' => true],
            ]
        ];
    }
}

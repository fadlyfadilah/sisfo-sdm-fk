<?php

namespace App\Exports;

use App\Models\Biodatum;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class BiodataTetapExport implements FromView, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function columnWidths(): array
    {
        return [
            'A' => 4,
            'B' => 28,
            'C' => 28,            
            'D' => 16,
            'E' => 16,
            'F' => 16,
            'G' => 16,
            'H' => 16,
            'I' => 16,
            'J' => 16,
            'K' => 16,
            'L' => 16,
        ];
    }
    public function view(): View
    {
        return view('exports.biodataTetap', [
            'biodatas' => Biodatum::with('nik')->where('statuskep', 'Dosen Tetap Yayasan')->get()
        ]);
    }
}

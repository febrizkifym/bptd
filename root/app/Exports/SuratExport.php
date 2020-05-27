<?php

namespace App\Exports;

use App\Surat;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class SuratExport implements FromView,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.surat.export', [
            'surat' => Surat::all()
        ]);
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $cellRange = 'A1:F1'; // All headers
                $sheet->getStyle($cellRange)->getFont()
                    ->setSize(13)
                    ->setBold(true)
                    ->getColor()->setRGB('000000');
            },
        ];
    }
}

<?php

namespace App\Exports;

use App\Tiket;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class PenumpangExport implements FromView,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $query = Tiket::join("pbd_tarif","pbd_tarif.id","pbd_tiket.tarif")->join("pbd_kapal","pbd_tarif.id_kapal","pbd_kapal.id")->get([
            'pbd_tiket.nama as nama_lengkap',
            'uid',
            'no_ktp',
            'jenis_kelamin',
            'agama',
            'jenis_usia',
            'tarif',
            'kelas',
            'harga',
            'pbd_kapal.nama as nama_kapal',
            'tujuan',
            ]);
        return view('admin.penumpang.export', [
            'penumpang' => $query
        ]);
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $cellRange = 'A1:J1'; // All headers
                $sheet->getStyle($cellRange)->getFont()
                    ->setSize(13)
                    ->setBold(true)
                    ->getColor()->setRGB('000000');
            },
        ];
    }
}

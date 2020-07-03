<?php

namespace App\Exports;

use Illuminate\Http\Request;
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

    protected $data;
    function __construct($data){
        $this->data = $data;
    }

    public function view(): View
    {
        $query = Surat::join("surat_klasifikasi","surat_klasifikasi.id","surat_arsip.id_klasifikasi")
                ->select("surat_arsip.id","kode","surat_klasifikasi.sub as klasifikasi_sub","tgl_surat","bulan","tujuan","perihal","ket","no_urut")
                ->where('id_klasifikasi',$this->data['id_klasifikasi'])
                ->whereYear('tgl_surat','=',$this->data['tahun'])
                ->get();
        dd($query);
        // return view('admin.surat.export', [
        //     'surat' => $query
        // ]);
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

<?php

namespace App\Exports;

use App\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MahasiswaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('mahasiswa.export.excel', [
            'mahasiswas' => Mahasiswa::orderBy('id','asc')->get(),
            'waktu_sekarang' => date('d/m/Y - h:i:s'),
        ]);
    }
}

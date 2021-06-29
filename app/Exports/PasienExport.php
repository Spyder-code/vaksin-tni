<?php

namespace App\Exports;

use App\Models\Pasien;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PasienExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = Pasien::all();
        return view('export',compact('data'));
    }
}

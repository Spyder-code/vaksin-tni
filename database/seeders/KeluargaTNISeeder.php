<?php

namespace Database\Seeders;

use App\Models\KeluargaTNI;
use Illuminate\Database\Seeder;

class KeluargaTNISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'KOREM 082',
            'KODIM 0815',
            'DENKESYAH',
            'AJENREM 082',
            'DENPAL',
            'DENPOM',
            'MINVET',
            'DENBEKANG',
            'DENHUBREM',
            'ZIBANG',
            'MASYARAKAT UMUM'
        ];
        foreach ($data as $item ) {
            KeluargaTNI::create(['nama'=>$item]);
        }
    }
}

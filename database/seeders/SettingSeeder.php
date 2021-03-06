<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'batas' => 150,
            'pesan' => 'Batas pendaftaran sudah memenuhi kuota hari ini, silahkan coba lagi besok hari!',
            'buka' => "(Buka Senin s.d Jum'ah)",
            'pukul' => "Pukul 07.00 s.d 17.00 WIB",
        ]);
    }
}

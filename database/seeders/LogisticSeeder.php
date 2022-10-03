<?php

namespace Database\Seeders;

use App\Models\Logistic;
use App\Models\Manufacture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogisticSeeder extends Seeder
{
    public function run()
    {
        $getManufactureRows = Manufacture::pluck('id')->toArray();
        $names = array(
            'Ucup',
            'Alpat',
            'Habib',
            'Jidan',
            'Suprii',
            'Samsudin',
        );

        for ($i = 0; $i < 10; $i++) {
            Logistic::create([
                "fppp_id" => $getManufactureRows[array_rand($getManufactureRows)],
                "no_logistic" => $i + 1 . '/AST/03/2022',
                "tgl_input" => now(),
                "tgl_berangkat" => now(),
                "driver" => $names[rand(0, count($names) - 1)],
                "no_polisi" => 'B ' . substr(str_shuffle("0123456789"), 0, 4) . ' ' . substr(str_shuffle(implode(range('A', 'Z'))), 0, 3),
                "alamat" => "Jl. Otto Iskandar Dinata No. 347A, Balonggede, Kec. Regol, Kota Bandung, Jawa Barat 40251",
            ]);
        }
    }
}

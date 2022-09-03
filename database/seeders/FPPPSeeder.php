<?php

namespace Database\Seeders;

use App\Models\FPPP;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FPPPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        FPPP::create([
            "FPPP_number" => "123/FPPP/B03/07/2022",
            "project_name" => "Lantai 1 BRI",
            "applicator_name" => "PT. BRI"
        ]);
        FPPP::create([
            "FPPP_number" => "124/FPPP/B04/07/2022",
            "project_name" => "Lantai 1 BCA",
            "applicator_name" => "PT. BCA"
        ]);
        for ($i = 5; $i < 15; $i++) {
            $i_plus = $i + 1;
            FPPP::create([
                "FPPP_number" => "12{$i}/FPPP/B0{$i}/07/2022",
                "project_name" => "Lantai 1 BRI",
                "applicator_name" => "PT. BRI"
            ]);
            FPPP::create([
                "FPPP_number" => "12{$i_plus}/FPPP/B0{$i_plus}/07/2022",
                "project_name" => "Lantai 1 BCA",
                "applicator_name" => "PT. BCA"
            ]);
        }
    }
}

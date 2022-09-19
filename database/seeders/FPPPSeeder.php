<?php

namespace Database\Seeders;

use App\Models\Manufacture;
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

        $colors = ["Sand Black Metallic", "Allure Black Matte"];
        Manufacture::create([
            "FPPP_number" => "123/FPPP/B03/07/2022",
            "project_name" => "Lantai 1 BRI",
            "applicator_name" => "PT. BRI",
            "color" => $colors[rand(0, 1)],
        ]);
        Manufacture::create([
            "FPPP_number" => "124/FPPP/B04/07/2022",
            "project_name" => "Lantai 1 BCA",
            "applicator_name" => "PT. BCA",
            "color" => $colors[rand(0, 1)],

        ]);
        for ($i = 5; $i < 15; $i++) {
            $i_plus = $i + 1;
            Manufacture::create([
                "FPPP_number" => "12{$i}/FPPP/B0{$i}/07/2022",
                "project_name" => "Lantai 1 BRI",
                "applicator_name" => "PT. BRI",
                "color" => $colors[rand(0, 1)],

            ]);
            Manufacture::create([
                "FPPP_number" => "12{$i_plus}/FPPP/B0{$i_plus}/07/2022",
                "project_name" => "Lantai 1 BCA",
                "applicator_name" => "PT. BCA",
                "color" => $colors[rand(0, 1)],

            ]);
        }
    }
}

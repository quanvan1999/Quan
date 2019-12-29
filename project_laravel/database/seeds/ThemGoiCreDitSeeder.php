<?php

use Illuminate\Database\Seeder;
use App\GoiCredit;

class ThemGoiCreDitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      		$tap_goi_credit=[];	
        	$tap_goi_credit[]=[
       		"ten_goi" => "Gói 100",
       		"credit" => "100",
       		"so_tien" => "10000"
       	];
       	$tap_goi_credit[]=[
       		"ten_goi" => "Gói 200",
       		"credit" => "200",
       		"so_tien" => "20000"
       	];
       	$tap_goi_credit[]=[
       		"ten_goi" => "Gói 500",
       		"credit" => "500",
       		"so_tien" => "50000"
       	];

		
       	foreach ($tap_goi_credit as $goiCredit) {
       		GoiCredit::create($goiCredit);
       	}

        }
}

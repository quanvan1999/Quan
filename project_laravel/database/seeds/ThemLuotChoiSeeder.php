<?php

use Illuminate\Database\Seeder;
use App\LuotChoi;
class ThemLuotChoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tap_luot_choi=[];
        $tap_luot_choi[]=[
        	"nguoi_choi_id"=>"1",
        	"so_cau"=>"11",
        	"diem"=>"111",
        	"ngay_gio"=>"15/5"
        ];
        foreach ($tap_luot_choi as $luot_choi) {
       		LuotChoi::create($luot_choi);
       	}
    }
}

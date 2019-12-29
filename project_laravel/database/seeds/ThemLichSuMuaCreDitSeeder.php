<?php

use Illuminate\Database\Seeder;
use App\LichSuMuaCredit;

class ThemLichSuMuaCreDitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=[
        	['nguoi_choi_id'=> '1', 'goi_credit_id' => '1', 'credit'=> '100', 'so_tien' =>'10000']
        ];
        foreach($list as $l){
        	LichSuMuaCredit::create($l);
        }
    }
}

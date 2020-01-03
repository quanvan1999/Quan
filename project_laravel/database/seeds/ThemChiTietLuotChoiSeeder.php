<?php

use Illuminate\Database\Seeder;
use App\ChiTietLuotChoi;

class ThemChiTietLuotChoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=[
            ['luot_choi_id'=> '1', 'cau_hoi_id' => '1', 'phuong_an'=> 'A', 'diem' =>'100']
        ];
        foreach($list as $l){
            ChiTietLuotChoi::create($l);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\QuanTriVien;
class ThemQuanTriVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listQTV=[
        	['ten_dang_nhap'=> 'admin1', 'mat_khau' => Hash::make('123456'), 'ho_ten'=> 'Quan Tri Vien 1', 'anh_dai_dien' =>'1.jpg', 'email' =>'sieutihon@gmail.com']
        ];
        foreach($listQTV as $qtv){
        	QuanTriVien::create($qtv);
        }
    }
}

 <?php

use Illuminate\Database\Seeder;
use App\LinhVuc;
class ThemLinhVucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
      $tap_linh_vuc=[];
      $tap_linh_vuc[]=[
       		"ten_linh_vuc" => "Thể Thao"
       	];
       	$tap_linh_vuc[]=[
       		"ten_linh_vuc" => "Lịch Sử"
       	];
       	$tap_linh_vuc[]=[
       		"ten_linh_vuc" => "Âm nhạc"
       	];
       	$tap_linh_vuc[]=[
       		"ten_linh_vuc" => "Địa Lý"
       	];

		
       	foreach ($tap_linh_vuc as $linhVuc) {
       		LinhVuc::create($linhVuc);
       	}
    }
}

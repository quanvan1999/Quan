<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(ThemLinhVucSeeder::class);
       $this->call(ThemCauHoiSeeder::class);
       $this->call(ThemNguoiChoiSeeder::class);
       $this->call(ThemQuanTriVienSeeder::class);
       $this->call(ThemGoiCreDitSeeder::class);
       $this->call(ThemLuotChoiSeeder::class);

    }
}

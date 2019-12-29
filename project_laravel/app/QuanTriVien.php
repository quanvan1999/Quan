<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class QuanTriVien extends Authenticatable
{
	use SoftDeletes;
    use Notifiable;
    protected $table='quan_tri_vien';
    protected $filltable=[
    	'ten_dang_nhap', 'mat_khau', 'ho_ten','anh_dai_dien', 'email'];
    public function getPasswordAttribute()
    {
    	return $this->mat_khau;
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NguoiChoiLoginController extends Controller
{
    
    public function dangNhap(Request $request){
        $credentials = [
            'ten_dang_nhap' => $request->ten_dang_nhap,
            'password'      => $request->mat_khau
        ];
        $token = null;
        try {
           if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['message'=>'Sai tên đăng nhập hoặc mật khẩu'], 422);
           }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        return response()->json([
            'token' => $token,
            'type'  => 'bearer'
        ]);
    }

    
    public function layThongTin()
    {
        return auth('api')->user();
    }
}

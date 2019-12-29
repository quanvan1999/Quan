<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuanTriVienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'ten_dang_nhap'=>'bail|required|min:6|max:20|unique:quan_tri_vien,ten_dang_nhap',
            'mat_khau'=>'bail|required|min:6:max:20|',
            'mat_khau1'=>'required|same:mat_khau',
            'email'=>'bail|required|email|unique:quan_tri_vien,email',
            'anh_dai_dien'=>'image'     

    
        ];
    }
    public function messages()
    {
        return [
            'ten_dang_nhap.required'=>'Tên đăng nhập không được bỏ trống !!',
            'ten_dang_nhap.unique'=>'Tên đăng nhập đã tồn tại, vui lòng chọn tên khác !!',
            'ten_dang_nhap.min'=>'Tên đăng nhập quá ngắn !!',
            'ten_dang_nhap.max'=>'Tên đăng nhập quá dài !!',
            'mat_khau.required'=>'Mật khẩu không được bỏ trống',
            'mat_khau.min'=>'Mật khẩu quá ngắn',
            'mat_khau.max'=>'Mật khẩu quá dài',
            'mat_khau1.required'=>'Nhập lại mật khẩu không được bỏ trống',
            'mat_khau1.same'=>'Nhập lại mật khẩu không chính xác',
            'email.required'=>'Email không được bỏ trống',
            'email.unique'=>'Email không khả dụng, vui lòng chọn email khác',
            'email.email'=>'Email không hợp lệ',
            'anh_dai_dien.image'=>'Ảnh đại diện phải có đuôi là .jpeg, .png, .jpg'
        ];
    }
}

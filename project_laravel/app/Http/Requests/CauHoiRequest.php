<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CauHoiRequest extends FormRequest
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
            'noi_dung'=>'bail|required|string|unique:cau_hoi,noi_dung',
            'phuong_an_a'=>'bail|required|different:phuong_an_b,phuong_an_c,phuong_an_d',
            'phuong_an_b'=>'bail|required|different:phuong_an_a,phuong_an_c,phuong_an_d',
            'phuong_an_c'=>'bail|required|different:phuong_an_b,phuong_an_a,phuong_an_d',
            'phuong_an_d'=>'bail|required|different:phuong_an_b,phuong_an_c,phuong_an_a'
        ];
    }
     public function messages()
    {
        return[
            'noi_dung.required'=>'Nội dung không được bỏ trống !',
            'noi_dung.string'=>'Nội dung quá dài !',
            'phuong_an_a.required'=>'Phương án A không được bỏ trống !',
            'phuong_an_a.different'=>'Phương án A không được trùng phương án khác !!',
            'phuong_an_b.required'=>'Phương án B không được bỏ trống !',
            'phuong_an_b.different'=>'Phương án B không được trùng phương án khác !!',
            'phuong_an_c.required'=>'Phương án C không được bỏ trống !',
            'phuong_an_c.different'=>'Phương án C không được trùng phương án khác !!',
            'phuong_an_d.required'=>'Phương án D không được bỏ trống !',
            'phuong_an_d.different'=>'Phương án D không được trùng phương án khác !!',

        ];
    }
}

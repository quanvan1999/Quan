<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinhVucRequest extends FormRequest
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
            'ten_linh_vuc'=>'bail|required|string|unique:linh_vuc,ten_linh_vuc'
        ];
    }
    public function messages()
    {
        return[
            'ten_linh_vuc.required'=>'Tên lĩnh vực không được bỏ trống !',
            'ten_linh_vuc.string'=>'Tên lĩnh vực quá dài !',
            'ten_linh_vuc.unique'=>'Tên lĩnh vực đã tồn tại !'
        ];
    }
}

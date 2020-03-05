<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddsUserRequest extends FormRequest
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
            "full"=>"required|min:4",
            "phone"=>"required|numeric|digits_between:1,10|unique:users,phone", //unique cấm trùng database
            "address"=>"required|min:4",
            "id_number"=>"required|numeric|digits_between:1,10"
        ];
    }
    public function messages()
    {
        return [
            "full.required"=>"Tên thành viên không được để trống",
            "full.min"=>"Tên quá ngắn",
            "phone.required"=>"SĐT không được để trống",
            "phone.numeric"=>"phải là số",
            "phone.digits_between"=>"SĐT không được quá 9 số",
            "phone.unique"=>"Số điện thoại đã trùng",
            "address.required"=>"Địa chỉ không được để trống",
            "address.min"=>"Địa chỉ dài quá",
            "id_number.required"=>"CMND không được để trống",
            "id_number.numeric"=>"phải là số",
            "id_number.digits_between"=>"ko quá 9 số"
        ];
    }
}

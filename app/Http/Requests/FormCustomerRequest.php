<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCustomerRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers,email',
            'dob' => 'required|date',
            'city_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'name.max' => 'Tên không được vượt quá 255 ký tự!',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng!',
            'email.unique' => 'Email đã tồn tại',
            'dob.required' => 'Ngày sinh không được để trống',
            'dob.date' => 'Ngày sinh phải là định dạng ngày',
            'city_id' => 'Thành phố không được để trống'
        ];
    }
}

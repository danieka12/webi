<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRegisterRequest extends FormRequest
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
            'nis' => 'required|unique:siswa,nis',
            'name' => 'required|min:5',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ];
    }
}

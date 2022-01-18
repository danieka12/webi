<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Angket extends FormRequest
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
            'guruId' => 'required',
            'siswaId' => 'required',
            'materiId' => 'required',
            'kejelasanMateri' => 'nullable',
            'kelengkapanMateri' => 'nullable',
            'contohPenjelasan' => 'nullable',
            'kejelasanBahasa' => 'nullable',
            'pemahamanMateri' => 'nullable',
            'kemudahanPemakaian' => 'nullable',
        ];
    }
}

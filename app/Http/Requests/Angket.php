<?php

namespace App\Http\Requests;

use Helpers\Message;
use Illuminate\Foundation\Http\FormRequest;

class Angket extends FormRequest
{
    public function __construct()
    {
        parent::__construct();
        $this->message = new Message();
    }


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
            'slug' => 'required',
            'kejelasanMateri' => 'required',
            'kelengkapanMateri' => 'required',
            'contohPenjelasan' => 'required',
            'kejelasanBahasa' => 'required',
            'pemahamanMateri' => 'required',
            'kemudahanPemakaian' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'kejelasanMateri.required' => $this->message->getRequired("Kejelasan Pembelajaran"),
            'kelengkapanMateri.required' => $this->message->getRequired("Kelengkapan Materi"),
            'contohPenjelasan.required' => $this->message->getRequired("Contoh Penjelasan Materi"),
            'kejelasanBahasa.required' => $this->message->getRequired("Kejelasan Bahasa"),
            'pemahamanMateri.required' => $this->message->getRequired("Pemahaman Materi"),
            'kemudahanPemakaian.required' => $this->message->getRequired("Kemudahan Pemakaian"),
        ];
    }
}

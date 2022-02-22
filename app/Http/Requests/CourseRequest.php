<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'categoryId' => 'required',
            'title' => 'required',
            'durationHour' => 'required',
            'durationMinute' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => "Username tidak boleh kosong",
            'durationHour.required' => "Durasi materi (Jam) tidak boleh kosong",
            'durationMinute.required' => "Durasi materi (menit) tidak boleh kosong",
            'description.required' => "Tujuan pembelajaran tidak boleh kosong",
            'content.required' => "Materi tidak boleh kosong",
            'image.required' => "Cover gambar tidak boleh kosong",
            'categoryId.required' => "Kategori materi tidak boleh kosong",
        ];
    }
}

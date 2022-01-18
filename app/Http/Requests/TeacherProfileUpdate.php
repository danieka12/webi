<?php

namespace App\Http\Requests;

use Helpers\Message;
use Illuminate\Foundation\Http\FormRequest;

class TeacherProfileUpdate extends FormRequest
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
            'image' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable|min:8',
            'password_confirmation' => 'nullable|same:password',
            'description' => 'required'
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
            'email.required' => $this->message->getRequired("Email"),
            'name.required' => $this->message->getRequired("Nama guru"),
            'image.required' => $this->message->getRequired("Profil guru"),
            'description.required' => $this->message->getRequired("Deskripsi profil guru"),
            'password_confirmation.same:password' => $this->message->getConfirmation(),
        ];
    }
}

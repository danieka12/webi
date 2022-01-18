<?php

namespace App\Http\Requests;

use Helpers\Message;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required'
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
            'password.required' => $this->message->getRequired("Password"),
        ];
    }
}

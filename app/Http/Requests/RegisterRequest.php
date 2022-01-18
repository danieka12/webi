<?php

namespace App\Http\Requests;

use Helpers\Message;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

    public function __construct()
    {
        parent::__construct();
        $this->message = new Message();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:guru,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
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
            'name.required' => $this->message->getRequired("Nama"),
            'email.required' => $this->message->getRequired("Email"),
            'email.unique' => $this->message->emailHasBeenRegistered(),
            'password.required' => $this->message->getRequired("Password"),
            'password_confirmation.required' => $this->message->getRequired("Konfirmasi password"),
        ];
    }
}

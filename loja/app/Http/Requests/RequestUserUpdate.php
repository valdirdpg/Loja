<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUserUpdate extends FormRequest
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
            "name"=>"required|max:65|min:10",
            'email'=>'required|min:10|max:100',
            'password'=>'min:6|max:12|confirmed',
            'image'=>'image',
            'token'=>'min:6|max:12',
            'bibliography'=>'min:6|max:1000',
        ];
    }

    public function messages()
    {
        return [
            "name.required"=>"Preencha este campo",
            "name.min"=>"O nome deve ter pelo menos 10 caracteres.",
            "name.max"=>"O nome deve ter no máximo 65 caracteres.",
            'email.required'=>'Preencha este campo',
            "email.min"=>"O email deve ter pelo menos 10 caracteres.",
            "email.max"=>"O email deve ter no máximo 100 caracteres.",
            "password.min"=>" A senha deve ter pelo menos 6 caracteres.",
            "password.max"=>"A senha deve ter no máximo 12 caracteres.",
            'token.min'=>'O token deve ter pelo menos 6 caracteres.',
            "token.max"=>"O token deve ter no máximo 12 caracteres.",
            'bibliography.min'=>'Este campo deve ter pelo menos 6 caracteres.',
            'bibliography.max'=>'Este campo deve ter no máximo 1000 caracteres.',

        ];
    }
}

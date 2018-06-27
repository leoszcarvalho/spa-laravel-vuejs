<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        $rules = [
            'name'       => 'required|min:3',
            'email'       => 'required|email',
        ];


        if (empty($this->input("id"))) {

            $rules['password']    = 'required|min:6';

        }else{

            if (!empty($this->input("password"))) {
                $rules['password']    = 'required|min:6';
            }

        }


        //print_r($rules);

        return $rules;

    }



    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'      => 'Por favor preencha o nome.',
            'name.min'      => 'O nome precisa ter no mínimo 3 dígitos.',
            'email.required'       => 'Por favor preencha o e-mail.',
            'email.email'       => 'Por favor digite um e-mail válido.',
            'password.min'       => 'O password precisa ter no mínimo 6 dígitos.',
            'password.required'          => 'Por favor preencha o password.',
        ];
    }


}

?>
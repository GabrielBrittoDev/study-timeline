<?php

namespace App\Http\Requests\auth;

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

    public static $rules = [
        'name' => ['required', 'string', 'max:200', 'min:3'],
        'username' => ['required', 'string', 'max:20', 'min:3', 'unique:users'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8','max:20', 'confirmed'],
    ];

    public static $messages = [
        'name.required' => 'Um nome é necessário',
        'name.min' => 'O nome precisa de no mínimo 3 caracteres',
        'name.max' => 'O nome pode ter no maximo 200 caracteres',
        'username.required' => 'Um username é necessário',
        'username.min' => 'O username precisa de no mínimo 3 caracteres',
        'username.max' => 'O username pode ter no maximo 20 caracteres',
        'username.unique' => 'Esse username ja foi escolhido',
        'email.required' => 'Um email é necessário',
        'email.email' => 'O email precisa ser valido',
        'email.max' => 'O email pode ter no maximo 200 caracteres',
        'email.unique' => 'Este email já foi cadastrado',
        'password.required' => 'Uma senha é necessário',
        'password.min' => 'A senha precisa de no mínimo 8 caracteres',
        'password.max' => 'A senha pode ter no maximo 20 caracteres',
        'password.confirmed' => 'As senhas não conferem'
    ];

    public function messages() : array
    {
        return self::$messages;
    }

    public function rules(): array
    {
        return self::$rules;
    }
}

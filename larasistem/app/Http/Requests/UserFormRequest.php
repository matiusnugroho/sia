<?php

namespace SIAStar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Validator;
use Auth;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'=>'required',
            'email'=>['email','required',Rule::unique('users')->ignore($this->userid)],
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Form tidak boleh kosong',
            'email.required'=>'email tidak boleh kosong',
            'email.email'=>'email tidak valid',
            'email.unique'=>'email sudah terdaftar'
        ];
    }
}

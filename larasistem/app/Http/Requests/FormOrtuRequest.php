<?php

namespace SIAStar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class FormOrtuRequest extends FormRequest
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
            'nama'=>'required',
            'id_siswa'=>'required_without:edit'
        ];
    }
    public function messages()
    {
        return [
            'nama.required'=>'Nama tidak boleh kosong',
            'id_siswa.required_without'=>'Pilih siswa'
        ];
    }
}

<?php

namespace SIAStar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class FormEditGuruRequest extends FormRequest
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
            'nip'=>'required',
            'nama'=>'required',
            'tgl_lahir'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'nama.required'=>'Form tidak boleh kosong',
            'nip.required'=>'Isikan NIP',
            'tgl_lahir.required'=>"Tanggal lahir belum diisikan"
        ];
    }
}
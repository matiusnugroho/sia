<?php

namespace SIAStar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class FormSiswaRequest extends FormRequest
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
            'nis'=>'required',
            'nama'=>'required',
            'tgl_lahir'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'nis.required'=>'Isikan NIS',
            'nama.required'=>'Nama tidak boleh kosong',
            'tgl_lahir.required'=>"Tanggal lahir belum diisikan"
        ];
    }
}

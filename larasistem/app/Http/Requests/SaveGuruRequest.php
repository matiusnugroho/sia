<?php

namespace SIAStar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class SaveGuruRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'nip.required'=>'Isikan NIP',
            'nama.required'=>'Nama tidak boleh kosong'
            'tgl_lahir.required'=>"Tanggal lahir belum diisikan"
        ];
    }
}

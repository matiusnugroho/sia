<?php

namespace SIAStar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class JadwalRequest extends FormRequest
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
            'hari'=>'required|not_in:0',
			'id_sesi'=>'required|not_in:0',
			'id_mapel_lokal'=>'required|not_in:0',
        ];
    }
    public function messages()
	{
		return [
			'hari.required'=>'Pilih Hari',
			'id_sesi.not_in'=>'Pilih Jam',
            'id_mapel_lokal.not_in'=>'Pilih mata pelajaran',
		];
	}
}

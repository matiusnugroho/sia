<?php

namespace SIAStar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class MateriRequest extends FormRequest
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
            'judul'=>'required',
			'isi'=>'required',
			'idmapel'=>'required|not_in:0',
			'idlokal'=>'required'
        ];
    }
	public function messages()
	{
		return [
			'judul.required'=>'Isikan judul',
			'isi.required'=>'Isi materi tidak boleh kosong',
			'idmapel.required'=>'Pilih mata pelajaran',
            'idmapel.not_in'=>'Pilih mata pelajaran',
			'idlokal.required'=>'pilih lokal',
		];
	}
}

<?php

namespace SIAStar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class JamAjarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $redirectRoute = 'jamajar.create';
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
            'ke'=>['required',Rule::unique('sesi')->where(function($query){
                return $query->where('ke',$this->ke)->where('hari',$this->hari);
            })],
            'hari'=>['required',Rule::unique('sesi')->where(function($query){
                return $query->where('hari',$this->ke)->where('ke',$this->hari);
            })],
            'jam'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'jam.required'=>'Form tidak boleh kosong',
            'hari.required'=>'Pilih hari',
            'ke.required'=>'Form tidak boleh kosong',
            'ke.unique'=>'Data sudah ada',
            'hari.unique'=>'Data sudah ada'
        ];
    }
    public function withValidator($validator)
    {
       
        
    }
}

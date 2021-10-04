<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSaranaDiujiRequest extends FormRequest
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
        return [
                'identitas' => ['required', Rule::unique('sarana_diuji')->ignore($this->id)],
                'jenis_sarana' => 'required',
                'operator' => 'required',
                'lokasi' => 'required',
                'wilayah' => 'required',
                'jenis_pengujian' => 'required',
                'status_uji' => 'required',
                ];
    }
}

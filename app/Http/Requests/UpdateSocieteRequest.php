<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateSocieteRequest extends Request
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
            'societe' => 'required|max:255',
            'rc' => 'required|max:50',
            'rue' => 'required|max:255',
            'ville' => 'required|max:255',
            'pays' => 'required|max:255',
            'a_propos' => 'required|max:1000',
            'logo' => 'required|image'
        ];
    }
}

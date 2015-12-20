<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactUsRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'sujet' => 'required|max:255',
            'email' => 'required|email|max:255',
            'nom' => 'required|max:255',
            'message' => 'required|max:1000'
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateChargementRequest extends Request
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
            'depart_rue' => 'required|max:255',
            'depart_ville' => 'required|max:255',
            'depart_pays' => 'required|max:255',
            'depart_date' => 'required|date_format:d/m/Y',
            'depart_heure' => 'required|date_format:"H:i:s"',
            'arrivee_rue' => 'required|max:255',
            'arrivee_ville' => 'required|max:255',
            'arrivee_pays' => 'required|max:255',
            'arrivee_date_limite' => 'required|date_format:d/m/Y|after:depart_date',
            'arrivee_heure_limite' => 'required|date_format:"H:i:s"',
            'frais_transit' => 'required|max:255',
            'distance' => 'required|integer',
            'type_trajet' => 'required|max:50',
            'nature_marchandise' => 'required|max:255',
            'type_assurance' => 'required|max:50',
            'poids' => 'required|numeric',
            'volume' => 'required|numeric',
            'produit_dangereux' => 'required|max:1',
            'mode_paiement' => 'required|max:50',
            'delai_paiement' => 'required|max:50',
            'devise' => 'required|max:50',
            'type_prix' => 'required|max:50',
            'prix_fixe' => 'required|numeric',
            'info_complementaire' => 'required|max:1000',
        ];
    }
}
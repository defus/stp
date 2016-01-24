<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Validator;
use Carbon\Carbon;

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
        Validator::extend('after_date_equal', function($attribute, $value, $parameters, $validator) {
            $dateFinAttribut = $attribute;
            $dateDebutAttribut = $parameters[0];
            $requestData = $validator->getData();
            
            $heureDebutAttribut = 'depart_heure';
            if($dateDebutAttribut == 'depart_date_fin'){
                $heureDebutAttribut = 'depart_heure_fin';
            }
            
            $heureFinAttribut = 'depart_heure_fin';
            if($dateFinAttribut == 'arrivee_date_limite'){
                $heureFinAttribut = 'arrivee_heure_limite';
            }
            
            $dateDebut = Carbon::createFromFormat('d/m/Y H:i', $requestData[$dateDebutAttribut] . ' ' . $requestData[$heureDebutAttribut]);
            $dateFin = Carbon::createFromFormat('d/m/Y H:i', $requestData[$dateFinAttribut] . ' ' . $requestData[$heureFinAttribut]);
            
            return $dateDebut->lte($dateFin); 
        });
        
        $rules = [
            'depart_rue' => 'required|max:255',
            'depart_ville' => 'required|max:255',
            'depart_pays' => 'required|max:255',
            'depart_date' => 'required|date_format:d/m/Y',
            'depart_date_fin' => 'required|date_format:d/m/Y|after_date_equal:depart_date',
            'depart_heure' => 'required|date_format:"H:i"',
            'depart_heure_fin' => 'required|date_format:"H:i"',
            'arrivee_rue' => 'required|max:255',
            'arrivee_ville' => 'required|max:255',
            'arrivee_pays' => 'required|max:255',
            'arrivee_date_limite' => 'date_format:d/m/Y|after_date_equal:depart_date_fin',
            'arrivee_heure_limite' => 'date_format:"H:i"',
            'frais_transit' => 'required|max:255',
            'distance' => 'required|integer',
            'type_trajet' => 'required|max:50',
            'nature_marchandise' => 'required|max:255',
            'type_assurance' => 'required|max:50',
            'poids' => 'required|numeric',
            'volume' => 'required|numeric',
            'produit_dangereux' => 'required|max:1',
            'mode_paiement' => 'max:50',
            'delai_paiement' => 'max:50',
            'devise' => 'required|max:50',
            'type_prix' => 'required|max:50',
            'prix_fixe' => 'required|numeric',
            'info_complementaire' => 'max:1000',
            'type_vehicule' => 'required|max:50',
            'nombre_voyage' => 'required|numeric',
        ];
        
        if($this->request->get('colis') != NULL){
            foreach($this->request->get('colis') as $key => $val)
            {
                $rules['colis.'.$key.'.emballage'] = 'required|max:50';
                $rules['colis.'.$key.'.nombre_unite'] = 'required|integer';
                $rules['colis.'.$key.'.empilable'] = 'required|max:1';
            }
        }
        
        return $rules;
    }
    
    public function messages()
    {
        return [
            'depart_date_fin.after_date_equal' => "L'intervalle de date de départ n'est pas correcte",
            'arrivee_date_limite.after_date_equal' => "La date limite d'arrivée doit-être supérieure ou égale à l'intervalle de date de départ",
        ];
    }
}

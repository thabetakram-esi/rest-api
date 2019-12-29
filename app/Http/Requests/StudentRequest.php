<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'Prenom' => 'required|string|max:50',
            'Nom' => 'required|string|max:50',
            'NomUtilisateur' => 'required|email',
            'MotDePasse' => 'required',
            'ConfirmMotDePasse' => 'required',
            'NiveauEtude' => 'required|string|max:50'
        ];
    }


    public function messages()
    {
        return [
            'Nom.required' => 'Le nom est nécessaire.',
            'Prenom.required'  => 'Le prenom est nécessaire.',
            'NomUtilisateur.required'  => "L 'adresse email est nécessaire.",
            'MotDePasse.required'  => 'Le mot de passe est nécessaire.',
            'ConfirmMotDePasse.required'  => 'La confirmation du mot de passe  est nécessaire.',
            'NiveauEtude.required'  => "Le niveau d'étude est nécessaire."
        ];
    }
}

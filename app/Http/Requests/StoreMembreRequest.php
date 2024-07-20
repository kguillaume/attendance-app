<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreMembreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return false;
        //return true;
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'tribu_id'  => 'required|integer',
            'eglise_id'  => 'required|integer',
            'date_entree_membre' => 'nullable|date',
            'lieu_habitation' => 'required|string',
            'statut_bapteme' => 'required|string|max:1',
            'numero_cellulaire'=> 'required',
            'statut_matrimonial'=> 'required|string',
            'date_anniversaire'=> 'required|string',
            'photo_path' => 'nullable|string|max:2048',
            'user_id' => 'required|integer'
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ],400));
    }




}

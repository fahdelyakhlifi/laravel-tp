<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string |min:3|max:10',
            'price' => 'required|numeric|min:0|max:9999',
            'description' => 'required|nullable|string',
            'discount' => 'nullable|numeric|min:0|max:100',
        ];
    }


    /**
     * Messages d'erreur personnalisés.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Le titre du produit est obligatoire.',
            'title.string' => 'Le titre doit être une chaîne de caractères.',
            'title.max' => 'Le titre ne doit pas dépasser 10 caractères.',
            'title.min' => 'Le titre ne doit pas dépasser 3 caractères.',


            'price.required' => 'Le prix du produit est obligatoire.',
            'price.numeric' => 'Le prix doit être un nombre.',
            'price.min' => 'Le prix ne peut pas être négatif.',

            'description.string' => 'La description doit être une chaîne de caractères.',

            'discount.numeric' => 'La réduction doit être un nombre.',
            'discount.min' => 'La réduction ne peut pas être inférieure à 0%.',
            'discount.max' => 'La réduction ne peut pas dépasser 100%.',
        ];
    }
}
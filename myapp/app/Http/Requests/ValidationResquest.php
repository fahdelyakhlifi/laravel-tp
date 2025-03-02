<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationResquest extends FormRequest
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
                "name" => "required",
                "prix" => "numeric|min:10|max:1500",

        ];
    }

    public function message(): array
    {
        return [
                "name.required" => "Le nom du produit est obligatoire",
                "prix.numeric" => "Le prix doit être un nombre",
                "prix.min" => "Le prix doit être supérieur ou égal à 10",
                "prix.max" => "Le prix doit être inférieur ou égal à 1500",
        ];
    }
}
